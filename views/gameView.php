<?php

require_once('View.php');

class GameView extends View{

    function viewHome($categorys,$array) 
    {   
        $this->getSmarty()->assign('title', 'CATEGORYS');
        $this->getSmarty()->assign('categorys', $categorys); 
        $this->getSmarty()->assign('admin',$array['priority']);   
        $this->getSmarty()->assign('username',$array['name']);
        $this->getSmarty()->display('templates/home.tpl');
    }
    
    function viewDetail($games, $categorys,$array)
    {
        $this->getSmarty()->assign('title', 'GAMES');
        $this->getSmarty()->assign('categorys', $categorys);
        $this->getSmarty()->assign('games', $games);   
        $this->getSmarty()->assign('admin',$array['priority']);
        $this->getSmarty()->assign('username',$array['name']);
        $this->getSmarty()->display('templates/detail.tpl');
    }

    public function viewGameDetail($games, $categorys,$array)
    {
        $this->getSmarty()->assign('title', 'GAMES');
        $this->getSmarty()->assign('categorys', $categorys);
        $this->getSmarty()->assign('games', $games);   
        $this->getSmarty()->assign('admin',$array['priority']);
        $this->getSmarty()->assign('username',$array['name']);
        $this->getSmarty()->display('templates/detailGame.tpl');
    }
    
     public function showErrorView($mensagge, $categorys,$array)
     {
         $this->getSmarty()->assign('title', 'ERROR');
         $this->getSmarty()->assign('text', $mensagge);
         $this->getSmarty()->assign('categorys', $categorys);
         $this->getSmarty()->assign('admin',$array['priority']);
         $this->getSmarty()->assign('username',$array['name']);
         $this->getSmarty()->display('templates/error.tpl'); 
        }  
}
?>