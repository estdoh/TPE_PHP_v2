<?php

require_once 'libs/Router.php';
require_once 'app/Controller/ProductController.php';
require_once 'app/Controller/CategoryController.php';
require_once 'app/Controller/UserController.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('products', 'GET', 'ProductsController', 'showProducts2');
// $router->addRoute('products', 'POST', 'ProductsController', 'addProduct');
// $router->addRoute('products/:ID', 'DELETE', 'ProductsController', 'delProducts');
// $router->addRoute('products/:ID', 'PUT', 'ProductsController', 'editProduct');
// $router->addRoute('products/:ID', 'GET', 'ProductsController', 'viewProduct');

// $router->addRoute('Categories', 'GET', 'CategoryController', 'showCategories');
// $router->addRoute('Categories', 'POST', 'CategoryController', 'addCategory');
// $router->addRoute('Categories/:ID', 'DELETE', 'CategoryController', 'delCategories');
// $router->addRoute('Categories/:ID', 'PUT', 'CategoryController', 'editCategory');
// $router->addRoute('Categories/:ID', 'GET', 'CategoryController', 'viewCategory');

// $router->addRoute('Users', 'GET', 'LoginController', 'showUsers');
// $router->addRoute('Users', 'POST', 'LoginController', 'addUser');
// $router->addRoute('Users/:ID', 'DELETE', 'LoginController', 'delUser');
// $router->addRoute('Users/:ID', 'PUT', 'LoginController', 'editUser');
// $router->addRoute('Users/:ID', 'GET', 'LoginController', 'viewUser');