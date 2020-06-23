<?php

require_once('libs/smarty/Smarty.class.php');
include_once('helpers/auth.helper.php');

class View  {

    private $smarty;
   
    public function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->assign('url', URLBASE);
    }    
    
    public function getSmarty() {
        return $this->smarty;
    }
    
}
