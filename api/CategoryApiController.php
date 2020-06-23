<?php

require_once ('ApiController.php');

class CategoryApiController extends ApiController {

    public function getCategory() {
            $category = $this->modelCategory()->getAllCategory();
            $this->ApiView()->response($category, 200);
            // $this->view->response("no existen categorys", 404);
        }

    public function deleteCategoryDB($params = []) {
        $idCategory = $params[':ID'];
        $success = $this->modelCategory()->deleteCategory($idCategory);
        if(isset($success)) {
            $this->ApiView()->response("La categoria con id:  {$idCategory} se elimino correctamente", 200);
        }else{
            $this->ApiView()->response("no existe categoria con id {$idCategory}", 404);
            die;
        }
    }
}
