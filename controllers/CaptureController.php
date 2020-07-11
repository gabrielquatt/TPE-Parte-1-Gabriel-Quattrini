
<?php

require_once('Controller.php');

class CaptureController extends Controller
{

      /**
     * Funcion para Editar Portada de Juego
     */
      public function editImg() {
         AuthHelper::checkLogActivo();//chequeo de permisos
         $gameid = $_POST['game'];
         if (empty($gameid)){//si no se seleciona ninguna portada la pagina redigira a pestaña de Error
            $this->showError('SELECCIONE PORTADA QUE DESEE EDITAR');
            die;
         };
        
         if($_FILES['input_img']['type'] == "image/jpg" || $_FILES['input_img']['type'] == "image/jpeg" 
         || $_FILES['input_img']['type'] == "image/png" ){  
            //en caso de no estar vacio @gameId se chequeara que sea una imagen valida.
            //si es una imagen de guardara en la base de datos
            $success =$this-> getgamemodel()->editPortada($_FILES['input_img']['tmp_name'],$gameid);
         }else{
            //si no es una imagen se redigira a la pestaña de error con el mensaje indicado.
            $this->showError('NO SE SELECCIONO NUEVA PORTADA'); 
            die;
         }
         //si era una imagen se consultara si se guardo con exito
         if($success){
               header("Location: adminView"); //en caso de ser correcto se redigira a la vista de administrador
            }
            else{
               $this->showError('ERROR TO EDIT PORTADA'); //de caso contrario se mostrara un error
            }      
      }
      /**
       * Funcion para añadir portadas (Nota no comparte relacion con la tabla donde se guardan las portadas)
       * se guardan en su propia tabla de capturas.
       */
      public function addCapturas() {
         AuthHelper::checkLogActivo();//chequeo de permisos
         $id_game = $_POST['gameId'];
         $rutaTempImagenes = $_FILES['imagenes']['tmp_name'];//chequeo si son imagenes
         if($rutaTempImagenes) {          
            //envio de datos al model donde se realizara el chequedo de si son imagenes antes de almacenar en la database                            
            $this->getCaptureModel()->saveCapturas($id_game,$rutaTempImagenes); 
            header("Location: game-Detail/".$id_game);//una vez terminado se redirigue a los detalles del juego donde se guardaron las capturas
         }
         $this->showError("Las imagenes tienen que ser JPG.");//redireccionado a pantalla de error mas msj
      }
   /**
    * Funcion para eliminar portada de juego seleccionado 
    */
         public function deletePortada($id) {
            AuthHelper::checkLogActivo();//chequeo de permisos
            $img=null;
            //reutilizo funcion de guardar imagen mandando $img como null (automaticamente se guarda una imagen selecionada previamente).
            $this->getgamemodel()->editPortada($img,$id);
            //Redireccionado a la vista de administrador
            header("Location: ../adminView");
         }
         /**
    * Funcion para eliminar Captura de juego seleccionado 
    */
         public function   deleteCaptura($idCaptura,$idGame) {
            AuthHelper::checkLogActivo();//chequeo de permisos
            //envio parametro a la funcion correspondiente del model para realizar la tarea
            $this->getCaptureModel()->deleteCaptura($idCaptura);
            //redirecciono a los detalles del juego al que se le elimina la captura
            header("Location: ../../game-Detail/".$idGame);
         }
    }