<?php

require_once('libs/Smarty.class.php');

class adminView{
    
    public $smarty;
    
    function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('url', URLBASE);
    }

    public function showLogin()
    {     
        $this->smarty->assign('activeSearch', 1);
        $this->smarty->assign('user', 0);//iniciar o cerrar secsion... a desarollar.
        $this->smarty->assign('title', 'LOGIN');
        $this->smarty->display('templates/login.tpl'); 
    }

}
?>