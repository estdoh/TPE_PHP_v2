<?php
require_once './app/Helpers/AuthHelper.php';
require_once './app/Model/ProductModel.php';
require_once './app/Model/CategoryModel.php';
require_once './app/View/ProductView.php';
require_once './app/View/CategoryView.php';



class ProductsController {
    private $model;
    private $modelCategories;
    private $view;
    private $authHelper;

    public function __construct() {
        $this->model = new ProductsModel();
        $this->modelCategories = new CategoryModel();
        $this->view = new ProductsView();
    }    

    function showProducts() {
        //Para utilizar variable de sesión, hay que hacer un start sessión, a la variable de sesión la usa el view.
        AuthHelper::start(); 
        // $this->authHelper->checkLoggedIn();
        // llamar el modelo para obtener todas los productos
        $products = $this->model->getProducts();
        $categories = $this->modelCategories->getCategories();
        // actualizo la vista
        $this->view->viewProducts($products, $categories);
    }

    function delProducts($params = null) {     
        // $this->authHelper->checkLoggedIn();
        if (AuthHelper::checkLoggedIn()){
            $this->model->deleteProducts($params);
            $products = $this->model->getProducts();
            $this->view->viewProducts($products);
        }
    }

    function searchProducts($params = null) {
        // $this->authHelper->checkLoggedIn();
        $products = $this->model->getProducts();
        $ProductsByCategory = $this->modelCategories->getProductsByCategory($params);
        $this->view->viewProducts( $ProductsByCategory);
    }

    function orderBy($ordertype = null){
        // if (empty($orderby)){
        //     $orderby = "";           
        // } else if ($orderby = "ASC"){
        //     $orderby = "DESC";
        // };
        $products = $this->model->orderProductsBy($ordertype);
        $this->view->viewProducts($products);
    }

    function addProduct() {        
        // $this->authHelper->checkLoggedIn();
        if (AuthHelper::checkLoggedIn()){
            $name = $_POST['input_name'];
            $description = $_POST['input_description'];
            $category = $_POST['input_category'];
            $price_a = $_POST['input_price_a'];
            $price_b = $_POST['input_price_b'];

            $products = $this->model->addProduct($category,$name,$description,$price_a,$price_b);        
            $this->view->viewProducts($products);
        }


    }

    function presupuestar() {  
        // $this->authHelper->checkLoggedIn();
        $categories = $this->modelCategories->getCategories();      
        $products= $this->model->getProducts();
        $this->view->viewPresu($products, $categories);
    }

    function viewProduct($params = null){
        $id = $params;        
        $product = $this->model->getProductById($id);
        $categories = $this->modelCategories->getCategories($id);
        $this->view->viewPageProduct($product, $categories);
    }

    function editProduct($id){
        $name = $_POST['input_name'];
        $category = $_POST['input_category'];
        $description = $_POST['input_description'];
        $price_a = $_POST['input_price_a'];
        $price_b = $_POST['input_price_b'];
              
        $products = $this->model->updateProductById($category,$name,$description,$price_a,$price_b,$id);
        $this->view->viewProducts($products);
    }
}

// function searchProducts($params = null) {
//     $this->authHelper->checkLoggedIn();
//     $products = $this->model->getProducts();
//     $productsByCategory = $this->modelCategories->getProductsByCategory($params);
//     $this->view->viewProducts($productsByCategory);

//     // verifica datos obligatorios
//     if (!isset($_GET['category']) || empty($_GET['category'])) {
//         $this->view->renderError();
//         return;
//     }
//     obtiene el genero enviado por GET 
//     $category = $_GET['category'];
//     obtengo las peliculas del modelo
    
//     actualizo la vista
//     $this->view->renderProductsByCategory($products);
//     $products = $this->model->getProductsByCategory($params);
    


//     // $id = $params[1];
//     // llamar el modelo para obtener todas los productos
//     $this->model->deleteProducts($params);
//     $products = $this->model->getProducts();
//     // actualizo la vista
//     $this->view->viewProducts($products);
// }

// function showProductsByCategory() {
//     // verifica datos obligatorios
//     if (!isset($_GET['category']) || empty($_GET['category'])) {
//         $this->view->renderError();
//         return;
//     }
//     // obtiene el genero enviado por GET 
//     $category = $_GET['category'];
//     // obtengo las peliculas del modelo
//     $products = $this->model->getProductsByCategory($category);
//     // actualizo la vista
//     $this->view->renderProductsByCategory($category, $products);
// }