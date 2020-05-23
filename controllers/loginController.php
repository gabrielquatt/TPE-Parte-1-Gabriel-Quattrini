<?php

include_once ('controller.php');

 class loginController extends controller{
     
    /**
    * verificacion de usuario con la base de datos
    */  
    public function verify(){
     if((!empty($_POST['username'])) && (!empty($_POST['pass']))){
            $user= $_POST['username'];
            $pass = $_POST['pass'];
            $userDb = $this-> getusermodel()->getUserByUsername($user);
          
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
    /**
    * funcion que destruira cualquier session iniciada
    */  
    public function logout() {
        session_status();
        session_destroy();        
        header('Location: '.URLBASE.'login');
    }
    /**
    * funcion para cargar login 
    */  
    public function getLogin(){
    $this->getloginview()->showLogin();
    }
    /**
    * funcion para ver la vista de administrador
    */  
    public function adminActive(){
        $categorys = $this->getmodelcategoty()->getAllCategory();
        $games = $this->getgamemodel()->getAllGame();
        $this->getadminview()->viewAdmin($games, $categorys);
    }
    /**
    * funcion de error
    */    
    public function showError($mensegge){      
        $categorysid = $this->getmodelcategoty()->getAllCategory(); 
          $this->getadminview()->showErrorView($mensegge, $categorysid);
      }        
}
?>