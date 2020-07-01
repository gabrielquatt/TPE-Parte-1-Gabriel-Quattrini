<?php

require_once('View.php');

class LoginView extends View{
   
     public function showLogin(){     
             $this->getSmarty()->assign('title', 'LOGIN');
             $this->getSmarty()->display('templates/login.tpl'); 
         } 
         public function showRegister(){     
             $this->getSmarty()->assign('title', 'REGISTRO');
             $this->getSmarty()->display('templates/registro.tpl'); 
         } 
}
?>