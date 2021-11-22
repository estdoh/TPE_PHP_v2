<?php

require_once 'libs/Router.php';
require_once 'app/ApiProductsController.php';
require_once 'app/ApiCategoryController.php';
require_once 'app/ApiUserController.php';
require_once 'app/ApiCommentsController.php';

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

$router->AddRoute('comments', 'GET', 'ApiCommentsController', 'getComments');
$router->AddRoute('comments/products/:ID', 'GET', 'ApiCommentsController', 'getCommentsByProductId');
$router->addRoute('comments', 'POST', 'ApiCommentsController', 'insertComments');
$router->addRoute('comments/:ID', 'DELETE', 'ApiCommentsController', 'deleteComment');

$router->AddRoute('user/token', 'GET', 'ApiUserController', 'getToken');
$router->AddRoute('user/:ID', 'GET', 'ApiUserController', 'getUser');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);