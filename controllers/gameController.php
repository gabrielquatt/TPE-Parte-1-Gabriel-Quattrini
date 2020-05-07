<?php

include_once('models/gameModel.php');
include_once('view/gameView.php');


class gameController{

private $model;
private $view;

public function __construct(){
    $this->model = new gameModel();
    $this->view = new gameView();
}

public function showDetail(){
    $category = $this->model->getAllDetail();
    $this->view->showAllCategory($category);
}

public function showGames(){
    $game = $this->model->getAll();
    $this->view->showAllGame($game);
}
}
?>