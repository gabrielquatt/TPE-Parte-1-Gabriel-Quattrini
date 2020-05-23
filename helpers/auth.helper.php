<?php

class AuthHelper {

     function __construct() {
    }

     function getLoggedUserName() {
         if (session_status() != PHP_SESSION_ACTIVE) {
             session_start();
            if (isset($_SESSION['USERNAME'])){
               return $_SESSION['USERNAME'];
            }
            }      
}
}