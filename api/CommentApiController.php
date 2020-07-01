<?php

require_once('ApiController.php');

class CommentApiController extends ApiController
{
    public function  getComments($params = [])
    { 
        if(empty($params)){
            $comments = $this->modelComment()->getComments();
            $this->ApiView()->response($comments, 200);
        }else{
            $idComment = $params[':ID'];
            $comments = $this->modelComment()->getCommentsId($idComment); //por ID de categoria traera todos los comentarios
            if ($comments)
                $this->ApiView()->response($comments, 200);
            else
                $this->ApiView()->response("no existe ningun comentario", 404);
        }
    }
    public function deleteComment($params = []){
        $idComment = $params[':ID'];
        $this->modelComment()->deleteCommentId($idComment);
        $this->ApiView()->response( "comentario eliminado", 200);
   
    }

    public function postComment() {
        $body = $this->getData();

        $gameId = $body->id_game;
        $user = $body->user;
        $commentary = $body->comentario;
        $data = $body->fecha;
        $puntage = $body->calificacion;

        $comments = $this->modelComment()->postComments($gameId, $user, $commentary, $data, $puntage);
        $this->ApiView()->response($comments, 200);//insert en nuestra BD
    }

}
