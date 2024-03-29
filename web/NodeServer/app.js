var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var mysql = require('mysql');

var dbConnection = mysql.createConnection({
    host: 'srv7.rsc.hr',
    user: 'io',
    password: 'io',
    database: 'io'
});

dbConnection.connect(function (err) {
    if (err) {
        console.error('error connecting: ' + err.stack);
        return;
    }
    console.log('New connection to database:' + dbConnection.threadId);
});

app.get('/', function (req, res) {
    res.sendFile(__dirname + '/index.html');
});

io.on('connection', function (socket) {

    console.log("New user connected!");

    //Identify user
    socket.on('auth', function (email) {
        var sql = "SELECT * FROM user WHERE email = ?";
        var inserts = [email.email];
        sql = mysql.format(sql, inserts);
        dbConnection.query(sql, function (err, rows, fields) {
            if (err) throw err;
            if (rows.length > 0) {
                socket.emit('auth', JSON.stringify(rows[0]));
            }
            else {
                socket.emit('auth', '{"id":0}');
            }
        });
    });

    //Get event data over id
    socket.on('getevent', function (eventId, userId) {
        var sql = "SELECT * FROM event JOIN participants ON participants.event = event.id JOIN team ON participants.team = team.id JOIN user_team ON user_team.team = team.id WHERE user_team.user = ? AND event.id = ?";
        var inserts = [userId, eventId];
        sql = mysql.format(sql, inserts);
        dbConnection.query(sql, function (err, rows, fields) {
            if (err) throw err;
            if (rows.length > 0) {
                socket.emit('getevent', JSON.stringify(rows[0]));
            }
            else {
                socket.emit('getevent', '{"id":0}');
            }
        });
    });

    //Moderator strats the quiz
    socket.on('quizstart', function (eventId, moderatorId) {
        //Checks if the user who sent the start signal is moderator of the event
        var sql = "SELECT * FROM event WHERE id = ? AND moderator = ?";
        var inserts = [eventId, moderatorId];
        sql = mysql.format(sql, inserts);
        dbConnection.query(sql, function (err, rows, fields) {
            if (err) throw err;
            if (rows.length > 0) {
                io.emit('quizstart', { eventId: eventId });
            }
            else {
                socket.emit('quizstart', '{"id":0}');
            }
        });
    });

    //Sends the next question to the participants when moderator pushes it
    socket.on('nextquestion', function (ids) {
        //Checks if the user who sent the start signal is moderator of the event
        var sql = "SELECT * FROM  question JOIN answer ON question.id = answer.question WHERE question.id = (SELECT current_question FROM event WHERE id = ? AND moderator = ?) + 1";
        var inserts = [ids.eventId, ids.moderatorId];
        sql = mysql.format(sql, inserts);
        dbConnection.query(sql, function (err, rows, fields) {
            if (err) throw err;
            if (rows.length > 0) {

                io.emit('nextquestion', JSON.stringify(rows));
                dbConnection.query('UPDATE event SET current_question = current_question + 1 WHERE id = ?', { team: ids.teamId, event: ids.eventId, question: ids.questionId, points: points }, function (err, result) {
                    if (err) throw err;
                    console.log(result.insertId);
                });

            } else {
                socket.emit('nextquestion', '{"id":0}');
            }
        });
    });

    //Sends the next question to the participants when moderator pushes it
    socket.on('answer', function (ids) {
        //Checks if the user who sent the start signal is moderator of the event
        var sql = "SELECT answer.is_true FROM question JOIN answer ON question.id = answer.question WHERE question.id = (SELECT current_question FROM event WHERE id = ?) AND answer.id = ?";
        var inserts = [ids.eventId, ids.answerId];
        sql = mysql.format(sql, inserts);
        dbConnection.query(sql, function (err, rows, fields) {
            if (err) throw err;
            if (rows.length > 0) {
                if (rows[0].is_true) {
                    var points = 1;
                }
                else {
                    var inserts = 0;
                }
                dbConnection.query('INSERT INTO result SET ?', { team: ids.teamId, event: ids.eventId, question: ids.questionId, points: points }, function (err, result) {
                    if (err) throw err;
                    console.log(result.insertId);
                });
            }
            else {
                socket.emit('nextquestion', '{"id":0}');
            }
        });
    });


    //When socket disconnects
    socket.on('disconnect', function () {
        console.log('user disconnected');
        dbConnection.end();
    });
});

http.listen(3000, function () {
    console.log('listening on *:3000');
});