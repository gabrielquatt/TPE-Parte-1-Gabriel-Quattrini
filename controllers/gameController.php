<?php

include_once ('controller.php');

class gameController extends controller{        
   
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
         AuthHelper::checkLogActivo();
         $this->getgamemodel()->deleteGameDB($id);
         header("Location: ../adminView");
      }
             
     /**
     *  Funcion para añadir juego nuevo //no se podra agragar un juego nuevo si no se asocia a una categoria existente 
     */
      public function addGame() {
         AuthHelper::checkLogActivo();
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
         AuthHelper::checkLogActivo();
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
       
}
?>