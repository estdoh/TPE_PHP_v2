<?php

class UserModel {
    
    private $db;
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_especial;charset=utf8', 'root', '');
    }

    function getUser($email){
        $query = $this->db->prepare('SELECT * FROM `users` WHERE email=?');
        $query->execute(array($email));
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }

    function getUsers(){
        $query = $this->db->prepare('SELECT * FROM users');
        $query->execute();
        $user = $query->fetchAll(PDO::FETCH_OBJ);
        return $user;
    }    

    function getUserById($id) {
        $query = $this->db->prepare('SELECT * FROM users WHERE id_user =?');
        $query->execute(array($id));
        $userByID = $query->fetch(PDO::FETCH_OBJ);        
        return $userByID;       
    }

    function addUser($email, $password, $rol){
        $query = $this->db->prepare('INSERT INTO users (id_user,email,password,rol) VALUES (NULL,?,?,?)');
        $query->execute(array($email,$password, $rol));
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }

    function updateUserById($id, $email, $password, $rol){
        $query = $this->db->prepare('UPDATE products SET email=?, password=?, rol=? WHERE id=?');
        $query->execute([$id, $email, $password, $rol]);
        $user = $query->fetchAll(PDO::FETCH_OBJ);
        return $user;
    }

}
