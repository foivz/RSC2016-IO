<?php

class LoginController extends ControllerBase
{
    public function indexAction()
    {
		$this->assets->addJs('https://plus.google.com/js/client:platform.js', false, false, ['async'=>'async', 'defer'=>'defer']);
		$this->assets->addJs("js/facebookLogin.js");
		$this->assets->addJs('js/googleLogin.js');
    }
	
	public function doLoginAction()
	{
		$displayName = $this->request->getPost('displayName');
		$email = $this->request->getPost('email');
		
		$userCount = count(User::find("display_name LIKE '$displayName' AND email LIKE '$email'"));
		
		if ($userCount == 0)
		{
			$newUser = new User();
			$newUser->display_name = $displayName;
			$newUser->email = $email;
			$newUser->is_admin = 0;
			$newUser->is_moderator = 0;
			$newUser->save();
		}
		
		$this->session->set('USER', $newUser);
	}
	
	public function logoutAction()
	{
		if ($this->session->has('USER'))
		{
			$this->session->destroy();
		}
		$this->response->redirect('index');
	}
}

