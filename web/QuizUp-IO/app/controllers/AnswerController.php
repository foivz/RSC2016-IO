<?php

class AnswerController extends ControllerBase
{
	public function indexAction()
    {
		$answers = Answer::find();
		$this->view->setVar('answers', $answers);
		
        $moderators = User::find('is_moderator = 1');
		$this->view->setVar('moderators', $moderators);
    }

    public function createAction()
	{
      $answer = new Answer();
	  $answer->save($this->request->getPost(), ['answer', 'question', 'is_true']);
      $this->response->redirect("answer");
    }
    
    public function saveAction()
	{      
      $id = $this->request->getPost('id');
      $answer = Answer::findFirst("id = $id");
      $answer->answer = $this->request->getPost('answer');
      $answer->question = $this->request->getPost('question');
      $answer->is_true = $this->request->getPost('is_true');
      $answer->save();
      $this->response->redirect("answer");
    }
    
    public function deleteAction($id = null)
	{
      $answer = Answer::findFirst("id = $id");
      $answer->delete();
      $this->response->redirect("answer");
    }
}
