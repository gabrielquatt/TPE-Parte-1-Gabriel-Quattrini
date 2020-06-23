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
    /**
     * devuelve el nombre del usuario si hay una session abierta 
     */
    static public function getLoggedUserName() {
        self::start();
            if (isset($_SESSION['USERNAME'])){
               return $_SESSION['USERNAME'];
            } 
    }
    /**
     * devuelve la prioridad del usuario si es administrador
     */

    static public function getPriorityUser() {
        self::start();
            if (isset($_SESSION['PRIORITY'])){
               if($_SESSION['PRIORITY']==1){     
                   return $_SESSION['PRIORITY'];
               }
            } 
    }

    static public function getDataUser(){
        self::start(); 
        $data=[]; 
        if (isset($_SESSION['USERNAME'])){
            $data['name'] = $_SESSION['USERNAME'];
                if($_SESSION['PRIORITY']==1){     
                    $data['priority'] = $_SESSION['PRIORITY'];           
                    return $data;
                }
                $data['priority'] =null;
            return $data;
         } 
       
    }

    /**
     * Inicia la session y guarda los datos dal usuario
     */
    static public function login($userDB) {
        self::start();
        $_SESSION['ID_USER'] = $userDB->id;
        $_SESSION['USERNAME'] = $userDB->username;
        $_SESSION['PRIORITY'] = $userDB->priority;
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

