<?php
class Model{
  
  private $db;
 
     public function __construct(){
         $this->db = new PDO('mysql:host=localhost;dbname=games;charset=utf8', 'root', '');
         $host = 'localhost';
         $user = 'root';
         $password = 'root';
         $database = 'games';
 
         try {
             $this->db = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $user, $password);
             $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
         } catch (Exception $e) {
             var_dump($e);
         }
      }

      public function getdb(){
          return $this->db; 
      }
}
