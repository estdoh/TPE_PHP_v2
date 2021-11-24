<?php
require_once './app/Helpers/AuthHelper.php';
require_once './app/Model/ProductModel.php';
require_once './app/View/ProductView.php';
require_once './app/View/CategoryView.php';
require_once './app/Model/CategoryModel.php';
require_once './app/Model/CommentsModel.php';

class ProductsController {
    private $model;
    private $modelCategories;
    private $modelComments;
    private $view;
    private $authHelper;

    public function __construct() {
        $authHelper = new AuthHelper();        
        $this->model = new ProductsModel();
        $this->modelCategories = new CategoryModel();
        $this->view = new ProductsView();
        $this->modelComments = new CommentsModel();
    }    

    function  showProducts2(){
        $productos = $this->model->getProducts();
        return $this->view->response($products, 200);
    }

    function showProducts() {        
        AuthHelper::start(); 
        $products = $this->model->getProducts();
        $categories = $this->modelCategories->getCategories();        
        $this->view->viewProducts($products, $categories);
    }

    function delProducts($params = null) {
        if (AuthHelper::checkLoggedIn()){
            $this->model->deleteProducts($params);            
            header("Location: ".BASE_URL."showProducts");
        }
    }

    function searchProducts($params = null) {
        $products = $this->model->getProducts();
        $ProductsByCategory = $this->modelCategories->getProductsByCategory($params);
        $this->view->viewProducts( $ProductsByCategory);
    }

    function addProduct() {        
        if (AuthHelper::checkLoggedIn()){     
            $name = $_POST['input_name'];
            $description = $_POST['input_description'];
            $category = ""; 
            if (isset($_POST['input_category'])){
                $category = $_POST['input_category'];
            }

            $price_a = $_POST['input_price_a'];
            $price_b = $_POST['input_price_b'];

            if($name == "" || $category == ""){
                $this->showError("El nombre o la categoría no pueden ser vacios");
            }
            else{
                $imagen_name = $_FILES['input_image']['tmp_name'];
                $imagen_type = $_FILES['input_image']['type'];
                $pathImg = null;
                $pathImg = $this->uploadImage($imagen_name);

                $this->model->addProduct($category, $name, $description, $pathImg, $price_a, $price_b);
                header("Location: ".BASE_URL."showProducts");
            }
        }
            // if( $imagen_type == "image/jpg" || $imagen_type == "image/jpeg" || $imagen_type == "image/png" || $imagen_type == "image/gif" ){
            //     $this->model->addProduct($name, $description, $imagen_name, $category, $price_a, $price_b);
            //     header("Location: ".BASE_URL."showProducts");
            // } 
            // else {
            //     $this->model->addProduct($name, $description, $category, $price_a, $price_b);
            //     header("Location: ".BASE_URL."showProducts");
            // }            
        else {
            header("Location: ".BASE_URL."login");
        }
    }

    function editProduct($id){
        $name = $_POST['input_name'];
        $category = $_POST['input_category'];
        $description = $_POST['input_description'];
        if (isset($_POST['input_category'])){
            $category = $_POST['input_category'];
        }

        $price_a = $_POST['input_price_a'];
        $price_b = $_POST['input_price_b'];

        if($name == "" || $category == ""){
            $this->showError("El nombre o la categoría no pueden ser vacios");
        }
        else{
            $imagen_name = $_FILES['input_image']['tmp_name'];//$this->addImage();
            $imagen_type = $_FILES['input_image']['type'];
            $pathImg = null;
            $pathImg = $this->uploadImage($imagen_name);
            // $this->model->updateProductById($category,$name,$description,$price_a,$price_b,$id);
            $this->model->updateProductById($category, $name, $description, $pathImg, $price_a, $price_b, $id);
            header("Location: ".BASE_URL."showProducts");
        }
    }

    private function uploadImage($imagen_name){
        $uploads_dir = 'images/' . uniqid() . '.png';
        move_uploaded_file($imagen_name, $uploads_dir);
        return $uploads_dir;
    }

    function presupuestar() {  
        $categories = $this->modelCategories->getCategories();      
        $products= $this->model->getProducts();
        $this->view->viewPresu($products, $categories);
    }

    function viewProduct($id = null){              
        $product = $this->model->getProductById($id);
        $categories = $this->modelCategories->getCategories($id);
        // $comments = $this->modelComments->getComments($id);
        $this->view->viewPageProduct($product, $categories);
    }

    function commentsProducts($product_id){
        $this->view->viewCommentsProduct($product_id);
    }

    public function showError($msg){
        $this->view->showError($msg);
    }
       
}