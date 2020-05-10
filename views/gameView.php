<?php
require_once('libs/Smarty.class.php');
 class gameView{
   
    function viewGames($categorys) {
        $smarty = new Smarty();
        $smarty->assign('title', 'CATEGORYS');
        $smarty->assign('categorys', $categorys);    
        $smarty->assign('style','css/style.css');
        $smarty->assign('urlnav','details/');
        $smarty->assign('urlhome','game');
        $smarty->display('templates/category.tpl');
    }
     
    function viewDetail($games, $categorys){
        $smarty = new Smarty();
        $smarty->assign('title', 'GAMES');
        $smarty->assign('categorys', $categorys);
        $smarty->assign('games', $games);    
        $smarty->assign('style','../css/style.css');
        $smarty->assign('urlnav','../details/');
        $smarty->assign('urlhome','../game');
        $smarty->display('templates/detail.tpl');
    }
 
}
?>