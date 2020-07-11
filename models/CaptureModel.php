<?php

require_once('model.php');

class CaptureModel extends Model
{ 

    public function saveCapturas($id_game, $imagenes)
    {
        $rutas = $this->subirImagenes($imagenes);//funcion para comvertir cada elemnto recivido
        $sentencia_imagenes = $this->getdb()->prepare('INSERT INTO `capturas` (`id_game_fk`,`captura`) VALUES(?,?)');
        foreach ($rutas as $ruta) {
            $sentencia_imagenes->execute([$id_game, $ruta]);//foreach para guardar cada imagen una por una
        }
    }
    
    private function subirImagenes($imagenes)
    {
        $rutas = [];
        foreach ($imagenes as $imagen) {//guardara cada images como jpg
            $destino_final = 'img/capturas/' . uniqid() . '.jpg';
            move_uploaded_file($imagen, $destino_final);
            $rutas[] = $destino_final;//las guardara en un arreglo 
        }
        return $rutas;
    }
/**
 * Funcion para traer todas las images por Id de juego
 */
    public function allImagesId($gameID){
        $query = $this->getdb()->prepare('SELECT * FROM `capturas` WHERE `id_game_fk` = ?');
        $query->execute([$gameID]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
/**
 * Funcion para liminar captura segun su id
 */
    public function deleteCaptura($idCaptura){
        $query = $this->getdb()->prepare('DELETE FROM`capturas` WHERE id = ?');
        $query->execute([$idCaptura]);
    }
   
}