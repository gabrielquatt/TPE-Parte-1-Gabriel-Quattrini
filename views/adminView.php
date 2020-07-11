<?php
require_once('View.php');

class AdminView extends View{ 

    function viewAdmin($games, $categorys, $users,$dataUser){   
        $this->getSmarty()->assign('title', 'ADMIN');
        $this->getSmarty()->assign('categorys', $categorys);
        $this->getSmarty()->assign('games', $games);
        $this->getSmarty()->assign('admin',$dataUser['priority']); //prioridad de usuario
        $this->getSmarty()->assign('username',$dataUser['name']);// nombre de usuario
        $this->getSmarty()->assign('users', $users);
        $this->getSmarty()->display('templates/admin.tpl');        
    }
    function viewAllUser($categorys, $users,$dataUser){
        $this->getSmarty()->assign('title', 'USERS');
        $this->getSmarty()->assign('categorys', $categorys);
        $this->getSmarty()->assign('admin',$dataUser['priority']); //prioridad de usuario
        $this->getSmarty()->assign('username',$dataUser['name']);// nombre de usuario
        $this->getSmarty()->assign('users', $users);
        $this->getSmarty()->display('templates/users.tpl'); 
    }
}
?>