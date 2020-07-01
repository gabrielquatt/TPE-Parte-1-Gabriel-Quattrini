<?php
require_once ('libs/router/Router.php');
require_once ('api/CategoryApiController.php');
require_once ('api/GameApiController.php');
require_once ('api/CommentApiController.php');


// creo el ruteador usando la libreria externa
$router = new Router();

// funciones usadas para el proyecto

$router->addRoute('comment/:ID', 'GET', 'CommentApiController', 'getComments'); //traer todos los comentarios de un juego
$router->addRoute('game/:ID', 'GET', 'GameApiController', 'getGame');
$router->addRoute('comment', 'POST', 'CommentApiController', 'postComment');  //añadir comentario
$router->addRoute('comment/:ID', 'DELETE', 'CommentApiController', 'deleteComment');   //borrar comentario

// comment?id_game=5
// game/:ID/comments

// rutea
$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);


// probado en postman no usado para el trabajo

//category
$router->addRoute('category/:ID', 'DELETE', 'CategoryApiController', 'deleteCategoryDB');
$router->addRoute('category', 'GET', 'CategoryApiController', 'getCategory');
//game
$router->addRoute('gameImg/:ID', 'GET', 'GameApiController', 'getImg');
$router->addRoute('game/:ID', 'DELETE', 'GameApiController', 'deleteGame');
$router->addRoute('game', 'GET', 'GameApiController', 'getGame');
//commetarys
$router->addRoute('comment', 'GET', 'CommentApiController', 'getComments');
