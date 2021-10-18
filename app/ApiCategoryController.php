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

    function obtenerCategories(){
        $tareas = $this->model->getCategories();
        return $this->view->response($tareas, 200);
    }

    function obtenerCategory($params = []){
        $id = $params[":ID"];
        $tarea = $this->model->getCategoryById($id);
        return $this->view->response($tarea, 200);
    }

}