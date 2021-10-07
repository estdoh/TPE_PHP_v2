<?php

class AuthHelper{
    public function __construct() {
    }

    //inicia sesion.
    static public function start() {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
    }

    static public function login($email) {
        self::start();
        $_SESSION['IS_LOGGED'] = true;
        $_SESSION['email'] = $email;
    }

    public static function checkLoggedIn(){
        self::start();
        if(!isset($_SESSION["email"])){
            header("Location: ".BASE_URL."login");
            return false;
        }
        return true;
    }

    public static function checkLoggedOut() {
        self::start();
        if(isset($_SESSION['email'])){
            header("Location: ". BASE_URL."");
        }
    }
}