<?php
require_once './app/Model/UserModel.php';
require_once './app/View/LoginView.php';

class LoginController {
    private $model;
    private $view;

    public function __construct(){
        $this->model = new UserModel();
        $this->view = new LoginView();
    }  

    function login() {        
        $this->view->showLogin();
    }

    function logout() {        
        session_start();
        session_destroy();
        $this->view->showLogin("Finalizo Sesion");
    }

    function verifyLogin() {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];             
            //traigo el user de la base de datos
            $user = $this->model->getUser($email);            
            //verifica coincidencias
            if (!empty($user) && password_verify($password, $user->password)) {
                session_start();
                $_SESSION['email'] = $email;
                $this->view->showHome();
            } else {
                $this->view->showLogin("Acceso denegado2");
            }      
        }                
    }

    function viewRegister() {         
        $this->view->showRegister();
    }  
    function registerUser() {  
        $email = $_POST['email'];
        $contraseña = $_POST['password'];

        $hash = password_hash($contraseña, PASSWORD_BCRYPT);
        $this->model->addUser($email, $hash);
        $this->view->showHome();
    }
}