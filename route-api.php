<?php

require_once 'libs/Router.php';
require_once 'app/ApiProductsController.php';
require_once 'app/ApiCategoryController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('products', 'GET', 'ApiProductController', 'obtenerProductos');
$router->addRoute('products/:ID', 'GET', 'ApiProductController', 'obtenerProducto');
$router->addRoute('categories', 'GET', 'ApiCategoryController', 'obtenerCategories');
$router->addRoute('categories/:ID', 'GET', 'ApiCategoryController', 'obtenerCategory');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);