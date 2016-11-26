<?php

class CategoryController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->categories = Category::find();
    }

    public function createAction(){
      $category = new Category();
      $category->name = $this->request->getPost('name');
      $category->save();
      $this->response->redirect("category");
    }
    
    public function updateAction($id=null){
       $category = Category::findFirstById($id);
       $this->view->category = $category;
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

