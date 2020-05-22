<?php

require_once('libs/Smarty.class.php');
include_once('helpers/auth.helper.php');

class gameView{
    
    public $smarty;
    
    function __construct()
    {
        $authHelper = new AuthHelper();
        $username = $authHelper->getLoggedUserName();
        $this->smarty = new Smarty();
        $this->smarty->assign('url', URLBASE);
        $this->smarty->assign('username',$username);
    }
    function viewGames($categorys) {   
        $this->smarty->assign('title', 'CATEGORYS');
        $this->smarty->assign('categorys', $categorys);    
        $this->smarty->display('templates/category.tpl');
    }
    
    function viewDetail($games, $categorys){
        $this->smarty->assign('title', 'GAMES');
        $this->smarty->assign('categorys', $categorys);
        $this->smarty->assign('games', $games);   
        $this->smarty->display('templates/detail.tpl');
    }
    
    public function showErrorView($mensagge, $categorys){
        $this->smarty->assign('title', 'ERROR');
        $this->smarty->assign('text', $mensagge);
        $this->smarty->assign('categorys', $categorys);
        $this->smarty->display('templates/error.tpl'); 
    }
    
}
?>