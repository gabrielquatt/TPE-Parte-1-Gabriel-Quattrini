<?php

class gameModel{
  
 private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=games;charset=utf8', 'root', '');
        $host = 'localhost';
        $userName = 'root';
        $password = '';
        $database = 'games';

        try {
            $this->db = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $userName, $password);
    
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (Exception $e) {
            var_dump($e);
        }
    } 

    /**
     *  Funcion que trae de la base de datos todas los juegos de la tabla game
     * 
     */
    public function getAllGame(){
        $query = $this->db->prepare('SELECT * FROM game');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
    *  funcion que traera todos los juegos cuyo id_category sea la misma que la mandanda por parametro
    * ($categoryID esta vinculada al requerimiento de mostrar items por categoria especifica)
    */
    public function getGameSpecific($categoryID) {
         $querys = $this->db->prepare('SELECT game.*, category.name as category FROM
         game JOIN category ON game.id_category = category.id WHERE category.id = ?');
         $querys->execute([$categoryID]);
         return $querys->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     *  Funcion que traera los datos del juego que tenga el mismo nombre del que se busca. 
     * 
     */
    public function searchGame($nameGame){
        $query = $this->db->prepare('SELECT * FROM game WHERE name = ?');
        $query->execute([$nameGame]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     *  Funcion que eliminara de la base de datos el "juego" segun su id mandada por parametro
     * 
     */
    public function deleteGameDB($id) {
        $query = $this->db->prepare('DELETE FROM game WHERE id = ?');
        $query->execute([$id]);
    }
   
    /**
     *  Funcion guardara el "juego" en la base de datos
     * 
     */
    public function saveGameDB($title,$detail,$category,$qualification) {
        $query = $this->db->prepare('INSERT INTO game (name, detail ,id_category, qualification ) VALUES (?,?,?,?)');
        return $query->execute([$title,$detail,$category,$qualification]);
    }

    /**
     *  Funcion que editara juego con los nuevos valores mandados, recibe el id del juego a editar. 
     * 
     */
    public function editGameDB($title,$detail,$category,$qualification,$game) {
        $query = $this->db->prepare('UPDATE  game SET name = ?, detail = ?, id_category = ?, qualification = ? WHERE id = ?');
        $query->execute([$title,$detail,$category,$qualification,$game]);
    }
}
?>