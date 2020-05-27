<?php

require_once('view.php');

class errorView extends View{

    public function showErrorView($mensagge, $categorys){
        $this->getSmarty()->assign('title', 'ERROR');
        $this->getSmarty()->assign('text', $mensagge);
        $this->getSmarty()->assign('categorys', $categorys);
        $this->getSmarty()->display('templates/error.tpl'); 
    }  
}
?>