<?php

require_once('model.php');

class CaptureModel extends model
{ 

    public function saveCapturas($id_game, $imagenes)
    {
        $rutas = $this->subirImagenes($imagenes);
        $sentencia_imagenes = $this->getdb()->prepare('INSERT INTO `capturas` (`id_game_fk`,`captura`) VALUES(?,?)');
        foreach ($rutas as $ruta) {
            $sentencia_imagenes->execute([$id_game, $ruta]);
        }
    }
    
    private function subirImagenes($imagenes)
    {
        $rutas = [];
        foreach ($imagenes as $imagen) {
            $destino_final = 'img/capturas/' . uniqid() . '.jpg';
            move_uploaded_file($imagen, $destino_final);
            $rutas[] = $destino_final;
        }
        return $rutas;
    }

    public function allImagesId($gameID){
        $query = $this->getdb()->prepare('SELECT * FROM `capturas` WHERE `id_game_fk` = ?');
        $query->execute([$gameID]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function deleteCaptura($idCaptura){
        $query = $this->getdb()->prepare('DELETE FROM`capturas` WHERE id = ?');
        $query->execute([$idCaptura]);
    }
   
}