<?php

require_once('Model.php');

class UserModel extends Model{
  /**
   * funcion para traer el usuarios con el nombre igual al parametro mandado
   */
    public function getUserByUsername($username){
        $query = $this->getdb()->prepare('SELECT * FROM registry  WHERE username = ?');
        $query->execute(array(($username)));
        return $query->fetch(PDO::FETCH_OBJ);
    }
    /**
     * funcion para traer todos los usuarios menos el selecionado
     */
    public function getUsers($userName){
       $query = $this->getdb()->prepare('SELECT * FROM `registry` WHERE `username` != ?');
       $query->execute([$userName]);
       return $query->fetchAll(PDO::FETCH_OBJ);     
    }
    /**
     * funcion para traer todos los administradores de la pagina
     */
     public function admiAcces($username) {// no trae password
         $query = $this->getdb()->prepare('SELECT `id`,`username`,`priority` FROM `registry` WHERE `username` = ? AND `priority` = 1');
         $query->execute([$username]);
         return $query->fetchAll(PDO::FETCH_OBJ);
     }
     /**
     * funcion para traer solo el nombre del ususario
     */
     public function getAllUserName($username){
        $query = $this->getdb()->prepare('SELECT `username` FROM `registry` WHERE  `username` = ?');
        $query->execute([$username]);
        return $query->fetchAll(PDO::FETCH_OBJ);     
     }
     /**
     * funcion para traer todos los usuarios que tengan el nombre y el email igual a los datos pasados
     */
     public function getAllMailAndName($email,$user){
        $query = $this->getdb()->prepare('SELECT `email`,`username` FROM `registry` WHERE `email` = ? AND `username` = ? ');
        $query->execute([$email,$user]);
        return $query->fetchAll(PDO::FETCH_OBJ);     
     }
    /**
     * funcion para guardar usuarios registrados
     */
     public function  saveUser($userName,$email,$pass){
        $query = $this->getdb()->prepare('INSERT INTO `registry` (`username`,`email`,`password`) VALUES (?,?,?)');
        return $query->execute([$userName,$email,$pass,]);
    }
    /**
     * funcion para editar la prioridad que tiene ese usuario en la pagina
     */
    public function editPriorityDB($priority,$userId){
        $query = $this->getdb()->prepare('UPDATE `registry` SET `priority` =  ? WHERE `id` = ?');
        return $query->execute([$priority,$userId]);
    }
    /**
     * funcion para eliminar un usuario registrado (nota: solo elimina no hay funcion de bloqueo)
     */
    public function userDelete($idUser){
        $query = $this->getdb()->prepare('DELETE FROM `registry` WHERE id = ?');
        $query->execute([$idUser]);
    }
   /**
     * funcion para guardar los datos que habilitan la edicion de la contraseña
     */
    public function accesToEdit($fechaRecuperacion,$codigo,$email){
        $query = $this->getdb()->prepare('UPDATE `registry` SET `date` =  ?,`token` = ? WHERE `email` = ?');
        return $query->execute([$fechaRecuperacion,$codigo,$email]);
    }
    /**
     * funcion para actualizar la contraseña, el codigo y el usuario
     */
    public function updatePassword($pass,$codigo,$user){
        $query = $this->getdb()->prepare('UPDATE `registry` SET `password` =  ?, `token` = ? WHERE `username` = ?');
        return $query->execute([$pass,$codigo,$user]);
    }
}
?>