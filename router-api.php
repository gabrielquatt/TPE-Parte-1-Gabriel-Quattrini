<?php
require_once ('libs/router/Router.php');

require_once ('api/GameApiController.php');
require_once ('api/CommentApiController.php');


// creo el ruteador usando la libreria externa
$router = new Router();

// funciones usadas para el proyecto
$router->addRoute('game/:ID', 'GET', 'GameApiController', 'getGame');

$router->addRoute('game/:ID/comments/:DATA/:ORDER', 'GET', 'CommentApiController','getComments'); //traer todos los comentarios de un juego
$router->addRoute('add-comment', 'POST', 'CommentApiController', 'postComment');  //añadir comentario
$router->addRoute('delete-comment/:ID', 'DELETE', 'CommentApiController', 'deleteComment');   //borrar comentario

// rutea
$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);
