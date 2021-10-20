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

    function getProductos(){
        $productos = $this->model->getProducts();
        return $this->view->response($productos, 200);
    }

    function getProducto($params = []){
        $id = $params[":ID"];
        $producto = $this->model->getProductById($id);
        if (!empty($producto))
            return $this->view->response($producto, 200);
        else
            $this->view->response("La producto con el id=$id no existe", 404);
    }

    public function deleteProduct($params = null) {
        $id = $params[':ID'];
        $result =  $product = $this->model->deleteProducts($id);

        if($result > 0)
            $this->view->response("El producto con el id=$id fue eliminada", 200);
        else
            $this->view->response("El producto con el id=$id no existe", 404);
    }

    // public function InsertProduct($params = null){
    //     $body = $this->getData();

    //     $idproduct = $this->model->addProduct($body->category,$body->name,$body->description,$body->price_a,$body->price_b);

    //     if (!empty($idTask)) // verifica si la tarea existe
    //         $this->view->response( $this->model->getProducts($idTask), 201);
    //     else
    //         $this->view->response("La tarea no se pudo insertar", 404);
    // }


}