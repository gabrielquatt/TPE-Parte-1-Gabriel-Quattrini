<?php

require_once('view.php');

class gameView extends View{

    function viewHome($categorys) {   
        $this->getSmarty()->assign('title', 'CATEGORYS');
        $this->getSmarty()->assign('categorys', $categorys);    
        $this->getSmarty()->display('templates/home.tpl');
    }
    
    function viewDetail($games, $categorys){
        $this->getSmarty()->assign('title', 'GAMES');
        $this->getSmarty()->assign('categorys', $categorys);
        $this->getSmarty()->assign('games', $games);   
        $this->getSmarty()->display('templates/detail.tpl');
    }
    
    public function showErrorView($mensagge, $categorys){
        $this->getSmarty()->assign('title', 'ERROR');
        $this->getSmarty()->assign('text', $mensagge);
        $this->getSmarty()->assign('categorys', $categorys);
        $this->getSmarty()->display('templates/error.tpl'); 
    }  
}
?>