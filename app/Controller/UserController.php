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
        $rol = $_POST['rol'];
        $hash = password_hash($contraseña, PASSWORD_BCRYPT);
        $this->model->addUser($email, $hash, $rol);
        $this->view->showHome();
    }

    function showUsers() {
        // AuthHelper::start();
        // AuthHelper::checkLoggedOut();  
        if (AuthHelper::checkLoggedIn()) {
        $users = $this->model->getUsers();
        $this->view->viewUsers($users);
        }
        // header("Location: ".BASE_URL."showProducts");
        
    }

    function viewUser($id = null) {       
        if (AuthHelper::checkLoggedIn()) {
            $user = $this->model->getUserById($id);
            $this->view->viewPageUser($user);
        }        
    }
    
    function editUser($id) {       
        if (AuthHelper::checkLoggedIn()) {
            $name = $_POST['input_name'];
            $description = $_POST['input_description'];
            $rol = $_POST['input_rol'];
            $users = $this->model->updateUserById($id,$name,$description,$rol);
            $this->view->viewUsers($users);
        }        
    }

    // function viewProduct($id = null){              
    //     $product = $this->model->getProductById($id);
    //     $categories = $this->modelCategories->getCategories($id);
    //     $this->view->viewPageProduct($product, $categories);
    // }

    // function editProduct($id){
    //     $name = $_POST['input_name'];
    //     $category = $_POST['input_category'];
    //     $description = $_POST['input_description'];
    //     $price_a = $_POST['input_price_a'];
    //     $price_b = $_POST['input_price_b'];

    //     $this->model->updateProductById($category,$name,$description,$price_a,$price_b,$id);
    //     header("Location: ".BASE_URL."showProducts");
    // }

}