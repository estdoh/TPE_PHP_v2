<?php
require_once "Model/CategoryModel.php";
require_once "View/ApiView.php";

class ApiCategoryController{

    private $model;
    private $view;

    function __construct(){
        $this->model = new CategoryModel();
        $this->view = new ApiView();
    }

    function getCategories(){
        $tareas = $this->model->getCategories();
        return $this->view->response($tareas, 200);
    }

    function getCategory($params = []){
        $id = $params[":ID"];
        $category = $this->model->getCategoryById($id);
        if (!empty($category)) // verifica si la tarea existe
            return $this->view->response($category, 200);
        else
            $this->view->response("La categoria con el id=$id no existe", 404);

    }

    public function deleteCategory($params = null) {
        $id = $params[':ID'];
        $result =  $category = $this->model->deleteCategories($id);

        if($result > 0)
            $this->view->response("La categoria con el id=$id fue eliminada", 200);
        else
            $this->view->response("La categoria con el id=$id no existe", 404);
    }

}