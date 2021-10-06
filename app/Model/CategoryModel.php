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

    function getProductsByCategory($category = null) {
        $query = $this->db->prepare('SELECT products.*,category.name as name_category FROM products JOIN category ON products.category = category.id_category WHERE category.name=?');
        // $query = $this->db->prepare('SELECT * FROM products WHERE category = ?');
        $query->execute([$category]); // array($category)
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }
}
    