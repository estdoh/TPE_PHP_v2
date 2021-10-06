<?php
// require_once './app/Model/UserModel.php';
// require_once './app/View/LoginView.php';

// class UserController { 

//     private $model;
//     private $view;

//     public function __construct(){
//         $this->model = new UserModel();
//         $this->view = new LoginView();
//     }  

//     function viewRegister() {         
//         $this->view->showRegister();                
//     }

//     function registerUser() {  
//         $email = $_POST['email'];
//         $contraseña = $_POST['password'];
//         $hash = password_hash($contraseña, PASSWORD_BCRYPT);
//         $this->model->addUser($email, $hash);
//         $this->view->showHome(); 
//     }

// }