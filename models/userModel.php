<?php

class userModel{
  
    private $db;
   
       public function __construct(){
           $this->db = new PDO('mysql:host=localhost;dbname=games;charset=utf8', 'root', '');
           $host = 'localhost';
           $userName = 'root';
           $password = '';
           $database = 'games';
   
           try {
               $this->db = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $userName, $password);
       
               $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
           } catch (Exception $e) {
               var_dump($e);
           }
       }

?>