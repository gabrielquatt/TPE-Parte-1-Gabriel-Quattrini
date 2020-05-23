<?php
include_once('helpers/auth.helper.php');
require_once('view.php');

class adminView extends View{ 

    function viewAdmin($games, $categorys){   
        $this->getSmarty()->assign('title', 'ADMIN');
        $this->getSmarty()->assign('categorys', $categorys);
        $this->getSmarty()->assign('games', $games);   
        $this->getSmarty()->display('templates/admin.tpl');
    }
}
?>