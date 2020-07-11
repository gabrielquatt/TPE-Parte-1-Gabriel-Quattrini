<?php

require_once('ApiController.php');

class CommentApiController extends ApiController
{
    /**
    * Funcion para traer comentarios, ordenados de forma ASC y DESC segun lo solicitado.
    *@param [':ID']= id del juego, [':DATA'] = nombre de columna, [':ORDER'] orden en que se solicita ordenarlos datos.
    */
    public function  getComments($params = [])
    {
        $idGame = $params[':ID']; //id del juego. 
        $valor = $params[':DATA'];//nombre de columna que deseo ordenar ejemplo: Fecha, Calificacion.
        
        //Consulta si or :ORDEN valor mandado via api es ACENDENTE o DECENDENTE.
        if ($params[':ORDER'] == "ASC") {  
            //de ser ASC mando el id del juego y el valor o nombre de columna a ordernar.                                       
            $comments =  $this->modelComment()->commentOrderASC($idGame, $valor); 
        } else if ($params[':ORDER'] == "DESC"){   
            //De ser DECENDENTE se hara un pedido a la base de datos para ordenar el valor de columna selecionado.
            $comments =  $this->modelComment()->commentOrderDESC($idGame, $valor); 
        }else{
            //De no tener ningun requisito de ordenamiento de hara un pedido a la base de datos comun sin ningun ordenanmiento.
            $comments =  $this->modelComment()->getComments($idGame);  
        }
         if ($comments) 
         //Si se encuentran comentarios la respuesta sera 200 y se devolvera(n) el/los elemento(s) encontrado(s) con ese ID.
             $this->ApiView()->response($comments, 200);
         else
         //En caso de no ayarse ningun comentario se devolvera un 200 que afirmara que se realizo una busqueda y un null, para asi via Js mostrar un respuesta de la busqueda y no un error de consola. 
             $this->ApiView()->response(null, 200);
    }
/**
 * Funcion para eliminar comentario seleccionado.
 */
    public function deleteComment($params = [])
    {
        //Id del comentario selecionado para eliminar.
        $idComment = $params[':ID'];
        //Pasado Id a funcion del Model para su eliminacion en la base de datos.
        $this->modelComment()->deleteCommentId($idComment);
        //Luego devuelvo una respuesta de que el comentario fue eliminado.
        $this->ApiView()->response("comentario eliminado", 200);
    }
/**
 * Funcion para añadir comentario a la base de datos.
 */
    public function postComment()
    {
        $body = $this->getData();//seleciono toda la data mandada por la api

        $gameId = $body->id_game;          //id_juego: al que el comentario hace referencia (NOTA: es un fk)
        $user = $body->user;               //user: ususario que realizo el comentario
        $commentary = $body->comentario;   //comentario type text
        $data = $body->fecha;              //fecha (se crea automaticamnete cuando posteo el comentario)
        $puntage = $body->calificacion;    //calificacion (puede ser null si el ususario no seleciona ninguna estrella)

        $comments = $this->modelComment()->postComments($gameId, $user, $commentary, $data, $puntage);//funcion para guardar el comentario
        $this->ApiView()->response($comments, 200); //devuelvo una respuesta de que el comentario se guardo y los datos.
    }
}
