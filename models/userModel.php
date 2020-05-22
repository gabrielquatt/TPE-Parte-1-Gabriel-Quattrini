<?php

class userModel{
  
    private $db;
   
       public function __construct(){
           $this->db = new PDO('mysql:host=localhost;dbname=games;charset=utf8', 'root', '');
        }
    /**
     * Retorna un usuario según el email pasado.
     */
    public function getUserByUsername($username){
        $query = $this->db->prepare('SELECT * FROM registry WHERE username = ?');
        $query->execute(array(($username)));
        return $query->fetch(PDO::FETCH_OBJ);
    }
}
?>