<?php

require_once('controllers/LoginController.php');
require_once('controllers/GameController.php');
require_once('controllers/CategoryController.php');
require_once('controllers/CaptureController.php');

define('URLBASE', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

if ($_GET['action'] == '')
    $_GET['action'] = 'home';

$urlParts = explode('/', $_GET['action']);

switch ($urlParts[0]) {

    case 'deleteUser':
        $loginController = new LoginController();
        $loginController->deleteUser($urlParts[1]);
        break;

    case 'viewUser':
        $loginController = new LoginController();
        $loginController->viewUser();
        break;

    case 'editPriority':
        $loginController = new LoginController();
        $loginController->editPriority();
        break;

    case 'registro':
        $loginController = new LoginController();
        $loginController->openRegister();
        break;

    case 'saveUser':
        $loginController = new LoginController();
        $loginController->saveUser();
        break;

    case 'login':
        $loginController = new LoginController();
        $loginController->getLogin();
        break;

    case 'logout':
        $loginController = new LoginController();
        $loginController->logout();
        break;

    case 'adminView':
        $loginController = new LoginController();
        $loginController->adminActive();
        break;

    case 'verify':
        $loginController = new LoginController();
        $loginController->verify();
        break;

    case 'home':
        $categoryController =  new CategoryController();
        $categoryController->showAllCategory();
        break;

    case 'details':
        if ($urlParts[1] == 'all') {
            $gameController =  new GameController();
            $gameController->showAllGame($urlParts[1]);
        } else {
            $gameController =  new GameController();
            $gameController->showDetails($urlParts[1]);
        }
        break;

    case 'game-Detail':
        $gameController =  new GameController();
        $gameController->showGameDetails($urlParts[1]);
        break;

    case 'addGame':
        $gameController =  new GameController();
        $gameController->addGame();
        break;

    case 'addCategory':
        $categoryController =  new CategoryController();
        $categoryController->addCategory();
        break;

    case 'addCapturas':
        $gameController =  new CaptureController();
        $gameController->addCapturas();
        break;

    case 'editGame':
        $gameController =  new GameController();
        $gameController->editGame();
        break;

    case 'editImg':
        $gameController =  new CaptureController();
        $gameController->editImg();
        break;

    case 'editCategory':
        $categoryController =  new CategoryController();
        $categoryController->editCategory();
        break;

    case 'deleteCategory':
        $categoryController =  new CategoryController();
        $categoryController->deleteCategory();
        break;

    case 'deleteGame':
        $gameController =  new GameController();
        $gameController->deleteGame($urlParts[1]);
        break;

    case 'deletePortada':
        $gameController =  new CaptureController();
        $gameController->deletePortada($urlParts[1]);
        break;

    case 'deleteCaptura':
        $gameController =  new CaptureController();
        $gameController->deleteCaptura($urlParts[1],$urlParts[2]);
        break;

    default:
        $controller = new Controller();
        $controller->showError('Error 404 - Page not found');
        break;
}
