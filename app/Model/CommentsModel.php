<?php

class CommentsModel {
    
    private $db;
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_especial;charset=utf8', 'root', '');
    }

    function getComments() {
        $query = $this->db->prepare('SELECT * FROM comments');
        $query->execute();
        $comments = $query->fetchAll(PDO::FETCH_OBJ);        
        return $comments;       
    }

    function getCommentsById($id){
        // $query = $this->db->prepare('SELECT products.*,category.name as name_category FROM products JOIN category ON products.category = category.id_category WHERE id=?');

        $query = $this->db->prepare('SELECT * FROM comments JOIN products WHERE id_comment=?');
        // $query = $this->db->prepare('SELECT * FROM comments WHERE id_comment=?');
        $query->execute(array($id));
        $comments = $query->fetch(PDO::FETCH_OBJ);
        return $comments;
    }

    function addComments($comment,$rating,$product_id,$id_user) {
        $query = $this->db->prepare("INSERT INTO comments (comment,rating,product_id,id_user) VALUES (?,?,?,?)");
        $query->execute([$comment,$rating,$product_id,$id_user]);
        return $this->db->lastInsertId();
    }

    function deleteComments($id) {
        $query = $this->db->prepare('DELETE FROM comments WHERE id=?');
        $query->execute(array($id));
        // $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $query->rowCount();
    }

    function updateCommentsById($comment,$rating,$product_id,$id_user,$id){
        $query = $this->db->prepare('UPDATE products SET comment=?, rating=?, product_id=?, id_user=? WHERE id_comment=?');
        $query->execute([$comment,$rating,$product_id,$id_user, $id]);
        $product = $query->fetchAll(PDO::FETCH_OBJ);
        return $product;
    }


    
}