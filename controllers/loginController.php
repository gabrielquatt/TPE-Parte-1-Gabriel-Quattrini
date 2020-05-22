<?php

include_once ('views/adminView.php');
include_once ('views/loginView.php');

include_once ('models/categoryModel.php');
include_once ('models/gameModel.php');
include_once ('models/userModel.php');

 class loginController {
     private $login;
     private $view;
     private $modelCategory;
     private $modelGame;
     private $modelAdmin;

    public function __construct(){
        $this ->login = new loginView();
        $this ->view = new adminView();
        $this ->modelCategory = new categoryModel();
        $this ->modelGame = new gameModel();
        $this ->modelAdmin = new userModel();
    }

    public function verify(){
     if((!empty($_POST['username'])) && (!empty($_POST['pass']))){
            $user= $_POST['username'];
            $pass = $_POST['pass'];
            $userDb = $this->modelAdmin->getUserByUsername($user);
          
            if(!empty($userDb) && password_verify($pass, $userDb->password)){ 
                session_start();
                $_SESSION['ID_USER'] = $userDb->id;
                $_SESSION['USERNAME'] = $userDb->username;
               header('Location: '. URLBASE."adminView");
            }else{
             $this->showError("error de inicio de session");
            }
        }
    }
    public function logout() {
        session_status();
        session_destroy();        
        header('Location: '.URLBASE.'login');
    }
    
    public function getLogin(){
    $this->login->showLogin();
    }
    
    public function adminActive(){
        $categorys = $this->modelCategory->getAllCategory();
        $games = $this->modelGame->getAllGame();
        $this->view->viewAdmin($games, $categorys);
    }
    public function showError($mensegge){      
        $categorysid = $this->modelCategory->getAllCategory(); 
          $this->view->showErrorView($mensegge, $categorysid);
      }
    
         
}



?>