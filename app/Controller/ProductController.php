<?php
require_once './app/Model/ProductModel.php';
require_once './app/Model/CategoryModel.php';
require_once './app/View/ProductView.php';
require_once './app/Helpers/AuthHelper.php';


class ProductsController {
    private $model;
    private $modelCategories;
    private $view;
    private $authHelper;

    public function __construct() {
        $this->model = new ProductsModel();
        $this->modelCategories = new CategoryModel();
        $this->view = new ProductsView();
        $this->authHelper = new AuthHelper();
    }    

    function showProducts() {
        // $this->authHelper->checkLoggedIn();
        // llamar el modelo para obtener todas los productos
        $products = $this->model->getProducts();
        $categories = $this->modelCategories->getCategories();
        // actualizo la vista
        $this->view->viewProducts($products, $categories);
    }

    function delProducts($params = null) {     
        // $this->authHelper->checkLoggedIn();
        $this->model->deleteProducts($params);
        $products = $this->model->getProducts();
        $this->view->viewProducts($products);
    }

    function searchProducts($params = null) {
        // $this->authHelper->checkLoggedIn();
        $products = $this->model->getProducts();
        $productsByCategory = $this->modelCategories->getProductsByCategory($params);
        $this->view->viewProducts($productsByCategory);
    }

    function orderBy($params = null){
        // if (empty($orderby)){
        //     $orderby = "";           
        // } else if ($orderby = "ASC"){
        //     $orderby = "DESC";
        // };
        $products = $this->model->orderProductsBy($params);
        $this->view->viewProducts($products);
    }

    function addProduct() {        
        // $this->authHelper->checkLoggedIn();
        $name = $_POST['input_name'];
        $description = $_POST['input_description'];
        $category = $_POST['input_category'];
        $price_a = $_POST['input_price_a'];
        $price_b = $_POST['input_price_b'];

        $products = $this->model->addProduct($category,$name,$description,$price_a,$price_b);        
        $this->view->viewProducts($products);
    }

    function presupuestar() {  
        // $this->authHelper->checkLoggedIn();
        $categories = $this->modelCategories->getProductsByCategory();      
        $products= $this->model->getProducts();
        // $products = $this->model->getProducts();
        $this->view->viewPresu($products, $categories);
    }

    // function editProduct($params = null){
    //     $id = $params;
    //     // for ($i = 1; $i <= 10; $i++) {
    //     //     echo $i;
    //     // }
    //     $products = $this->model->getProduct($id);
    //     $this->view->showEditProduct($products);
    // }
    
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