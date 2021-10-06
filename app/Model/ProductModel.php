<?php

class ProductsModel {
    
    private $db;
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_especial;charset=utf8', 'root', '');
    }

    /* Obtiene todas los Productos vinculando la tabla relacional categorias*/
    function getProducts() {
        $query = $this->db->prepare('SELECT products.*,category.name as name_category FROM products JOIN category ON products.category = category.id_category');
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ);        
        return $products;       
    }

    function getProductById($id) {
        $query = $this->db->prepare('SELECT products.*,category.name as name_category FROM products JOIN category ON products.category = category.id_category WHERE id=?');
        $query->execute(array($id));
        $product = $query->fetch(PDO::FETCH_OBJ);        
        return $product;       
    }

    function deleteProducts($id) {
        $query = $this->db->prepare('DELETE FROM products WHERE id=?');
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

    function addProduct($category,$name,$description,$price_a,$price_b) {
        $query = $this->db->prepare("INSERT INTO products (category,name,description,price_a,price_b) VALUES (?,?,?,?,?)");
        $query->execute([$category,$name,$description,$price_a,$price_b]);
        
        // $querya = $this->db->prepare('SELECT products.*,category.name as name_category FROM products JOIN category ON products.category = category.id_category ORDER BY id DESC');
        // $querya->execute();
        // $products = $querya->fetchAll(PDO::FETCH_OBJ);
        // return $products;
    }

    function getProductsByCategory($category = null) {
        $query = $this->db->prepare('SELECT products.*,category.name as name_category FROM products JOIN category ON products.category = category.id_category WHERE category.name=?');
        // $query = $this->db->prepare('SELECT * FROM products WHERE category = ?');
        $query->execute([$category]); // array($category)
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    function updateProductById($category,$name,$description,$price_a,$price_b,$id){
        $query = $this->db->prepare('UPDATE products SET category=?,name=?,description=?,price_a=?,price_b=? WHERE id=?');
        $query->execute([$id,$category,$name,$description,$price_a,$price_b]);
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }
    
    // function getProduct($id){
    //     $query = $this->db->prepare("SELECT * FROM products WHERE id=?");
    //     $query->execute(array($id));
    //     return $query->fetch(PDO::FETCH_OBJ);
    // }
}