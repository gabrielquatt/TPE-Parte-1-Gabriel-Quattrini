<?php
require_once ('libs/router/Router.php');
require_once ('api/CategoryApiController.php');
require_once ('api/GameApiController.php');

// creo el ruteador usando la libreria externa
$router = new Router();

// creo las tablas de ruteo

$router->addRoute('category', 'GET', 'CategoryApiController', 'getCategory');
$router->addRoute('game', 'GET', 'GameApiController', 'getGame');
$router->addRoute('game/:ID', 'GET', 'GameApiController', 'getGame');

// TODO a probar en postman 
$router->addRoute('category/:ID', 'DELETE', 'CategoryApiController', 'deleteCategoryDB');
$router->addRoute('game/:ID', 'DELETE', 'GameApiController', 'deleteGame');
// rutea
$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);
