<?php
require_once('libs/Smarty.class.php');


class loginView{

public $smarty;

public function __construct() {  
    $this->smarty = new Smarty();
    $this->smarty->assign('url', URLBASE);
    
}

public function showLogin()
        {     
            $this->smarty->assign('ocultSearch', 0);//oculta el btn acceder y el search
            $this->smarty->assign('title', 'LOGIN');
            $this->smarty->display('templates/login.tpl'); 
        }
        
}
?>