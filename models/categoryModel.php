<?php

class categoryModel{
  
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
        public function getAllCategory() {
            $query = $this->db->prepare('SELECT * FROM category');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        public function deleteCategoryDB($borrar) {
            $query = $this->db->prepare('DELETE FROM category WHERE id = ?');
            $query->execute([$borrar]);
        }
       
        public function saveCategory($namecategory) {
            $query = $this->db->prepare('INSERT INTO category (name) VALUES (?)');
            return $query->execute([$namecategory]);
        }

        }
    
?>