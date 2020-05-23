<?php

require_once('libs/Smarty.class.php');
include_once('helpers/auth.helper.php');

class View  {

    private $smarty;
   
    public function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->assign('url', URLBASE);
        $username = $this->getauthHelper()->getLoggedUserName();
        $this->smarty->assign('username',$username);
    }    
    
    public function getSmarty() {
        return $this->smarty;
    }
    public function getauthHelper(){
        $authHelper = new AuthHelper();
        return $authHelper;
    }
}
