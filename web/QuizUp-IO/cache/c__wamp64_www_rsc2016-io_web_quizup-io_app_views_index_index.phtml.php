  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>QuizUp</title>
  <link rel="icon" href="public/img/logo.png" type="image/x-icon">
  <!-- Bootstrap -->
  <link href="public/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="public/css/font-awesome/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400|Source+Sans+Pro:200,400,700" rel="stylesheet">
  <link rel="stylesheet" href="public/css/style.css">


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>

  <nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <i class="fa fa-bars"></i>
      </button>
      <a class="navbar-brand" href="#">QuizUp</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="">Home</a></li>
        <li><a href="#">Events</a></li>
        <li><a href="#">History</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?= $this->url->get('login') ?>">Login</a></li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

  <section class="info-section">
      <div class="tcell">
        <h1>QuizUp</h1>
        <p class="info-description">
          The ultimate Pub Quiz Platform
        </p>
      </div>      
  </section>

  <section class="events">
  <h1>Nearby Events</h1>
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <div class="event-item">
          <h3>Event #1</h3>
          <div class="event-description">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis veritatis maiores perferendis quas sequi magnam corporis exercitationem natus sint ullam.</p>
          </div>
          <div class="event-location"><i class="fa fa-map-marker"></i> <strong>Location: </strong> Pivnica Medvedgrad</div>
          <div class="event-date"><i class="fa fa-calendar"></i><strong> Date: </strong> 20.12.2017.</div>
          <div class="event-time"><i class="fa fa-clock-o"></i><strong> Time: </strong> 18:00h</div>
          <a href="" class="btn btn-primary">Read more</a>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="event-item">
          <h3>Event #2</h3>
          <div class="event-description">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis veritatis maiores perferendis quas sequi magnam corporis exercitationem natus sint ullam.</p>
          </div>
          <div class="event-location"><i class="fa fa-map-marker"></i> <strong>Location: </strong> Pivnica Medvedgrad</div>
          <div class="event-date"><i class="fa fa-calendar"></i><strong> Date: </strong> 20.12.2017.</div>
          <div class="event-time"><i class="fa fa-clock-o"></i><strong> Time: </strong> 18:00h</div>
          <a href="" class="btn btn-primary">Read more</a>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="event-item">
          <h3>Event #3</h3>
          <div class="event-description">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis veritatis maiores perferendis quas sequi magnam corporis exercitationem natus sint ullam.</p>
          </div>
          <div class="event-location"><i class="fa fa-map-marker"></i> <strong>Location: </strong> Pivnica Medvedgrad</div>
          <div class="event-date"><i class="fa fa-calendar"></i><strong> Date: </strong> 20.12.2017.</div>
          <div class="event-time"><i class="fa fa-clock-o"></i><strong> Time: </strong> 18:00h</div>
          <a href="" class="btn btn-primary">Read more</a>
        </div> 
      </div>          
    </div>
    <div class="center all-events-btn">
      <a class="show-more" href="#">Show all upcoming events</a>
    </div>
  </div>
</section>

  <section class="history">
    <h1>Finished Events</h1>
    <p>Wanna see details about previous events?</p>
    <div class="center all-events-btn">
        <a class="show-more" href="#">Show history</a>
    </div>
  </section>
  
  <footer class="clearfix">
  <p>Copyright 2016. QuizUp</p>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="public/js/bootstrap.min.js"></script>
</body>
</html>