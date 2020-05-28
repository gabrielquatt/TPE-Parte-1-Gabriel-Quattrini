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
                AuthHelper::login($userDb);
                header('Location: '. URLBASE."adminView");
            }else{             
                header('Location: '. URLBASE."login ");
            }
        }
    }
    /**
    * funcion que destruira cualquier session iniciada
    */  
    public function logout() {
        AuthHelper::logout();     
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
        $acces = AuthHelper::getLoggedUserName();
        $categorys = $this->getmodelcategoty()->getAllCategory();
        $games = $this->getgamemodel()->getAllGame();
        if (isset($acces)){
            $this->getadminview()->viewAdmin($games, $categorys);
        }else{
            $this->accessError();
        }
    }    
    public function accessError(){      
        $categorysid = $this->getmodelcategoty()->getAllCategory(); 
        $this->geterrorview()->accesserror($categorysid);    
      }   
}
?>