<?php
// include_once ('views/view.php');
include_once('views/GameView.php');
include_once('views/AdminView.php');
include_once('views/LoginView.php');
include_once('views/ErrorView.php');
include_once('models/CategoryModel.php');
include_once('models/GameModel.php');
include_once('models/UserModel.php');
include_once('models/CaptureModel.php'); 

 class Controller {
        private $user;
        private $login;
        private $gameView;
        private $adminView;
        private $errorView;
        private $modelCategory;
        private $modelGame;
        private $modelAdmin;
        private $modelCapture;

        public function __construct(){
            //consulta de si hay algun ususario loggueado 
            $this->user = AuthHelper::getDataUser();
            $this->modelCategory = new CategoryModel();
            $this->modelGame = new GameModel();
            $this->modelAdmin = new UserModel();
            $this->modelCapture = new CaptureModel(); 
            $this->gameView = new GameView();
            $this->adminView = new AdminView();
            $this->errorView = new ErrorView();
            $this->login = new LoginView();
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
    public function getCaptureModel(){
        return $this->modelCapture;
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
    /**
     * Funcion que realiza consulta sobre los permisos del ususario loggueado
     */
    public function admin(){
        $name = AuthHelper::getLoggedUserName();//solo de haber un ususario logguedo se devolveran los datos
         if(isset($name)){
             $admin = $this->getusermodel()->admiAcces($name);
             return $admin; 
         }
    }

    /**
     * funcion para mostrar error + mensaje de cual sea
     */
    public function showError($mensegge){ 
        $array = $this->user();     
        $categorysid = $this->getmodelcategoty()->getAllCategory(); 
        $this->geterrorview()->showErrorView($mensegge, $categorysid,$array);
    }
}