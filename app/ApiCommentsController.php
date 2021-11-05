<?php
require_once "Model/CommentsModel.php";
require_once "View/ApiView.php";

class ApiCommentsController{

    private $model;
    private $view;

    function __construct(){
        $this->model = new CommentsModel();
        $this->view = new ApiView();
    }

    function getComments(){
        $comments = $this->model->getComments();
        return $this->view->response($comments, 200);
    }

    function getCommentsById($params = []){
        $id = $params[":ID"];
        $comments = $this->model->getCommentsById($id);
        if (!empty($comments)){ // verifica si la tarea existe
            return $this->view->response($comments, 200);
        } else {
            $this->view->response("El comentario id=$id no existe", 404);
        };
    }

    public function deleteComments($params = null) {
        $id = $params[':ID'];
        $comments = $this->model->getComments($id);
        // $result =  $product = $this->model->deleteProducts($id);
        if($comments){
            $this->model->deleteComments($id);
            $this->view->response("El asdqwe con el id=$id fue eliminada", 200);
        } else {
            $this->view->response("El 2345 con el id=$id no existe", 404);
        };
    }
    
    public function insertComments($params = null){
        //agarro los datos de request (json)
        $body = $this->getBody();

        // verifica si la tarea existe
        if (!empty($body)) {
            $id = $this->model->addComments($body->comment,$body->rating,$body->product_id, $body->user_id);
            $this->view->response( $this->model->getCommentsById($id), 201);
        } else {
            $this->view->response("El Comentario no se pudo insertar", 404);
        };
    }

    private function getBody(){
        $bodystring = file_get_contents("php://input");
        return json_decode($bodystring);
    }

    public function editComments($params = null){
        $id_comment = $params[':ID'];
        //agarro los datos de request (json)
        $body = $this->getBody();
        $comments = $this->model->getComments($id_comment);

        // verifica si la tarea existe
        if (!empty($comments)) {
            $this->model->updateCommentById($body->comment,$body->rating);
            $this->view->response( $this->model->getCommentsById($id_comment), 200);
        } else {
            $this->view->response("El category no se pudo insertar", 404);
        };
    }
}