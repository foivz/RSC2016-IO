<?php

class LoginController extends \Phalcon\Mvc\Controller
{
    public function indexAction()
    {
		$this->assets->addJs('https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', false, false);
		$this->assets->addJs('https://plus.google.com/js/client:platform.js', false, false, ['async'=>'async', 'defer'=>'defer']);
		$this->assets->addJs("js/facebookLogin.js");
		$this->assets->addJs('js/googleLogin.js');
    }
	
	public function doLoginAction()
	{
		$displayName = $this->request->getPost('displayName');
		$email = $this->request->getPost('email');
	}
}

