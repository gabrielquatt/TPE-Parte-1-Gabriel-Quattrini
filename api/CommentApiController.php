<?php

require_once('ApiController.php');

class CommentApiController extends ApiController
{
    public function  getComments($params = [])
    {
        $idGame = $params[':ID']; //id del juego 
        $valor = $params[':DATA'];

        if ($params[':ORDER'] == "ASC") {
            $comments =  $this->modelComment()->commentOrderASC($idGame, $valor); 
        } else if ($params[':ORDER'] == "DESC"){
            $comments =  $this->modelComment()->commentOrderDESC($idGame, $valor); 
        }else{
            $comments =  $this->modelComment()->getComments($idGame);
        }
         if ($comments)
             $this->ApiView()->response($comments, 200);
         else
             $this->ApiView()->response(null, 200);
    }

    public function deleteComment($params = [])
    {
        $idComment = $params[':ID'];
        $this->modelComment()->deleteCommentId($idComment);
        $this->ApiView()->response("comentario eliminado", 200);
    }

    public function postComment()
    {
        $body = $this->getData();

        $gameId = $body->id_game;
        $user = $body->user;
        $commentary = $body->comentario;
        $data = $body->fecha;
        $puntage = $body->calificacion;

        $comments = $this->modelComment()->postComments($gameId, $user, $commentary, $data, $puntage);
        $this->ApiView()->response($comments, 200); //insert en nuestra BD
    }
}
