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

    function orderProductsBy($orderby){
        $query = $this->db->prepare("SELECT products.*,category.name as name_category FROM products JOIN category ON products.category = category.id_category ORDER BY ? ASC");
        $query->execute(array($orderby));
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    function addProduct($category,$name,$description, $pathImg = null, $price_a,$price_b) {        
            $query = $this->db->prepare('INSERT INTO products (category,name,description,img,price_a,price_b) VALUES (?,?,?,?,?,?)');
            $query->execute([$category,$name,$description,$pathImg,$price_a,$price_b]);
            $product = $query->fetchAll(PDO::FETCH_OBJ);
            return $product;    
            // return $this->db->lastInsertId();
        
        //  else {
        //     $query = $this->db->prepare("INSERT INTO products (category,name,description,price_a,price_b) VALUES (?,?,?,?,?)");
        //     $query->execute([$category,$name,$description,$price_a,$price_b]);
        //     return $this->db->lastInsertId();
        // }
    }

    function updateProductById($category, $name, $description, $pathImg = null, $price_a, $price_b, $id){
        $query = $this->db->prepare('UPDATE products SET category=?, name=?, description=?, img=?, price_a=?, price_b=? WHERE id=?');
        $query->execute([$category, $name, $description, $pathImg, $price_a, $price_b, $id]);
        $product = $query->fetchAll(PDO::FETCH_OBJ);
        return $product;
    }   

}