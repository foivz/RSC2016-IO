<?php

class LoginController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
       $this->assets->addJs("js/facebookLogin.js");
    }

}

