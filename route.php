<?php
require_once ('controllers/gameController.php');

if ($_GET['action'] == '')
    $_GET['action'] = 'game';

$urlParts = explode('/', $_GET['action']);

switch ($urlParts[0]) {
    case 'game':
         $controllers = new gameController();      
         $controllers-> showGame();
        break;
       
    case 'details':
       $controllers = new gameController();
       $controllers-> showDetails($urlParts[1]);
       break;
    
    default:
        echo "<h1>Error 404 - Page not found </h1>";
       break;
}
?>