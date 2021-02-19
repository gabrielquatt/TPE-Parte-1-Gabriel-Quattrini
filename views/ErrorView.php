<?php

require_once('View.php');

class ErrorView extends View{

    public function showErrorView($mensagge, $categorys,$dataUser){
        $this->getSmarty()->assign('title', 'ERROR');
        $this->getSmarty()->assign('text', $mensagge);
        $this->getSmarty()->assign('categorys', $categorys);
        if($dataUser){
            $this->getSmarty()->assign('admin', $dataUser['priority']);   
            $this->getSmarty()->assign('username', $dataUser['name']);
        }
        $this->getSmarty()->display('templates/error.tpl'); 
    }
    public function accessError($categorys,$dataUser){
        $this->getSmarty()->assign('title', 'ACCES ERROR');
        $this->getSmarty()->assign('categorys', $categorys);
        if($dataUser){
            $this->getSmarty()->assign('admin', $dataUser['priority']);   
            $this->getSmarty()->assign('username', $dataUser['name']);
        }
        $this->getSmarty()->display('templates/accessError.tpl'); 
    }    
}
?>