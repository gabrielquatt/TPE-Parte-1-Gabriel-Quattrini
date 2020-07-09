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
}

    

