<?php
require_once 'models/categoryModel.php';
require_once 'models/gameModel.php';
require_once 'api/APIView.php';

class ApiController {
    private $categoryModel;
    private $gameModel;
    private $view;

    public function __construct() {
        $this->categoryModel = new CategoryModel();
        $this->gameModel = new GameModel();
        $this->view = new APIView();
    }

public function modelGame(){
    return $this->gameModel;
}
public function modelCategory(){
    return $this->categoryModel;
}
public function ApiView(){
    return $this->view;
}
}