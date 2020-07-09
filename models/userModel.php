<?php

require_once('model.php');

class userModel extends model{
  
    public function getUserByUsername($username){//TODO arreglar para no traer password
        $query = $this->getdb()->prepare('SELECT * FROM registry  WHERE username = ?');
        $query->execute(array(($username)));
        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function getUsers($userName){//TODO arreglar para no traer password
       $query = $this->getdb()->prepare('SELECT `username`,`email` FROM `registry` WHERE `username` != ?');
       $query->execute([$userName]);
       return $query->fetchAll(PDO::FETCH_OBJ);     
    }
     public function admiAcces($username) {//TODO arreglar para no traer password
         $query = $this->getdb()->prepare('SELECT `username`,`priority` FROM `registry` WHERE `username` = ? AND `priority` = 1');
         $query->execute([$username]);
         return $query->fetchAll(PDO::FETCH_OBJ);
     }
     public function getAllEmail($email){//TODO arreglar para no traer password
        $query = $this->getdb()->prepare('SELECT `email` FROM `registry` WHERE `email` = ?');
        $query->execute([$email]);
        return $query->fetchAll(PDO::FETCH_OBJ);     
     }
     public function  saveUser($userName,$email,$pass){
        $query = $this->getdb()->prepare('INSERT INTO `registry` (`username`,`email`,`password`) VALUES (?,?,?)');
        return $query->execute([$userName,$email,$pass,]);
    }
    public function editPriorityDB($priority,$userId){
        $query = $this->getdb()->prepare('UPDATE `registry` SET `priority` =  ? WHERE id = ?');
        $query->execute([$priority,$userId]);
    }
    public function userDelete($idUser){
        $query = $this->getdb()->prepare('DELETE FROM `registry` WHERE id = ?');
        $query->execute([$idUser]);
    }
}
?>