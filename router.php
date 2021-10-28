<?php
require_once 'app/Controller/ProductController.php';
require_once 'app/Controller/CategoryController.php';
require_once 'app/Controller/UserController.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// simulamos un router
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'showProducts'; // acción por defecto si no envían
}

$params = explode('/', $action);

// instancio la clase del controlador
$ProductsController = new ProductsController();
$CategoryController = new CategoryController();
$LoginController = new UserController();


//determina que camino seguir según la acción
switch ($params[0]) {
    case 'login':        
        $LoginController->login();
        break;
    case 'logout':        
        $LoginController->logout();
        break;
    case 'verify':        
        $LoginController->verifyLogin();
        break;
    case 'viewRegister':        
        $LoginController->viewRegister();
        break;
    case 'register':        
        $LoginController->registerUser();
        break;

    case 'showProducts':
        $ProductsController->showProducts();
        break;
    case 'InsertProduct':        
        $ProductsController->addProduct();
        break;
    case 'delProducts':    
        $ProductsController->delProducts($params[1]);
        break;
    case 'viewProduct':        
        $ProductsController->viewProduct($params[1]);
        break;
    case 'editProduct':        
        $ProductsController->editProduct($params[1]);
        break;


    case 'showCategories':
        $CategoryController->showCategories();
        break;
    case 'InsertCategory':        
        $CategoryController->addCategory();
        break;
    case 'delCategories':        
        $CategoryController->delCategories($params[1]);
        break;
    case 'viewCategory':        
        $CategoryController->viewCategory($params[1]);
        break;
    case 'editCategory':        
        $CategoryController->editCategory($params[1]);
        break;

    case 'showUsers':        //show json home
        $LoginController->showUsers();
        break;
    case 'viewUser':        //show json home
        $LoginController->viewUser($params[1]);
        break;
    case 'editUser':        //show json home
        $LoginController->editUser($params[1]);
        break;

    case 'category-csr':        //show json home
        $CategoryController->showHomeCSR();
        break;

    case 'Presupuestar':        
        $ProductsController->presupuestar();
        break;    
    case 'Search':        
        $ProductsController->searchProducts($params[1]);
        break;
    case 'OrderBy':        
        $ProductsController->orderBy($params[1]);
        break;
    default: 
        echo('404 Page not found aca estoy?'); 
        break;
}

    // case 'showProductsByCategory': 
    //     // [about] o [about,javi]
    //     $category = NULL;
    //     if(isset($params[1])){
    //         $category = $params[1];
    //     }
    //     showProductsByCategory($category); 
    //     break;
