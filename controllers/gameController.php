<?php

include_once ('controller.php');

 class gameController extends controller{        

     /**
     *  Muetra pagina principal haciendo un listado de categorias 
     */
    public function showAllCategory(){
       $categorysid = $this->getmodelcategoty()->getAllCategory();  
       $this-> getgameview()->viewHome($categorysid);
     }
     
     /**
     *  Trae y muestra todos los detalles de los juegos llamado por "all games"
     */
     public function showAllGame(){
      $categorys = $this->getmodelcategoty()->getAllCategory();
      $games = $this-> getgamemodel()->getAllGame();  
      $this-> getgameview()->viewDetail($games,$categorys);
     }

     /**
     *  Trae y muestra juegos segun su categoria
     */
      public function showDetails($categoryID){
         $categorys = $this->getmodelcategoty()->getAllCategory();
         $games = $this-> getgamemodel()->getGameSpecific($categoryID);  
         $this-> getgameview()->viewDetail($games,$categorys);  
      }       
      
     /**
     *  Funcion para eleminar juego juego, recibe como parametro su $category para recargar su ubicacion actual  
     */
      public function deleteGame($id) {
         if (isset($_SESSION['USERNAME']))
            {
         $this->getgamemodel()->deleteGameDB($id);
         header("Location: ../adminView");}else{
            $this->showError('acceso negado');
         }
      }
      
     /**
     *  recibe la id de a categoria a eleminar 
     */
      public function deleteCategory() {
         if (isset($_SESSION['USERNAME']))
         {
            if(empty($_POST['category'])){
               $this->showError('no hay categoria para eliminar!!!');
            }else{
               $borrar = $_POST['category'];
               $this->getmodelcategoty()->deleteCategoryDB($borrar);
               header("Location: adminView");
            }
         }else{
            $this->showError('acceso negado');
         }
      }
      
     /**
     *  Funcion del search para buscar juegos con el mismo valor ingresado
     */
      public function GameSpecific(){
         $name = $_POST['nameGame'];
         $name =strtolower($name);//strtolower — Convierte una cadena a minúsculas.
         $game = $this-> getgamemodel()->searchGame($name);
            if(empty($game)){
             $this->showError('ningun juego con ese nombre se encontro');    
               die(); 
            }else{
               $categorys = $this->getmodelcategoty()->getAllCategory();
               $this-> getgameview()->viewDetail($game,$categorys);
            }
      }

     /**
     * Funcion para añadir categoria nueva y agragarla en la base de datos
     */
      public function addCategory() {
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
     *  Funcion para añadir juego nuevo //no se podra agragar un juego nuevo si no se asocia a una categoria existente 
     */
      public function addGame() {
         if(empty($_POST['category'])){
            $this->showError('NO HAY CATEGORIA');
         }

         $title = $_POST['title'];
         $category = $_POST['category'];
         $qualification = $_POST['qualification'];
         $detail = $_POST['description'];
         
         if(empty($title)||empty($qualification)||empty($detail)) {
            $this->showError('"ERROR TO ADD GAME" FALTAN DATOS');        
         }else{
            $title = strtolower($title);//strtolower — Convierte una cadena a minúsculas
            $success =$this-> getgamemodel()->saveGameDB($title,$detail,$category,$qualification);
            if($success){
               header("Location: adminView");
            }
            else{
               $this->showError('ERROR TO ADD GAME');
            }             
         }
      }

     /**
     * Funcion para editar juego
     * recibe como parametro el id del juego al que se desea "pisar" o actualizar
     */
      public function editGame() {
         if(empty($_POST['game'])){ /** solucion a error cuando no hay categorias*/
            $this->showError('ningun juego seleccionado para editar');
            die();
         }elseif((empty($_POST['category']))){
            $this->showError('no se encontro ninguna categoria');
            die();
         }
         $gameid = $_POST['game'];
         $title = $_POST['title'];
         $category = $_POST['category'];
         $qualification = $_POST['qualification'];
         $detail = $_POST['description'];
         
         if (empty($title)||empty($qualification)||empty($detail)) {
           $this->showError('faltan datos por favor complete correctamente'); 
         }else{
            $title = strtolower($title);// strtolower — Convierte una cadena a minúsculas
            $this-> getgamemodel()->editGameDB($title,$detail,$category,$qualification,$gameid);
            header("Location: details/$category");
         }
      }
       /**
       * Funcion para editar juego
       * recibe como parametro el id de la categoria a editar
       */

       public function editCategory(){

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