<?php

require_once ('controllers/loginController.php');
require_once ('controllers/gameController.php');
require_once ('controllers/categoryController.php');

define('URLBASE', '//'. $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

if ($_GET['action'] == '')
    $_GET['action'] = 'login';

$urlParts = explode('/', $_GET['action']);

$Controller = new Controller();
$loginController = new loginController();
$gameController =  new gameController();
$categoryController =  new categoryController();
 
switch ($urlParts[0]) {

    case 'login':        
            $loginController->getLogin();
        break; 

    case 'logout':    
            $loginController->logout();
        break;

    case 'adminView':
            $loginController->adminActive();
        break; 

    case 'verify':   
            $loginController->verify();
        break; 

    case 'search':
            $gameController-> GameSpecific();
        break;

    case 'home':
        $categoryController-> showAllCategory();
        break;

    case 'details':
        if($urlParts[1]=='all'){
            $gameController-> showAllGame($urlParts[1]);
        }else{
            $gameController-> showDetails($urlParts[1]);
        }
        break;
       
    case 'addGame':
            $gameController->addGame();
        break;
    
    case 'addCategory':
            $categoryController->addCategory();
        break;

    case 'editGame':
            $gameController-> editGame();
        break;

    case 'editCategory':
            $categoryController-> editCategory();
        break;    
    
    case 'deleteCategory':
            $categoryController-> deleteCategory();
        break;

    case 'deleteGame':
            $gameController-> deleteGame($urlParts[1]);   
        break;

    default:
            $Controller-> showError('Error 404 - Page not found');
        break;
}
?>