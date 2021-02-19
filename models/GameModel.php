<?php

require_once('Model.php');

class GameModel extends Model
{

    /**
     *  Funcion que trae de la base de datos todas los juegos de la tabla game
     * 
     */
    public function getAllGame()
    {
        $query = $this->getdb()->prepare('SELECT * FROM game');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Funcion para traer un juego especifico segun su id
     * 
     */
    public function getGame($gameid)
    {
        $query = $this->getdb()->prepare('SELECT * FROM game WHERE id = ?');
        $query->execute([$gameid]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    
    /**
     * Funcion que traera todos los juegos cuyo id_category sea la misma que la mandanda por parametro
     * @param categoryID esta vinculada al requerimiento de mostrar items por categoria especifica)
     */
    public function getGamesCategory($categoryID)
    {
        $querys = $this->getdb()->prepare('SELECT game.*, category.name as category FROM
         game JOIN category ON game.id_category = category.id WHERE category.id = ?');
        $querys->execute([$categoryID]);
        return $querys->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     *  Funcion que eliminara de la base de datos el "juego" segun su id mandada por parametro
     * 
     */
    public function deleteGameDB($id)
    {
        $query = $this->getdb()->prepare('DELETE FROM game WHERE id = ?');
        $query->execute([$id]);
    }

    
    /**
     *  Funcion que editara juego con los nuevos valores mandados, recibe el id del juego a editar. 
     * 
     */
    public function editGameDB($title, $detail, $category, $game)
    {
        $query = $this->getdb()->prepare('UPDATE  game SET name = ?, detail = ?, id_category = ? WHERE id = ?');
        $query->execute([$title, $detail, $category, $game]);
    }
    
    /**
     *  Funcion guardara el "juego" en la base de datos
     * 
     */
    public function saveGameDB($title, $detail, $category, $image = NULL)
    {
        $pathImg = 'img/portadaError.jpg';
        if ($image)
        $pathImg = $this->uploadImage($image);
            
            $query = $this->getdb()->prepare('INSERT INTO game (name, detail ,id_category,image) VALUES (?,?,?,?)');
            return $query->execute([$title, $detail, $category, $pathImg]);
    }

    /**
     * Funcion para guardar imagen el en servidor //nota la portada no se guarda en la tabla image en el servidor
     * 
     */
    private function uploadImage($image)
    {
        $target = 'img/portada/' . uniqid() . '.jpg';
        move_uploaded_file($image, $target);
        return $target;
    }
       
    /**
     * Funcion para eliminar portada
     * 
     */
    public function deletePortada($id)
    {
        $query = $this->getdb()->prepare('DELETE image FROM game WHERE id = ?');
        $query->execute([$id]);
    }

    /**
     * Funcion para traer especificamente la Portada de un juego de la base de datos (nota funcion utilizada por ApiRest)
     * 
     */
    public function getImg($idGame)
    {
        $query = $this->getdb()->prepare('SELECT image FROM game WHERE id = ?');
        $query->execute([$idGame]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Funcion para editar Imagen de portada
     * @param img = siempre sera una imagen chequeado en el controller
     */
    public function editPortada($img,$idGame)
    {
        $pathImg = 'img/portadaError.jpg';
        if ($img)
            $pathImg = $this->uploadImage($img);
            
            $query = $this->getdb()->prepare('UPDATE  game SET image = ? WHERE id = ?');
        return $query->execute([$pathImg, $idGame]);
    }
}
