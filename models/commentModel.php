<?php

require_once('model.php');

class CommentModel extends model
{
    /**
     * funcion para traer todos los comentarios de la base de datos
     */
    public function getComments()
    {
        $query = $this->getdb()->prepare('SELECT * FROM commentary');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * funcion para eliminar comentario segun su id
     * @param idComment //id del comentario.
     */
    public function deleteCommentId($idComment)
    {
        $query = $this->getdb()->prepare('DELETE FROM `commentary` WHERE id = ?');
        $query->execute([$idComment]);
    }
    /**
     * funcion para traer todos los comentarios de la base de datos segun su id.
     */
    public function  getCommentsId($idComment)
    {
        $query = $this->getdb()->prepare('SELECT * FROM `commentary` WHERE id_game = ?');
        $query->execute([$idComment]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
/**
 * funcion para Guardar un comentario por ApiRest method: POST
 */
    public function postComments($gameId, $user, $commentary, $data, $puntage)
    {
        $query = $this->getdb()->prepare('INSERT INTO `commentary` (id_game,user,comentario,fecha,calificacion) VALUES (?,?,?,?,?)');
        return  $query->execute([$gameId, $user, $commentary, $data, $puntage]);
    }
}