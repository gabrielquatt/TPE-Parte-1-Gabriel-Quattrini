<?php

include_once ('models/gameModel.php');
include_once ('models/categoryModel.php');
include_once ('views/gameView.php');

 class gameController {
    
    private $view;
    private $modelCategory;
    private $modelGame;
    
    public function __construct(){ 

       $this ->modelCategory = new categoryModel();
        $this ->modelGame = new gameModel();
        $this ->view = new gameView();
     }
            
     /**
     *  Muetra pagina principal haciendo un listado de categorias
     * 
     */
    public function showAllCategory(){
       $categorysid = $this->modelCategory->getAllCategory();  
       $this->view->viewGames($categorysid);
     }
     
     /**
     *  Trae y muestra todos los detalles de los juegos llamado por "all games"
     * 
     */
     public function showAllGame(){
      $categorys = $this->modelCategory->getAllCategory();
      $games = $this->modelGame->getAllGame();  
      $this->view->viewDetail($games,$categorys);
     }


     /**
     *  Trae y muestra juegos segun su categoria
     * 
     */
      public function showDetails($categoryID){
         $categorys = $this->modelCategory->getAllCategory();
         $games = $this->modelGame->getGameSpecific($categoryID);  
         $this->view->viewDetail($games,$categorys);  
      }
       
      
     /**
     *  Funcion para eleminar juego juego, recibe como parametro su $category para recargar su ubicacion actual 
     * 
     */
      public function deleteGame($id,$category) {
         $this->modelGame->deleteGameDB($id);
         header("Location: ../../details/$category");
      }
      
     /**
     *  recibe la id de a categoria a eleminar 
     * 
     */
      public function deleteCategory() {
         $borrar = $_POST['category'];
         $this->modelCategory->deleteCategoryDB($borrar);
         header("Location: game");
      }
      
     /**
     *  Funcion del search para buscar juegos con el mismo valor ingresado
     * 
     */
      public function GameSpecific(){
         $name = $_POST['nameGame'];
         $game = $this->modelGame->searchGame($name);
            if(empty($game)){
             $this->showError('ningun juego con ese nombre se encontro');    
               die(); 
            }else{
               $categorys = $this->modelCategory->getAllCategory();
               $this->view->viewDetail($game,$categorys);
            }
      }

     /**
     * Funcion para añadir categoria nueva y agragarla en la base de datos
     * 
     */
      public function addCategory() {
         $name = $_POST['name'];
         if (empty($name)) {
            $this->showError('add name to category');
            die(); 
         }
         $success = $this->modelCategory->saveCategory($name);
         if($success){
            header("Location: game");
         }
         else{
            $this->showError('error to add Category');      
         }
      }
      
      
     /**
     *  Funcion para añadir juego nuevo //no se podra agragar un juego nuevo si no se asocia a una categoria existente
     * 
     */
      public function addGame() {
         $title = $_POST['title'];
         $category = $_POST['category'];
         $qualification = $_POST['qualification'];
         $detail = $_POST['description'];
         if($category==0){
            $this->showError('error to add game');
            die();
         }else if(empty($title)||empty($qualification)||empty($detail)) {
            $this->showError('error to add game faltan datos');
         
         }else{
            $success = $this->modelGame->saveGameDB($title,$detail,$category,$qualification);
            if($success){
               header("Location: details/$category");//falta crear un mensaje de carga complete
            }
            else{
               $this->showError('error to add game');
            }             
         }
      }

     /**
     * Funcion para editar juego
     * recibe como parametro el id del juego al que se desea "pisar" o actualizar
     */
      public function editGame() {
         $gameid = $_POST['game'];
         if($gameid==''){
            $gameid=0;
         }
         $title = $_POST['title'];
         $category = $_POST['category'];
         $qualification = $_POST['qualification'];
         $detail = $_POST['description'];
         
         if (empty($gameid)||empty($title)||empty($category)||empty($qualification)||empty($detail)) {
           $this->showError('faltan datos por favor complete correctamente'); 
         }else{
               $this->modelGame->editGameDB($title,$detail,$category,$qualification,$gameid);
               header("Location: details/$category"); 
            
         }
      }

     /**
     * Funcion que llama a la vista de mensaje de error
     * ($mensegge es el texto que varia segun de donde se llame la funcion.)
     */
      public function showError($mensegge){      
      $categorysid = $this->modelCategory->getAllCategory(); 
        $this->view->showErrorView($mensegge, $categorysid);
    }
}
?>