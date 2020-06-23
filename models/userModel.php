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
     public function admiAcces($username) {
         $query = $this->getdb()->prepare('SELECT * FROM `registry` WHERE `username` = ? AND `priority` = 1');
         $query->execute([$username]);
         return $query->fetchAll(PDO::FETCH_OBJ);
     }
     public function getAllUser($userName){
        $query = $this->getdb()->prepare('SELECT * FROM `registry` WHERE `username` = ?');
        $query->execute([$userName]);
        return $query->fetchAll(PDO::FETCH_OBJ);
     }
     public function getAllEmail($email){
        $query = $this->getdb()->prepare('SELECT * FROM `registry` WHERE `email` = ?');
        $query->execute([$email]);
        return $query->fetchAll(PDO::FETCH_OBJ);     
     }
     public function getUsers($userName){
        $query = $this->getdb()->prepare('SELECT * FROM `registry` WHERE `username` != ?');
        $query->execute([$userName]);
        return $query->fetchAll(PDO::FETCH_OBJ);     
     }
     public function  saveUser($userName,$email,$pass){
                //TODO guardar usuario DB
        $query = $this->getdb()->prepare('INSERT INTO `registry` (`username`,`email`,`password`) VALUES (?,?,?)');
        return $query->execute([$userName,$email,$pass,]);
    }
    public function editPriorityDB($priority,$userId){
        $query = $this->getdb()->prepare('UPDATE `registry` SET `priority` =  ? WHERE id = ?');
        $query->execute([$priority,$userId]);
    }
}
?>