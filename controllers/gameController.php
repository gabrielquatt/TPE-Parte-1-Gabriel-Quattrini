<?php

include_once ('models/gameModel.php');
include_once ('models/categoryModel.php');
include_once ('views/gameView.php');

 class gameController {

     private $view;
     private $modelCategory;
     private $modelGame;

     public function __construct(){
       
        $this ->modelCategory = new categoryModel();
        $this ->modelGame = new gameModel();
        $this ->view = new gameView();
     }

     public function showGame(){
        $categorysid = $this->modelCategory->getAllCategory();  
        $this->view->viewGames($categorysid);
        }

     public function showDetails($categoryID){
        $categorys = $this->modelCategory->getAllCategory();
        $games = $this->modelGame->getGameSpecific($categoryID);  
        $this->view->viewDetail($games,$categorys);  
        }

     public function deleteGame($id,$category) {
         $this->modelGame->deleteGameDB($id);
         header("Location: ../../details/$category");
        }

     public function deleteCategory() {
      $borrar = $_POST['category'];
        $this->modelCategory->deleteCategoryDB($borrar);
        header("Location: game");
        }

      public function addCategory() {
         $name = $_POST['name'];
         if (empty($name)) {
            $this->showError('add name to category');
            die(); 
         }
         $success = $this->modelCategory->saveCategory($name);
         if($success){
            header("Location: game");
         }
         else{
            $this->showError('error to add Category');      
         }
      }

      public function addGame() {
         
         $title = $_POST['title'];
         $category = $_POST['category'];
         $qualification = $_POST['qualification'];
         $detail = $_POST['description'];
         if($category==0){
            $this->showError('error to add game');
            die();
         }else if(empty($title)||empty($qualification)||empty($detail)) {
            $this->showError('error to add game faltan datos');
         
         }else{
            $success = $this->modelGame->saveGameDB($title,$detail,$category,$qualification);
            if($success){
               header("Location: details/$category");//falta crear un mensaje de carga complete
            }
            else{
               $this->showError('error to add game');
            }             
         }
      }

      public function editGame() {
         $gameid = $_POST['game'];
         if($gameid==''){
            $gameid=0;
         }
         $title = $_POST['title'];
         $category = $_POST['category'];
         $qualification = $_POST['qualification'];
         $detail = $_POST['description'];
         
         if (empty($gameid)||empty($title)||empty($category)||empty($qualification)||empty($detail)) {
           $this->showError('faltan datos por favor complete correctamente'); 
         }else{
            $this->modelGame->editGameDB($title,$detail,$category,$qualification,$gameid);
            header("Location: details/$category"); 
         }
      }
        
      public function getLogin()
      {
          $this->view->showLogin();
      }
      public function showError($mensegge){      
      $categorysid = $this->modelCategory->getAllCategory(); 
        $this->view->showErrorView($mensegge, $categorysid);
    }

}
?>