<?php
require_once './app/Model/UserModel.php';
require_once './app/View/UserView.php';
include_once './app/Helpers/AuthHelper.php';

class UserController {
    private $model;
    private $view;
    private $authHelper;
    

    public function __construct(){
        $this->model = new UserModel();
        $this->view = new UserView();
        $this->authHelper = new AuthHelper();

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
        $this->authHelper->checkLoggedOut();  
        // AuthHelper::checkLoggedOut();     
        $this->view->showRegister();
    }  

    function registerUser() {  
        if (AuthHelper::checkLoggedOut()){
            $email = $_POST['email'];
            $contraseña = $_POST['password'];
            $rol = 1;
            $hash = password_hash($contraseña, PASSWORD_BCRYPT);
            $this->model->addUser($email, $hash, $rol);
            $this->verifyLogin();
        }
    }

    function addUser() {   
        $this->authHelper->checkLoggedIn();   //esto es una prueba para que no se pueda acceder a esta funcion sin estar logueado 
        $email = $_POST['email'];
        $contraseña = $_POST['password'];
        $rol = $_POST['rol'];
        $hash = password_hash($contraseña, PASSWORD_BCRYPT);
        $this->model->addUser($email, $hash, $rol);
        $this->view->showUsers();
    }

    function showUsers() {
        if ($this->authHelper->checkLoggedIn()) {                    
            $users = $this->model->getUsers();
            $this->view->viewUsers($users);
        } else {
            $this->view->showLogin("Acceso denegado");
        }
    }
        // header("Location: ".BASE_URL."showProducts");       
    

    function viewUser($id = null) {       
        if (AuthHelper::checkLoggedIn()) {
            $user = $this->model->getUserById($id);
            $this->view->viewPageUser($user);
        } else {
            $this->view->showLogin("Acceso denegado");
        }        
    }
    
    function editUser($id) {       
        if (AuthHelper::checkLoggedIn()) {
            $email = $_POST['input_email'];
            $password = $_POST['input_password'];
            $rol = $_POST['input_rol'];
            $this->model->updateUserById($email,$password,$rol,$id);
            header("Location: ".BASE_URL."showUsers");
        } else {
            $this->view->showLogin("Acceso denegado");
        }        
    }

    function delUser($params = null) {     
        if (AuthHelper::checkLoggedIn()){
            $this->model->deleteUser($params);
            // $products = $this->model->getProducts();
            // $this->view->viewProducts($products);
            header("Location: ".BASE_URL."showUsers");
        } else {
            $this->view->showLogin("Acceso denegado");
        }
    }


}