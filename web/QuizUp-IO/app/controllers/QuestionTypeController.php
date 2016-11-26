<?php

class QuestionTypeController extends ControllerBase{
  
   public function indexAction($id = null){
     $this->view->newId = ""; 
     $this->view->newName = "";
     if($id == null){
        $this->view->isCreate = true;
      } else {
        $this->view->isCreate = false;
        $questionType = QuestionType::findFirstById($id);
        $this->view->newId = $questionType->id;
        $this->view->newName = $questionType->name;
      }
      
      $this->view->questionTypes = QuestionType::find();
   }
   
   public function saveAction(){
     $questionType = QuestionType::findFirstById($this->request->getPost("id"));
     $questionType->name = $this->request->getPost("name");
     $questionType->save();
     $this->response->redirect("questionType");
   }
   
   public function createAction(){
     $questionType = new QuestionType();
     $questionType->name = $this->request->getPost("name");
     $questionType->save();
     $this->response->redirect('questionType');
   }
   
   public function deleteAction($id = null){
     $questionType = QuestionType::findFirstById($id);
     $questionType->delete();
     $this->response->redirect("questionType");
   }
  
}
