<?php

//requiere_once('controllers/..')

if ($_GET['action'] == '')
    $_GET['action'] = 'home';

//$_GET['action'] = 'parametro1/parametro2'
$urlParts = explode('/', $_GET['action']);
//$urlParts = ['parametro1', 'parametro2']

switch ($urlParts[0]) {
    case 'home':
        
    break;

    default:
        echo "<h1>Error 404 - Page not found </h1>";
        break;
}