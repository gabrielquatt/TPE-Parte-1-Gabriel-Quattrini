<?php

require_once ('model.php');

class CategoryModel extends Model{

    /**
     *  Funcion que trae de la base de datos todas las "categorias" de la tabla category
     * 
     */
        public function getAllCategory() {
            $query = $this->getdb()->prepare('SELECT * FROM category');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

    /**
     *  Funcion para eliminar categoria segun su id mando por parametro
     * (se borrara de la tabla game todos item los que tengas esa categoria (cascada))
     */
        public function deleteCategory($borrar) {
            $query = $this->getdb()->prepare('DELETE FROM category WHERE id = ?');
            $query->execute([$borrar]);
            return $borrar;
        }

    /**
     *  Funcion para guardar category, se manda en nombre y el ID se le auto asigna en la base de datos
     * 
     */
        public function saveCategory($namecategory) {
            $query = $this->getdb()->prepare('INSERT INTO category (name) VALUES (?)');
            return $query->execute([$namecategory]);
        }
    /**
     *  Funcion para editar categoria en la base de datos.
     */
        public function editcategoryDB($title,$category) {
            $query = $this->getdb()->prepare('UPDATE  category SET name = ? WHERE id = ?');
            $query->execute([$title,$category]);
        }
}
?>