
<?php

require_once('Controller.php');

class ImageController extends Controller
{

      /**
     * Funcion para editar portada de juego
     * 
     */
      public function editImg() {
         AuthHelper::checkLogActivo();
         $gameid = $_POST['game'];
         if (empty($gameid)){
            $this->showError('SELECCIONE PORTADA QUE DESEE EDITAR');
            die;
         };

         if($_FILES['input_img']['type'] == "image/jpg" || $_FILES['input_img']['type'] == "image/jpeg" 
         || $_FILES['input_img']['type'] == "image/png" ){  
            $success =$this-> getgamemodel()->editImage($_FILES['input_img']['tmp_name'],$gameid);
         }else{
            $this->showError('NO SE SELECCIONO NUEVA PORTADA'); 
            die;
         }
         if($success){
               header("Location: adminView");
            }
            else{
               $this->showError('ERROR TO EDIT PORTADA');
            }      
      }

      public function addImgs() {
         AuthHelper::checkLogActivo();
         $id_game = $_POST['gameId'];
         $rutaTempImagenes = $_FILES['imagenes']['tmp_name'];
         if($rutaTempImagenes) {      //chequea que sean imagenes jpg
            $this->getImageModel()->saveImgs($id_game,$rutaTempImagenes);   
            header("Location: game-Detail/".$id_game);
         }
         $this->showError("Las imagenes tienen que ser JPG.");
      }
   
         public function deletePortada($id) {
            AuthHelper::checkLogActivo();
            $img=null;
            $this->getgamemodel()->editImage($img,$id);
            header("Location: ../adminView");
         }
         public function   deleteCaptura($idCaptura,$idGame) {
            AuthHelper::checkLogActivo();
            $this->getImageModel()->deleteCaptura($idCaptura);
            header("Location: ../../game-Detail/".$idGame);
         }
   
    }