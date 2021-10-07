<?php

require_once './libs/smarty/Smarty.class.php';

class ProductsView {  
    private $smarty; 
    function __construct() {
        $this->smarty = new Smarty();   
        $this->smarty->assign('titulo', 'Carga de productos');   
        $this->smarty->assign('email', '');  
    }

    function viewProducts($products, $categories = null) {
        $this->smarty->assign('products', $products);
        $this->smarty->assign('categories', $categories);
        //seteo el smarty del producto con el email si es que existe el email (me logueé)
        if (isset($_SESSION["email"])){   
            $this->smarty->assign('email', $_SESSION["email"]);
        }
        $this->smarty->display('template/body.tpl');
    }

    function renderError(){echo "error";}

    function showEditProduct($id){ 
        $this->smarty->assign('id', $id);        
        $this->smarty->display('template/edit.tpl');
    }   

    function viewPresu($products = null, $categoryproducts = null){         
        $this->smarty->assign('categoryproducts', $categoryproducts);     
        $this->smarty->assign('products', $products);
        $this->smarty->display('template/presupuestador.tpl');
    } 

}

    // function renderProductsByCategory($products){
    //     $this->smarty->assign('products', $products);        
    //     $this->smarty->display('template/search.tpl');
    // }

    
    // function renderProductsByCategory($products, $category) {
    //     echo "<h1>Lista por género: $products</h2>";
    //     $this->renderProducts($category);
    // }