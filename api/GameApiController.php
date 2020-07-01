<?php

require_once ('ApiController.php');

class GameApiController extends ApiController{
   
    public function getGame($params = []) 
    {
        if(empty($params)) {
            $games = $this-> modelGame()->getAllGame();
            $this->ApiView()->response($games, 200);
        }
        else {
            $idGame = $params[':ID'];
            $game = $this->modelGame()->getGame($idGame);//por ID de categoria traera todos los games
            if ($game)
                $this->ApiView()->response($game, 200);
            else
                $this->ApiView()->response("no existe ningun juego con el id de categoria {$idGame}", 404);
        }
    }
   













    //-----------------no usado solo de practica con la api---------------------------//
    public function getImg($params = []) 
    {
            $idGame = $params[':ID'];
            $game = $this->modelGame()->getImg($idGame);//por ID de categoria traera todos los games
            if ($game)
                $this->ApiView()->response($game, 200);
            else
                $this->ApiView()->response("no contiene portada", 404);
        
    }
    
    public function deleteGame($params = []) {
        $idGame = $params[':ID'];
        $games = $this-> modelGame()->getAllGame();//TODO desarrollar funcion para mostrar 1 solo juego
        if(empty($games)) {
            $this->ApiView()->response("no existe tarea con id {$idGame}", 404);
            die;
        }
        $this->modelGame()->deleteGameDB($idGame);
        $this->ApiView()->response("La tarea con id:  {$idGame} se elimino correctamente", 200);
    }
}

    

