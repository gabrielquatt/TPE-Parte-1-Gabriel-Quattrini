<?php

require_once('View.php');

class ErrorView extends View{

    public function showErrorView($mensagge, $categorys,$array){
        $this->getSmarty()->assign('title', 'ERROR');
        $this->getSmarty()->assign('text', $mensagge);
        $this->getSmarty()->assign('categorys', $categorys);
        if($array){
            $this->getSmarty()->assign('admin', $array['priority']);   
            $this->getSmarty()->assign('username', $array['name']);
        }
        $this->getSmarty()->display('templates/error.tpl'); 
    }
    public function accessError($categorys,$array){
        $this->getSmarty()->assign('title', 'ACCES ERROR');
        $this->getSmarty()->assign('categorys', $categorys);
        if($array){
            $this->getSmarty()->assign('admin', $array['priority']);   
            $this->getSmarty()->assign('username', $array['name']);
        }
        $this->getSmarty()->display('templates/accessError.tpl'); 
    }    
}
?>