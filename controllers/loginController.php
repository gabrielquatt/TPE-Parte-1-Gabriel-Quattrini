<?php

include_once ('views/adminView.php');

 class loginController {
  
    private $view;

    public function __construct(){
       $this ->view = new adminView();
    }

    public function verifyLogin(){
     if((empty($_POST['email'])) && (empty($_POST['pass']))){
          header('Location: login');
          die();
        }
        else{
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            echo ($email .' '.$pass); 
        }
    }
 
    public function getLogin()
    {
    $this->view->showLogin();
    }

}



?>