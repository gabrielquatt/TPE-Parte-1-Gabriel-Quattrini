<?php

require_once('view.php');

class loginView extends View{

    public function showLogin(){     
            $this->getSmarty()->assign('ocultSearch', 0);//oculta el btn acceder y el search
            $this->getSmarty()->assign('title', 'LOGIN');
            $this->getSmarty()->display('templates/login.tpl'); 
        } 
}
?>