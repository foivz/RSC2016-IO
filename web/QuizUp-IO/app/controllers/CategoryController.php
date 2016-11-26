<?php

class CategoryController extends \Phalcon\Mvc\Controller
{

    public function indexAction($id=null)
    {
      $this->view->newName = "";
      $this->view->newId = "";;
      if($id == null){
        $this->view->isCreate = true;
      } else {
        $this->view->isCreate = false;
        $category = Category::findFirstById($id);
        $this->view->newName = $category->name;
        $this->view->newId = $category->id;
      }
      $this->view->categories = Category::find();
    }

    public function createAction(){
      $category = new Category();
      $category->name = $this->request->getPost('name');
      $category->save();
      $this->response->redirect("category");
    }
    
    public function saveAction(){      
      $id = $this->request->getPost('id');
      $category = Category::findFirstById($id);
      var_dump($category);
      $category->name = $this->request->getPost('name');
      $category->id = $id;
      $category->save();
      $this->response->redirect("category");
    }
    
    public function deleteAction($id=null){
      $category = Category::findFirstById($id);
      $category->delete();
      $this->response->redirect("category");
    }
}

