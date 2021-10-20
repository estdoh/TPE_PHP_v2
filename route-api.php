<?php

require_once 'libs/Router.php';
require_once 'app/ApiProductsController.php';
require_once 'app/ApiCategoryController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('products', 'GET', 'ApiProductController', 'getProductos');
$router->addRoute('products/:ID', 'GET', 'ApiProductController', 'getProducto');
$router->addRoute('categories', 'GET', 'ApiCategoryController', 'getCategories');
$router->addRoute('categories/:ID', 'GET', 'ApiCategoryController', 'getCategory');

$router->addRoute('products/:ID', 'DELETE', 'ApiProductController', 'deleteProduct');
$router->addRoute('categories/:ID', 'DELETE', 'ApiCategoryController', 'deleteCategory');

// $router->addRoute('products', 'POST', 'ApiProductController', 'InsertProduct');
// $router->addRoute('categories', 'POST', 'ApiCategoryController', 'InsertCategory');



// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);