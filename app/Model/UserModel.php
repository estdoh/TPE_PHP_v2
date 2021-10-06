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

    function addUser($email, $contraseña){
        $query = $this->db->prepare('INSERT INTO users (id_user,email,password,rol) VALUES (NULL,?,?,1)');
        $query->execute(array($email,$contraseña));
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }
}