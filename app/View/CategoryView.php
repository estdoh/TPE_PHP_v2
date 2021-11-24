<?php

require_once './libs/smarty/Smarty.class.php';

class CategoryView {  
    private $smarty; 
    function __construct() {
        $this->smarty = new Smarty();   
        $this->smarty->assign('titulo', 'Carga de productos');     
        $this->smarty->assign('email', '');  
    }

    function viewCategories($categories) {        
        $this->smarty->assign('categories', $categories);
        $this->setSmartyVariables();
        $this->smarty->display('template/body-categories.tpl');
    }
    
    function viewPageCategory($category){         
        $this->smarty->assign('category', $category);
        $this->smarty->display('template/category.tpl');
    }

    function renderError(){echo "error";}
    
    function showCategoriesLayout() {
        $this->smarty->display('template/body-categoriesCSR.tpl');
    }

    function setSmartyVariables(){
        if (isset($_SESSION["email"])){   
            $this->smarty->assign('email', $_SESSION["email"]);
            $this->smarty->assign('rol', $_SESSION["rol"]);
        }
    }
}