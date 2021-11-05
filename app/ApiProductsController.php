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

    function getProducts(){
        $productos = $this->model->getProducts();
        return $this->view->response($productos, 200);
    }

    function getProduct($params = null){
        $id = $params[":ID"];
        $producto = $this->model->getProductById($id);
        if (!empty($producto))
            return $this->view->response($producto, 200);
        else {
            $this->view->response("La producto con el id=$id no existe", 404);
        };
    }

    public function deleteProduct($params = null) {
        $id = $params[':ID'];
        $product = $this->model->getProducts($id);

        // $result =  $product = $this->model->deleteProducts($id);
        if($product){
            $this->model->deleteProducts($id);
            $this->view->response("El producto con el id=$id fue eliminada", 200);
        } else {
            $this->view->response("El producto con el id=$id no existe", 404);
        };
    }

    public function insertProduct($params = null){
        //agarro los datos de request (json)
        $body = $this->getBody();

        // verifica si la tarea existe
        if (!empty($body)) {
            $id = $this->model->addProduct($body->category,$body->name,$body->description,$body->price_a,$body->price_b);
            $this->view->response( $this->model->getProductById($id), 201);
        } else {
            $this->view->response("El producto no se pudo insertar", 404);
        };
    }

    private function getBody(){
        $bodystring = file_get_contents("php://input");
        return json_decode($bodystring);
    }

    public function editProduct($params = null){
        $id = $params[':ID'];
        //agarro los datos de request (json)
        $body = $this->getBody();
        $product = $this->model->getProducts($id);

        // verifica si la tarea existe
        if (!empty($product)) {
            $this->model->updateProductById($body->category,$body->name,$body->description,$body->price_a,$body->price_b,$id);
            $this->view->response( $this->model->getProductById($id), 200);
        } else {
            $this->view->response("El producto no se pudo insertar", 404);
        };
    }

}