<?php

include_once ('models/gameModel.php');
include_once ('views/gameView.php');

 class gameController {

     private $model;
     private $view;

     public function __construct(){
        $this ->model = new gameModel();
        $this ->view = new gameView();
     }
     public function showGame(){
        $categorys = $this->model->getAll();  
        $this->view->viewGames($categorys);
        }
     public function showDetails($game){
        $categorys = $this->model->getAll();
        $games = $this->model->getGameSpecific($game);  
        $this->view->viewDetail($games,$categorys);  
        }
     public function deleteGame($id,$category) {
         $this->model->deleteGameDB($id);
         header("Location: ../../details/$category");
        }

      public function addCategory() {
         $title = $_POST['name'];
         if (empty($title)) {
           echo("Location: game");
             die();
         }
         $success = $this->model->saveCategory($title);
         if($success)
         header("Location: game");
      }
      public function addGame() {
         $title = $_POST['title'];
         $category = $_POST['category'];
         $qualification = $_POST['qualification'];
         $detail = $_POST['description'];
         if (empty($title)||empty($category)||empty($qualification)||empty($detail)) {
           echo("faltan datos");
            die();
         }
         $success = $this->model->saveGame($title,$detail,$category,$qualification);
         if($success)
         header("Location: game");
      }

}
?>