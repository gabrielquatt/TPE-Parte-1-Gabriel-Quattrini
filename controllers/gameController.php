<?php

include_once ('Controller.php');

class GameController extends Controller{        
   
  
   /**
     *  Trae y muestra todos los detalles de los juegos llamado por "all games"
     */
     public function showAllGame(){
      $array =  $this->user();
      $categorys = $this->getmodelcategoty()->getAllCategory();
      $games = $this-> getgamemodel()->getAllGame();  
      $this-> getgameview()->viewDetail($games,$categorys,$array);
     }
     
     /**
     *  Trae y muestra juegos segun su categoria
     */
      public function showDetails($categoryID){
         $array =  $this->user();
         $categorys = $this->getmodelcategoty()->getAllCategory();
         $games = $this-> getgamemodel()->getGamesCategory($categoryID);  
         $this-> getgameview()->viewDetail($games,$categorys,$array);  
      } 
      
      /**
       * Funcion que buscara juego por su id y devolvera toda su iformacion
       */
     public function showGameDetails($gameID){
      $array =  $this->user();
      $categorys = $this->getmodelcategoty()->getAllCategory();
      $game = $this-> getgamemodel()->getGame($gameID);  
      $images = $this->getImageModel()->allImagesId($gameID);
      $this-> getgameview()->viewGameDetail($game,$categorys,$array,$images);  
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
         $detail = $_POST['description'];
         
         if(empty($title)||empty($detail)) {
            $this->showError('"ERROR TO ADD GAME" FALTAN DATOS');        
         }else{
            $title = strtolower($title);//strtolower — Convierte una cadena a minúsculas
            if($_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg" 
            || $_FILES['input_name']['type'] == "image/png" )
             {
                $success =$this-> getgameModel()->saveGameDB($title,$detail,$category,$_FILES['input_name']['tmp_name']);
            }else{
               $success =$this-> getgameModel()->saveGameDB($title,$detail,$category);
            }
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
         $detail = $_POST['description'];
         
         if (empty($title)||empty($detail)) {
           $this->showError('faltan datos por favor complete correctamente'); 
         }else{  
            $title = strtolower($title);// strtolower — Convierte una cadena a minúsculas
            $this-> getgamemodel()->editGameDB($title,$detail,$category,$gameid);
            header("Location: details/$category");
         }
      }

}
