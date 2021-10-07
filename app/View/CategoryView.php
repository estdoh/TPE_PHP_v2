<?php

require_once './libs/smarty/Smarty.class.php';

class CategoryView {  
    private $smarty; 
    function __construct() {
        $this->smarty = new Smarty();   
        $this->smarty->assign('titulo', 'Carga de productos');     
    }

    function viewCategories($categories) {        
        $this->smarty->assign('categories', $categories);
        if (isset($_SESSION["email"])){   
            $this->smarty->assign('email', $_SESSION["email"]);
        }
        $this->smarty->display('template/body-categories.tpl');
    }   

    function renderError(){echo "error";}

}