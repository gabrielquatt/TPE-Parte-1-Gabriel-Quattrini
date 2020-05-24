<?php

require_once ('controllers/loginController.php');
require_once ('controllers/gameController.php');

define('URLBASE', '//'. $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

if ($_GET['action'] == '')
    $_GET['action'] = 'login';

$urlParts = explode('/', $_GET['action']);

switch ($urlParts[0]) {
    
    case 'login':
        $controllers = new loginController();      
        $controllers->getLogin();
        break;
        
    case 'logout':
            $controllers = new loginController();      
            $controllers->logout();
        break;

    case 'adminView':
        $controllers = new loginController();      
        $controllers->adminActive();
    break;
        
    case 'verify':
        $controllers = new loginController();      
        $controllers->verify();
        break;
        
    case 'search':
        $controllers = new gameController();
        $controllers-> GameSpecific();
        break;

    case 'game':
        $controllers = new gameController();
           $controllers-> showAllCategory();
        break;
       
    case 'details':
        if($urlParts[1]=='all'){
                $controllers = new gameController();
                $controllers-> showAllGame($urlParts[1]);
        }else{
                $controllers = new gameController();
                $controllers-> showDetails($urlParts[1]);
        }
    break;
       
       case 'addGame':
        $controller = new gameController();
        $controller->addGame();
    break;
    
    case 'addCategory':
        $controller = new gameController();
        $controller->addCategory();
    break;
    
    case 'editGame':
        $controllers = new gameController();
        $controllers-> editGame();
    break;

    case 'deleteCategory':
        if (isset($_SESSION['USERNAME']))
            {
            $controllers = new gameController();
            $controllers-> deleteCategory();
             }else{
                $controllers = new gameController();
                $controllers-> showError('ACCESO NEGADO');
            }
        break;

    case 'delete':
        if (isset($_SESSION['USERNAME']))
            {
            $controllers = new gameController();
            $controllers-> deleteGame($urlParts[1],$urlParts[2]);
             }else{
                $controllers = new gameController();
                 $controllers->showError('ACCESO NEGADO');
             }
     break;
 
    default:
        $controllers = new gameController();
        $controllers-> showError('Error 404 - Page not found');
    break;
}
?>