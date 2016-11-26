<?php

class EventController extends ControllerBase
{

    public function indexAction()
    {
        $moderators = User::find('is_moderator = 1');
		$this->view->setVar('moderators', $moderators);
    }

    public function createAction()
	{
      $event = new Event();
	  $event->save($this->request->getPost(), ['moderator', 'location', 'date', 'time', 'description', 'rules']);
      $this->response->redirect("event");
    }
    
    public function saveAction()
	{      
      $id = $this->request->getPost('id');
      $event = Event::findFirst("id = $id");
      $event->moderator = $this->request->getPost('moderator');
      $event->location = $this->request->getPost('location');
      $event->date = $this->request->getPost('date');
      $event->time = $this->request->getPost('time');
      $event->description = $this->request->getPost('description');
      $event->rules = $this->request->getPost('rules');
      $event->save();
      $this->response->redirect("event");
    }
    
    public function deleteAction($id = null)
	{
      $event = Event::findFirst("id = $id");
      $event->delete();
      $this->response->redirect("event");
    }
}