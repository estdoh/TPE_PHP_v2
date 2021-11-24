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
        $this->model = new ProductsModel();
        $this->modelCategories = new CategoryModel();
        $this->view = new ProductsView();
        $this->modelComments = new CommentsModel();
    }    

    function showProducts() {
        AuthHelper::start(); 
        $products = $this->model->getProducts();
        $categories = $this->modelCategories->getCategories();
        $this->view->viewProducts($products, $categories);
    }

    function delProducts($params = null) {     
        if (AuthHelper::checkLoggedInAdmin()){
            $this->modelComments->deleteCommentsByProduct($params);
            $this->model->deleteProducts($params);
            header("Location: ".BASE_URL."showProducts");
        }
        else{
            $this->showError("Usuario no autorizado");
        }
    }

    function searchProducts($params = null) {
        $products = $this->model->getProducts();
        $ProductsByCategory = $this->modelCategories->getProductsByCategory($params);
        $this->view->viewProducts( $ProductsByCategory);
    }

    function addProduct() {        
        if (AuthHelper::checkLoggedInAdmin()){     
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
                if($_FILES['input_image']['type'] == "image/jpg" || $_FILES['input_image']['type'] == "image/jpeg" 
                    || $_FILES['input_image']['type'] == "image/png" ) {
                    $this->model->addProduct($category, $name, $description, $price_a, $price_b,$_FILES['input_image']);
                }
                else {
                    $this->model->addProduct($category, $name, $description, $price_a, $price_b);
                }        
                header("Location: ".BASE_URL."showProducts");
            }
        }   
        else {
            $this->showError("Usuario no autorizado");
        }
    }

    function editProduct($id){
        if (AuthHelper::checkLoggedInAdmin()){
            $name = $_POST['input_name'];
            $category = "";
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
                if($_FILES['input_image']['type'] == "image/jpg" || $_FILES['input_image']['type'] == "image/jpeg" 
                || $_FILES['input_image']['type'] == "image/png" ) {
                    $this->model->updateProductById($category, $name, $description, $price_a, $price_b, $id,$_FILES['input_image']);
                }
                else {
                    $this->model->updateProductById($category, $name, $description, $price_a, $price_b,$id);
                }        
                header("Location: ".BASE_URL."showProducts");
        
            }
        }
        else {
            $this->showError("Usuario no autorizado");
        }
    }

    function viewProduct($id = null){     
        $product = $this->model->getProductById($id);
        $categories = $this->modelCategories->getCategories($id);
        $this->view->viewPageProduct($product, $categories);
    }

    function commentsProducts($product_id){
        $this->view->viewCommentsProduct($product_id);
    }

    public function showError($msg){
        $this->view->showError($msg);
    }
       
}