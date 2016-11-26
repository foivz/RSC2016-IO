function onSignInCallback(resp) 
{
	gapi.client.load('plus', 'v1', apiClientLoaded);
}

function apiClientLoaded()
{
	gapi.client.plus.people.get({userId: 'me'}).execute(handleResponse);
}

function handleResponse(resp) 
{
	var email = resp.emails[0].value;
	var displayName = resp.displayName;
	
	$.ajax({
		url: "login/doLogin",
		method: "POST",
		data: {
			"email": email, 
			"displayName": displayName
		},
		success: function() {
			document.location.pathname = "QuizUP-IO/index";
		}
	});
}

