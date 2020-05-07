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
     public function showDetails($category){
         $games = $this->model->getGameSpecific($category);  
         $this->view->viewDetail($games);  
        }

}
?>