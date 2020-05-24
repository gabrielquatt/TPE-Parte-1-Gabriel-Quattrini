<?php

include_once ('views/gameView.php');
include_once ('views/adminView.php');
include_once ('views/loginView.php');
include_once ('models/categoryModel.php');
include_once ('models/gameModel.php');
include_once ('models/userModel.php');

 class controller {
   
        private $login;
        private $adminview;
        private $modelCategory;
        private $modelGame;
        private $modelAdmin;

        public function __construct(){
            $this->modelCategory = new categoryModel();
            $this->modelGame = new gameModel();
            $this->modelAdmin = new userModel();
            $this->gameView = new gameView();
            $this->login = new loginView();
            $this->adminView = new adminView();
         }

    public function getmodelcategoty(){
        return $this->modelCategory;
    } 
    public function getgamemodel(){
        return $this->modelGame;
    }
    public function getusermodel(){
        return $this->modelAdmin;
    }
    public function getgameview(){
        return $this->gameView;
    }
    public function getloginview(){
        return $this->login;
    }
    public function getadminview(){
        return $this->adminView;
    }

}