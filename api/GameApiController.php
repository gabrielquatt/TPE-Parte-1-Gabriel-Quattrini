<?php

require_once ('ApiController.php');

class GameApiController extends ApiController{
   /**
    * Funcion para traer los datos de un jugo segun su ID via ApiRest
    */
    public function getGame($params = []) 
    {
        if(empty($params)) {
            //Si no se solicito ningun parametro se devolveran todos los datos del juego 
            $games = $this-> modelGame()->getAllGame();
            //Una vez completado se devuelven o muestran todos los juegos y una respuesta de 200 o ok
            $this->ApiView()->response($games, 200);
        }
        else {
            //De no estar vacio "@params" es porque contiene un Id de un juego especifico
            $idGame = $params[':ID'];
            //Por ID del juego traera el juego de existit alguno
            $game = $this->modelGame()->getGame($idGame);
            if ($game) //si encuentraun juego lo mostrara
                $this->ApiView()->response($game, 200);
            else//de no econtrar un juego devolvera un mensaje y el ID del juego.
                $this->ApiView()->response("no existe ningun juego con el id de categoria {$idGame}", 404);
        }
    }
}

    

