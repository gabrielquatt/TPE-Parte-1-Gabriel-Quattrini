<?php

require_once('libs/Smarty.class.php');

 class gameView{
   
    public $smarty;
    
    function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('url', URLBASE);
    }

    function viewGames($categorys) {
        $this->smarty->assign('activeSearch', 0);
        $this->smarty->assign('user', 0);//iniciar o cerrar secsion... a desarollar.
        $this->smarty->assign('title', 'CATEGORYS');
        $this->smarty->assign('categorys', $categorys);    
        $this->smarty->display('templates/category.tpl');
    }
     
    function viewDetail($games, $categorys){
        $this->smarty->assign('activeSearch', 0);
        $this->smarty->assign('user', 0);//iniciar o cerrar secsion... a desarollar.
        $this->smarty->assign('title', 'GAMES');
        $this->smarty->assign('categorys', $categorys);
        $this->smarty->assign('games', $games);   
        $this->smarty->display('templates/detail.tpl');
    }
   

    public function showErrorView($mensagge, $categorys)
    {
        $this->smarty->assign('activeSearch', 0);
        $this->smarty->assign('title', 'ERROR');
        $this->smarty->assign('text', $mensagge);
        $this->smarty->assign('categorys', $categorys);
        $this->smarty->display('templates/error.tpl'); 
    }

}
?>