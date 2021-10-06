<?php
require_once './libs/smarty/Smarty.class.php';

class LoginView { 

    private $smarty;
    public function __construct() {
        $this->smarty = new Smarty();
    }

    function showLogin($error = ""){
        $this->smarty->assign('titulo', 'Log In');
        $this->smarty->assign('error', $error);
        $this->smarty->display('template/login.tpl');
    }

    function showHome($error = ""){
        header("Location: ".BASE_URL."showProducts");
        
        $this->smarty->assign('error', $error);
    }

    function showRegister($error = ""){
        $this->smarty->assign('titulo', 'register');
        $this->smarty->assign('error', $error);
        $this->smarty->display('template/register.tpl');
    }
    
}