<?php
require_once('libs/Smarty.class.php');
 class gameView{
   
    function viewGames($categorys) {
        $smarty = new Smarty();
        $smarty->assign('title', 'CATEGORYS');
        $smarty->assign('categorys', $categorys);    
        $smarty->display('templates/category.tpl');
    }
     
    function viewDetail($games){
        $smarty = new Smarty();
        $smarty->assign('title', 'GAMES');
        $smarty->assign('games', $games);    
        $smarty->display('templates/detail.tpl');
    }
      
 }
?>