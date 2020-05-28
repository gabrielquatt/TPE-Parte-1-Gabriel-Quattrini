<?php

class AuthHelper {

     function __construct() {
    }

    /** 
    * Inicia la session solo si no está iniciada.
    * Corrige el problema de "session ya iniciada".
     */
    static private function start() {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
    }

    function getLoggedUserName() {
        self::start();
            if (isset($_SESSION['USERNAME'])){
               return $_SESSION['USERNAME'];
            } 
    }
    /**
     * Inicia la session y guarda los datos dal usuario
     */
    static public function login($userDB) {
        self::start();
        $_SESSION['IS_LOGGED'] = true;
        $_SESSION['ID_USER'] = $userDB->id;
        $_SESSION['USERNAME'] = $userDB->username;
    }

    /**
     * Destruye la session
     */
    public static function logout() {
        self::start();
        session_destroy();
    }
    public static function checkLogActivo(){
        self::start();
        if(!isset($_SESSION['ID_USER'])){
            header('Location: ' . URLBASE . "login");
            die;
        }
    }

}

