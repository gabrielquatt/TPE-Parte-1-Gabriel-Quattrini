<?php
// include_once('helpers/auth.helper.php');
require_once('View.php');

class AdminView extends View{ 

    function viewAdmin($games, $categorys, $users,$array){   
        $this->getSmarty()->assign('title', 'ADMIN');
        $this->getSmarty()->assign('categorys', $categorys);
        $this->getSmarty()->assign('games', $games);

        $this->getSmarty()->assign('admin',$array['priority']); //prioridad de usuario
        $this->getSmarty()->assign('username',$array['name']);// nombre de usuario

        $this->getSmarty()->assign('users', $users);
      
        $this->getSmarty()->assign('array',$array['name']);
        $this->getSmarty()->assign('priority',$array['priority']);
      
        $this->getSmarty()->display('templates/admin.tpl');


        // $this->smarty->assign('admin',$admin);
        
    }
}
?>