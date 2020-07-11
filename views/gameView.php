<?php

require_once('View.php');

class GameView extends View{

    function viewHome($categorys,$dataUser) 
    {   
        $this->getSmarty()->assign('title', 'HOME');
        $this->getSmarty()->assign('categorys', $categorys); 
        if($dataUser){
            $this->getSmarty()->assign('admin', $dataUser['priority']);   
            $this->getSmarty()->assign('username',$dataUser['name']);
        }
        $this->getSmarty()->display('templates/home.tpl');
    }
    
    function viewDetail($games, $categorys,$dataUser)
    {
        $this->getSmarty()->assign('title', 'GAMES');
        $this->getSmarty()->assign('categorys', $categorys);
        $this->getSmarty()->assign('games', $games);   
        if($dataUser){
            $this->getSmarty()->assign('admin',$dataUser['priority']);   
            $this->getSmarty()->assign('username',$dataUser['name']);
        }
        $this->getSmarty()->display('templates/detail.tpl');
    }

    public function viewGameDetail($games, $categorys,$dataUser,$capturas)
    {
        $this->getSmarty()->assign('title', 'GAME');
        $this->getSmarty()->assign('categorys', $categorys);
        $this->getSmarty()->assign('games', $games);   
        $this->getSmarty()->assign('capturas', $capturas);
        if($dataUser){
            $this->getSmarty()->assign('admin',$dataUser['priority']);   
            $this->getSmarty()->assign('username', $dataUser['name']);
        }else{
            $this->getSmarty()->assign('admin',null);   
            $this->getSmarty()->assign('username', null);
        }
        $this->getSmarty()->display('templates/info-Game.tpl');
    }
    
     public function showErrorView($mensagge, $categorys,$dataUser)
     {
         $this->getSmarty()->assign('title', 'ERROR');
         $this->getSmarty()->assign('text', $mensagge);
         $this->getSmarty()->assign('categorys', $categorys);
         if($dataUser){
            $this->getSmarty()->assign('admin',$dataUser['priority']);   
            $this->getSmarty()->assign('username',$dataUser['name']);
        }else
         $this->getSmarty()->display('templates/error.tpl'); 
        }  
}
?>