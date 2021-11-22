<?php
require_once './libs/smarty/Smarty.class.php';
require_once './app/Helpers/AuthHelper.php';

class ProductsView {  
    private $smarty; 
    function __construct() {
        $authHelper = new AuthHelper();
        $userName = $authHelper->start();

        $this->smarty = new Smarty();   
        $this->smarty->assign('titulo', 'Carga de productos');   
        $this->smarty->assign('email', $userName);  
    }

    function viewProducts($products, $categories = null) {
        $this->smarty->assign('products', $products);        
        $this->smarty->assign('categories', $categories);        
        //seteo el smarty del producto con el email si es que existe el email (me logueé)
        $this->setSmartyVariables();
        $this->smarty->display('template/body.tpl');
    }

    function renderError(){echo "error";}     

    function viewPageProduct($product, $categories){         
        // $this->smarty->assign('titulo', 'Vista de producto');     
        $this->smarty->assign('product', $product);
        $this->smarty->assign('categories', $categories);
        $this->setSmartyVariables();
        $this->smarty->display('template/product.tpl');
    }

    function viewPresu($products = null, $categoryproducts = null){         
        $this->smarty->assign('categoryproducts', $categoryproducts);     
        $this->smarty->assign('products', $products);
        $this->smarty->display('template/presupuestador.tpl');
    } 

    function setSmartyVariables(){
        if (isset($_SESSION["email"])){   
            $this->smarty->assign('email', $_SESSION["email"]);
            $this->smarty->assign('rol', $_SESSION["rol"]);
            $this->smarty->assign('user_id', $_SESSION["user_id"]);
        }
        else{
            $this->smarty->assign('rol', 'noLog');
            $this->smarty->assign('user_id','0');
        }
    }

    function viewCommentsProduct($product_id){
        $this->smarty->assign('product_id', $product_id);        
        $this->setSmartyVariables();
        $this->smarty->display('template/bodyComments.tpl');
    }
}

    // function showEditProduct($product){ 
    //     $this->smarty->assign('product', $product);        
    //     $this->smarty->display('template/body.tpl');
    // }  

    // function renderProductsByCategory($products){
    //     $this->smarty->assign('products', $products);        
    //     $this->smarty->display('template/search.tpl');
    // }

    
    // function renderProductsByCategory($products, $category) {
    //     echo "<h1>Lista por género: $products</h2>";
    //     $this->renderProducts($category);
    // }