<?php
require_once "Model/ProductModel.php";
require_once "View/ApiView.php";

class ApiProductController{

    private $model;
    private $view;

    function __construct(){
        $this->model = new ProductsModel();
        $this->view = new ApiView();
    }

    function obtenerProductos(){
        $tareas = $this->model->getProducts();
        return $this->view->response($tareas, 200);
    }

    function obtenerProducto($params = []){
        $id = $params[":ID"];
        $tarea = $this->model->getProductById($id);
        return $this->view->response($tarea, 200);
    }

}