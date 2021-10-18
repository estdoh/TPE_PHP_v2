<?php

require_once 'libs/Router.php';
require_once 'app/ApiProductsController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('productos', 'GET', 'ApiProductController', 'obtenerProductos');
$router->addRoute('producto/:ID', 'GET', 'ApiProductController', 'obtenerProducto');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);