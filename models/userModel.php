<?php

require_once('model.php');

class userModel extends model{
  
    /**
     * Retorna un usuario según el email pasado.
     */
    public function getUserByUsername($username){
        $query = $this->getdb()->prepare('SELECT * FROM registry WHERE username = ?');
        $query->execute(array(($username)));
        return $query->fetch(PDO::FETCH_OBJ);
    }
}
?>