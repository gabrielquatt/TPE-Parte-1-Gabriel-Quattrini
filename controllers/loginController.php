<?php

include_once ('Controller.php');

 class LoginController extends Controller{
     
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
    public function openRegister(){
    $this->getloginview()->showRegister();
    }
    /**
    * funcion para ver la vista de administrador
    */  
    public function adminActive(){
        $acces = AuthHelper::getLoggedUserName();
        if (isset($acces)){
            $categorys = $this->getmodelcategoty()->getAllCategory(); 
            $games = $this->getgamemodel()->getAllGame();
            $admin = AuthHelper::getPriorityUser();//TODO a desarrollar para mandar permiso.
            if(isset($admin)){
                $array =  $this->user();
                $users =  $this->getusermodel()->getUsers($acces);
               $this->getadminview()->viewAdmin($games, $categorys, $users,$array);
            }else{
                header("Location: home");
           }
        }else{
            $this->accessError();
        }
    }   
   public function saveUser(){
       $userName = $_POST['username'];
       $pass = $_POST['pass'];
       $email = $_POST['email'];
      
       $repetname = $this->getusermodel()->getAllUser($userName);
       $repetemail= $this->getusermodel()->getAllEmail($email);
       if(!empty($repetname)){
        echo'<script type="text/javascript" >alert("NOMBRE YA UTILIZADO");window.location.href="registro";</script>';
       }else if(!empty($repetemail)){
        echo'<script type="text/javascript">alert("EMAIL YA REGISTRADO");window.location.href="registro";</script>';
       }else{
        $pass = password_hash($pass,PASSWORD_BCRYPT);
        $complete = $this->getusermodel()->saveUser($userName,$email,$pass);
        if($complete){
            echo'<script type="text/javascript">alert("GUARDADO CON EXITO");window.location.href="login";</script>';
        }else{
            $this->showError('no se pudo cargar ususario');
        }
       }

        
   }
 
    public function accessError(){      
        $admin = $this->admin();
        $categorysid = $this->getmodelcategoty()->getAllCategory(); 
        $this->geterrorview()->accesserror($categorysid,$admin);    
      }   

    public function editPriority(){
        $userId = $_POST['userId'];
        $priority = $_POST['priority'];
        $this-> getusermodel()->editPriorityDB($priority,$userId);
        header("Location: adminView");
    }
}
?>