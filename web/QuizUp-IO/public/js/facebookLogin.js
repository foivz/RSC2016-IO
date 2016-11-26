
      
function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);

    if (response.status === 'connected') {
      alert("connected");
      testAPI();
    } else if (response.status === 'not_authorized') {
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
      FB.login();
      alert("not_auth");
    } else {
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
      alert("login");
    }
  }
 
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }
  
 window.fbAsyncInit = function() {
  FB.init({
    appId      : '1700664930249435',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.8' // use graph api version 2.8
  });
  
    FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  FB.login(function(response){
    console.log("login");
    console.log(response);
  },{
     scope: 'email',
     return_scopes: true
  });

  };

//(function (d, s, id) {
//        var js, fjs = d.getElementsByTagName(s)[0];
//        if (d.getElementById(id))
//          return;
//        js = d.createElement(s);
//        js.id = id;
//        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8&appId=1700664930249435";
//        fjs.parentNode.insertBefore(js, fjs);
//      }(document, 'script', 'facebook-jssdk'));
      
function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name + " " + response.email);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }