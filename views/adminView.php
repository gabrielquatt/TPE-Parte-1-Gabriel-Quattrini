<?php

require_once('libs/Smarty.class.php');
include_once('helpers/auth.helper.php');

class adminView{
   
    public $smarty;

    function __construct()
     {  
        $authHelper = new AuthHelper();
        $username = $authHelper->getLoggedUserName();

        $this->smarty = new Smarty();
        $this->smarty->assign('url', URLBASE);
        $this->smarty->assign('username',$username);
    }
    function viewAdmin($games, $categorys){   
               $this->smarty->assign('title', 'ADMIN');
               $this->smarty->assign('categorys', $categorys);
               $this->smarty->assign('games', $games);   
               $this->smarty->display('templates/admin.tpl');
    }
}
?>