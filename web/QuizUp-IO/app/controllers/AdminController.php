<?php

class AdminController extends Phalcon\Mvc\Controller
{
	public function indexAction()
	{
		$questions = Question::find();
		$moderators = User::find('is_moderator = 1');
		$categories = Category::find();
		$questionTypes = QuestionType::find();
		
		$this->view->setVar('questions', $questions);
		$this->view->setVar('moderators', $moderators);
		$this->view->setVar('categories', $categories);
		$this->view->setVar('questionTypes', $questionTypes);
	}
	
	public function createCategoryAction()
	{
		$category = new Category();
		$success = $category->save($this->request->getPost(), ['name']);
		
		if ($success)
		{
			return $this->_redirectBack();
		}
		else
		{
			$this->_displayError($category);
		}
	}
	
	public function createQuestionAction()
	{
		$question = new Question();
		$success = $question->save($this->request->getPost(), ['text', 'time', 'category', 'type']);
		
		if ($success)
		{
			return $this->_redirectBack();
		}
		else
		{
			$this->_displayError($question);
		}
	}
	
	public function createEventAction()
	{
		$event = new Event();
		$success = $event->save($this->request->getPost(), ['moderator', 'location', 'date', 'time', 'description', 'rules']);
		
		if ($success)
		{
			return $this->_redirectBack();
		}
		else
		{
			$this->_displayError($event);
		}
	}
	
	public function createAnswerAction()
	{
		$answer = new Answer();
		
		if ($this->request->getPost('is_true') !== null)
		{
			$success = $answer->save($this->request->getPost(), ['answer', 'question', 'is_true']);
		}
		else
		{
			$answer->answer = $this->request->getPost('answer');
			$answer->question = $this->request->getPost('question');
			$answer->is_true = 0;
			$success = $answer->save();
		}
			
		
		if ($success)
		{
			return $this->_redirectBack();
		}
		else
		{
			$this->_displayError($answer);
		}
	}
	
	private function _displayError(Phalcon\Mvc\Model $object)
	{
		echo 'Following errors have been generated: <br/>';

		$errors = $object->getMessages();
		foreach ($errors as $error) 
		{
			echo ' - ', $error->getMessage(), '<br/>';
		}

		$this->view->disable();
	}
	
	private function _redirectBack()
	{
		return $this->response->redirect($_SERVER['HTTP_REFERER']);
	}
}

