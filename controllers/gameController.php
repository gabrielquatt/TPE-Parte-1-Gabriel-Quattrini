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

     public function deleteGame($id) {
         $this->model->deleteGameDB($id);
         header("Location: ../game");// falta mensaje de borrado con exito
        }

     public function deleteCategory() {
      $borrar = $_POST['category'];
        $this->model->deleteCategoryDB($borrar);
        header("Location: game");
      }

      public function addCategory() {
         $name = $_POST['name'];
         if (empty($name)) {
           echo("Location: game");
             die();
         }
         $success = $this->model->saveCategory($name);
         if($success){
            header("Location: game");
         }
         else{
            echo("error to add Category"); //falta mensaje de error
         }
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
         if($success){
            header("Location: game");//falta crear un mensaje de carga complete
         }
         else{
             echo(" error to add game"); //falta mensaje de error
         }          
      }

      public function editGame() {
         $gameid = $_POST['game'];
         $title = $_POST['title'];
         $category = $_POST['category'];
         $qualification = $_POST['qualification'];
         $detail = $_POST['description'];

         if (empty($gameid)||empty($title)||empty($category)||empty($qualification)||empty($detail)) {
           echo("faltan datos");
            die();
         }else{
            $this->model->editGameDB($title,$detail,$category,$qualification,$gameid);
            header("Location: game");//falta crear un mensaje de edicion completa 
         }
      }      

}
?>