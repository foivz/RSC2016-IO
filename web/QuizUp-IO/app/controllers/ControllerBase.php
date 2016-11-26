<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
  public function afterExecuteRoute()
  {

    // If dispatcher hasn't finished dispatching we shouldn't enter.

    if (!$this->dispatcher->isFinished()) {
        return;
    }

    $this->assets->addCss('css/style.css');
    

  }
}
