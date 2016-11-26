<?php

class QuestionController extends ControllerBase
{

    public function indexAction()
    {
        $questions = Question::find();
		$this->view->setVar('questions', $questions);
		
		$categories = Category::find();
		$this->view->setVar('categories', $categories);
		
		$questionTypes = QuestionType::find();
		$this->view->setVar('questionTypes', $questionTypes);
    }

    public function createAction()
	{
      $question = new Question();
	  $question->save($this->request->getPost(), ['text', 'time', 'category', 'type']);
      $this->response->redirect("question");
    }
    
    public function saveAction()
	{      
      $id = $this->request->getPost('id');
      $question = Question::findFirst("id = $id");
      $question->text = $this->request->getPost('text');
      $question->time = $this->request->getPost('time');
      $question->category = $this->request->getPost('category');
      $question->type = $this->request->getPost('type');
      $question->save();
      $this->response->redirect("question");
    }
    
    public function deleteAction($id = null)
	{
      $question = Question::findFirst("id = $id");
      $question->delete();
      $this->response->redirect("question");
    }
}