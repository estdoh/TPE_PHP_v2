<?php

require_once 'libs/Router.php';
require_once 'app/ApiProductsController.php';
require_once 'app/ApiCategoryController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('products', 'GET', 'ApiProductController', 'getProducts');
$router->addRoute('products/:ID', 'GET', 'ApiProductController', 'getProduct');

$router->addRoute('categories', 'GET', 'ApiCategoryController', 'getCategories');
$router->addRoute('categories/:ID', 'GET', 'ApiCategoryController', 'getCategory');

$router->addRoute('products/:ID', 'DELETE', 'ApiProductController', 'deleteProduct');
$router->addRoute('categories/:ID', 'DELETE', 'ApiCategoryController', 'deleteCategory');

$router->addRoute('products', 'POST', 'ApiProductController', 'insertProduct');
$router->addRoute('categories', 'POST', 'ApiCategoryController', 'insertCategory');

$router->addRoute('products/:ID', 'PUT', 'ApiProductController', 'editProduct');
$router->addRoute('categories/:ID', 'PUT', 'ApiCategoryController', 'editCategory');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);