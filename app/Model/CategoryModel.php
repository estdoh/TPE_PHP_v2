<?php

class CategoryModel {
    private $db;
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_especial;charset=utf8', 'root', '');
    }  
   
    function getCategories() { 
        $query = $this->db->prepare('SELECT * FROM `category`');
        $query->execute();
        $categoryproducts = $query->fetchAll(PDO::FETCH_OBJ);        
        return $categoryproducts;
    }

    function addCategory($name, $description) {
        // $this->authHelper->checkLoggedIn();    
        $query = $this->db->prepare("INSERT INTO category (name,description) VALUES (?,?)");
        $query->execute([$name,$description]);
        
        $querya = $this->db->prepare('SELECT category as name_category FROM category ORDER BY id DESC');
        $querya->execute();
        $categories = $query->fetchAll(PDO::FETCH_OBJ);
        return $categories;
    }
    
    function deleteCategories($id) {
        $query = $this->db->prepare('DELETE FROM category WHERE id_category=?');
        $query->execute(array($id));
        // $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $query->rowCount();
    }

    function orderProductsBy($params){
        $query = $this->db->prepare("SELECT * FROM products ORDER BY $params");
        $query->execute([$params]);
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }
}
    