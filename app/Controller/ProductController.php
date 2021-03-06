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

    public function __construct() {
        $this->model = new ProductsModel();
        $this->modelCategories = new CategoryModel();
        $this->view = new ProductsView();
        $this->modelComments = new CommentsModel();
    }    

    function showProducts() {
        AuthHelper::start();        
        if(!isset($_GET['page'])){
            $pagination = "1";        
        } else {
            $pagination = $_GET['page'];            
        }       
        if (ctype_digit($pagination)) {
            $page = ($pagination - 1) * 5;
            $products = $this->model->getProducts($page);  
            $cantProducts = $this->model->countProducts();
            $pages = ceil($cantProducts /5);         
            $categories = $this->modelCategories->getCategories();
            $this->view->viewProducts($pages, $products, $categories);
        }
        else{
            $this->showError("Valor no permitido");
        }
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
        $categories = $this->modelCategories->getCategories();
        $ProductsByCategory = $this->modelCategories->getProductsByCategory($params);
        $this->view->viewSearch($ProductsByCategory,$categories);
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
                $this->showError("El nombre o la categor??a no pueden ser vacios");
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
                $this->showError("El nombre o la categor??a no pueden ser vacios");
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