<?php

require_once ('controllers/gameController.php');

if ($_GET['action'] == '')
    $_GET['action'] = 'games';

//$_GET['action'] = 'parametro1/parametro2'
$urlParts = explode('/', $_GET['action']);
//$urlParts = ['parametro1', 'parametro2']

switch ($urlParts[0]) {
    //public access
    case 'games':
     $controllers = new gameController();
     $controllers-> showGames();  
    break;

    case 'detail':
     $controllers = new gameController();
     $controllers-> showDetail($urlParts[1]); 
    break;

    default:
        echo "<h1>Error 404 - Page not found </h1>";
        break;
}