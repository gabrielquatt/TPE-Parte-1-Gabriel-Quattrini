<?php

include_once ('views/gameView.php');
include_once ('views/adminView.php');
include_once ('views/loginView.php');
include_once ('views/errorView.php');
include_once ('models/categoryModel.php');
include_once ('models/gameModel.php');
include_once ('models/userModel.php');

 class controller {

        private $login;
        private $gameView;
        private $adminview;
        private $errorView;
        private $modelCategory;
        private $modelGame;
        private $modelAdmin;

        public function __construct(){
            $this->modelCategory = new categoryModel();
            $this->modelGame = new gameModel();
            $this->modelAdmin = new userModel();
            $this->gameView = new gameView();
            $this->adminView = new adminView();
            $this->errorView = new errorView();
            $this->login = new loginView();
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
    public function getadminview(){
        return $this->adminView;
    }
    public function getloginview(){
        return $this->login;
    }
    public function geterrorview(){
        return $this->errorView;
    }
    
    public function showError($mensegge){      
        $categorysid = $this->getmodelcategoty()->getAllCategory(); 
        $this->geterrorview()->showErrorView($mensegge, $categorysid);
      }

}