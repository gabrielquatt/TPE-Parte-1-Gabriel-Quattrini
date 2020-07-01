<?php

include_once ('Controller.php');

 class CategoryController extends Controller{  

     /**
     *  Muetra pagina principal haciendo un listado de categorias 
     */
    public function showAllCategory(){

         $array =  $this->user();
        $categorysid = $this->getmodelcategoty()->getAllCategory();  
        $this-> getgameview()->viewHome($categorysid, $array);
      }


     /**
     *  elimina categoria por selecion de if en un form
     */
    public function deleteCategory() {
      AuthHelper::checkLogActivo();
           if(empty($_POST['category'])){
              $this->showError('no hay categoria para eliminar!!!');
           }else{
              $borrar = $_POST['category'];
              $this->getmodelcategoty()->deleteCategory($borrar);
              header("Location: adminView");
           }
    }
   
     
     /**
     * Funcion para añadir categoria nueva y agragarla en la base de datos
     */
    public function addCategory() {
      AuthHelper::checkLogActivo();
        $name = $_POST['name'];
        if (empty($name)) {
           $this->showError('ADD NAME TO CATEGORY');
           die();
        }
        $name =strtolower($name);//strtolower — Convierte una cadena a minúsculas.
        $success = $this->getmodelcategoty()->saveCategory($name);
        if($success){
           header("Location: adminView");
        }
        else{
           $this->showError('error to add Category');      
        }
     }
     
     /**
       * Funcion para editar juego
       * recibe como parametro el id de la categoria a editar
       */
      public function editCategory(){
         AuthHelper::checkLogActivo();
        if((empty($_POST['category']))){
           $this->showError('no se encontro ninguna categoria');
           die();
        }elseif((empty($_POST['tittle']))){
           $this->showError('añadir nombre a categoria');
           die();
        }

        $categoryID = $_POST['category'];
        $tittle = $_POST['tittle'];

        $tittle = strtolower($tittle);//strtolower — Convierte una cadena a minúsculas.
        $this->getmodelcategoty()->editCategoryDB($tittle,$categoryID);
        header("Location: adminView");
      }

 }
 ?>