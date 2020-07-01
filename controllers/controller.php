<?php
// include_once ('views/view.php');
include_once ('views/GameView.php');
include_once ('views/AdminView.php');
include_once ('views/LoginView.php');
include_once ('views/ErrorView.php');
include_once ('models/CategoryModel.php');
include_once ('models/GameModel.php');
include_once ('models/UserModel.php');
include_once ('models/ImageModel.php');

 class Controller {
        private $user;
        private $login;
        private $gameView;
        private $adminView;
        private $errorView;
        private $modelCategory;
        private $modelGame;
        private $modelAdmin;
        private $modelImage;

        public function __construct(){
            $this->user =AuthHelper::getDataUser();
            $this->modelCategory = new CategoryModel();
            $this->modelGame = new GameModel();
            $this->modelAdmin = new userModel();
            $this->modelImage = new ImageModel();
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
    public function getImageModel(){
        return $this->modelImage;
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
    public function user(){
        return $this->user;
    }
    public function admin(){
        $name = AuthHelper::getLoggedUserName();
         if(isset($name)){
             $admin = $this->getusermodel()->admiAcces($name);
             return $admin; 
         }
    }
    public function showError($mensegge){ 
        $array = $this->user();     
        $categorysid = $this->getmodelcategoty()->getAllCategory(); 
        $this->geterrorview()->showErrorView($mensegge, $categorysid,$array);
    }
}