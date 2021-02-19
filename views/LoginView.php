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
         public function recoverForm(){     
            $this->getSmarty()->assign('title', 'RECOVER');
            $this->getSmarty()->display('templates/form-recover-pass.tpl'); 
        } 
        public function tokenForm($name){     
            $this->getSmarty()->assign('title', 'VERIFY TOKEN');
            $this->getSmarty()->assign('name',$name);
            $this->getSmarty()->display('templates/verifyToken.tpl'); 
        } 
}
?>