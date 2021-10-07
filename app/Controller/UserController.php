<?php
require_once './app/Model/UserModel.php';
require_once './app/View/UserView.php';
include_once './app/Helpers/AuthHelper.php';

class UserController {
    private $model;
    private $view;
    private $user;
    private $pass;

    public function __construct(){
        $this->model = new UserModel();
        $this->view = new UserView();
    }  

    function login() {        
        $this->view->showLogin();
    }

    function logout() {        
        session_start();
        session_destroy();
        //$this->view->showLogin("Finalizo Sesion");
        $this->view->showHome();
    }

    function verifyLogin() {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email']; 
            $password = $_POST['password'];             
            //traigo el user de la base de datos
            $user = $this->model->getUser($email);            
            //verifica coincidencias
            if (!empty($user) && password_verify($password, $user->password)) {
                AuthHelper::login($email);
                //$_SESSION['email'] = $email;
                //$this->view->set_user($email);
                 $this->view->showHome();
            } else {
                $this->view->showLogin("Acceso denegado2");
            }      
        }                
    }

    function viewRegister() {   
        AuthHelper::checkLoggedOut();      
        $this->view->showRegister();
    }  

    function registerUser() {  
        AuthHelper::checkLoggedOut();  
        $email = $_POST['email'];
        $contraseña = $_POST['password'];
        $hash = password_hash($contraseña, PASSWORD_BCRYPT);
        $this->model->addUser($email, $hash);
        $this->view->showHome();
    }
}