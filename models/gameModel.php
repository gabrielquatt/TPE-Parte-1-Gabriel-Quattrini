<?php

require_once('model.php');

class gameModel extends model{
  
    /**
     *  Funcion que trae de la base de datos todas los juegos de la tabla game
     * 
     */
    public function getAllGame(){
        $query = $this->getdb()->prepare('SELECT * FROM game');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
    *  funcion que traera todos los juegos cuyo id_category sea la misma que la mandanda por parametro
    * ($categoryID esta vinculada al requerimiento de mostrar items por categoria especifica)
    */
    public function getGameSpecific($categoryID) {
         $querys = $this->getdb()->prepare('SELECT game.*, category.name as category FROM
         game JOIN category ON game.id_category = category.id WHERE category.id = ?');
         $querys->execute([$categoryID]);
         return $querys->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     *  Funcion que traera los datos del juego que tenga el mismo nombre del que se busca. 
     * 
     */
    public function searchGame($nameGame){
        $query = $this->getdb()->prepare('SELECT * FROM game WHERE name = ?');
        $query->execute([$nameGame]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     *  Funcion que eliminara de la base de datos el "juego" segun su id mandada por parametro
     * 
     */
    public function deleteGameDB($id) {
        $query = $this->getdb()->prepare('DELETE FROM game WHERE id = ?');
        $query->execute([$id]);
    }
   
    /**
     *  Funcion guardara el "juego" en la base de datos
     * 
     */
    public function saveGameDB($title,$detail,$category,$qualification) {
        $query = $this->getdb()->prepare('INSERT INTO game (name, detail ,id_category, qualification ) VALUES (?,?,?,?)');
        return $query->execute([$title,$detail,$category,$qualification]);
    }

    /**
     *  Funcion que editara juego con los nuevos valores mandados, recibe el id del juego a editar. 
     * 
     */
    public function editGameDB($title,$detail,$category,$qualification,$game) {
        $query = $this->getdb()->prepare('UPDATE  game SET name = ?, detail = ?, id_category = ?, qualification = ? WHERE id = ?');
        $query->execute([$title,$detail,$category,$qualification,$game]);
    }
}
?>