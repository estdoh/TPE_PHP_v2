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
        $authHelper = new AuthHelper();//esto nose
        // $authHelper->checkLoggedIn();//esto nose si no esta funciona pero en las filminas sta
        $this->model = new ProductsModel();
        $this->modelCategories = new CategoryModel();
        $this->view = new ProductsView();
        $this->modelComments = new CommentsModel();
    }    

    function showProducts() {
        //Para utilizar variable de sesión, hay que hacer un start sessión, a la variable de sesión la usa el view.
        AuthHelper::start(); 
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
            // $products = $this->model->getProducts();
            // $this->view->viewProducts($products);
            header("Location: ".BASE_URL."showProducts");
        }
    }

    function searchProducts($params = null) {
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
        if (AuthHelper::checkLoggedIn()){     
            $name = $_POST['input_name'];
            $description = $_POST['input_description'];
            $imagen_name = $_FILES['input_image']['tmp_name'];//$this->addImage();
            $imagen_type = $_FILES['input_image']['type'];
            $category = $_POST['input_category'];
            $price_a = $_POST['input_price_a'];
            $price_b = $_POST['input_price_b'];
            
            if( $imagen_type == "image/jpg" || $imagen_type == "image/jpeg" || $imagen_type == "image/png" || $imagen_type == "image/gif" ){
                $this->model->addProduct($name, $description, $imagen_name, $category, $price_a, $price_b);
                header("Location: ".BASE_URL."showProducts");
            } 
            // else {
            //     $this->model->addProduct($name, $description, $category, $price_a, $price_b);
            //     header("Location: ".BASE_URL."showProducts");
            // }            
        } else {
            header("Location: ".BASE_URL."login");
        }
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

    function editProduct($id){
        $name = $_POST['input_name'];
        $category = $_POST['input_category'];
        $description = $_POST['input_description'];
        $price_a = $_POST['input_price_a'];
        $price_b = $_POST['input_price_b'];

        $this->model->updateProductById($category,$name,$description,$price_a,$price_b,$id);
        header("Location: ".BASE_URL."showProducts");
    }

    function commentsProducts($product_id){
        $this->view->viewCommentsProduct($product_id);
    }

    function addImage($id = null){
        if($_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg" || $_FILES['input_name']['type'] == "image/png" || $_FILES['input_name']['type'] == "image/gif") {
            $file = $_FILES['input_name']['name'];  
            $directorio = "images/";
            $target = $directorio . uniqid() . '.jpg';
            move_uploaded_file($_FILES['input_name']['tmp_name'], $target);
            return $target;         
            $archivo = $directorio . basename($file);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($archivo,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
       
            $uploadOk = 1;
            $this->model->addImage($id, $archivo);
            header("Location: ".BASE_URL."viewProduct/".$id);
        } else {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        
        // if(isset($_POST[“submit”])) {
        //     $check = getimagesize($_FILES[“input_name”][“tmp_name”]);
        //     if($check !== false) {
        //         echo 'File is an image - ' . $check[0] . ' x ' . $check[1] . '.';
        //         $uploadOk = 1;
        //     } else {
        //         echo 'File is not an image.';
        //         $uploadOk = 0;
        //     }
        // }

        // // Check if file already exists
        // if (file_exists($archivo)) {
        //     echo "Sorry, file already exists.";
        //     $uploadOk = 0;
        // }
        // // Check file size
        // if ($_FILES['input_name']['size'] > 500000) {
        //     echo "Sorry, your file is too large.";
        //     $uploadOk = 0;
        // }
        // // Allow certain file formats   
        // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        //     echo "Sorry, only JPG, JPEG & PNG files are allowed.";
        //     $uploadOk = 0;
        // }
        // // Check if $uploadOk is set to 0 by an error
        // if ($uploadOk == 0) {
        //     echo "Sorry, your file was not uploaded.";
        // } else {
        //     if (move_uploaded_file($_FILES['input_name']['tmp_name'], $archivo)) {
        //         echo "The file ". basename( $_FILES['input_name']['name']). " has been uploaded.";
        //     } else {
        //         echo "Sorry, there was an error uploading your file.";
        //     }
        // }
        
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
