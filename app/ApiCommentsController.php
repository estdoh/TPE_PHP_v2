<?php
require_once "Model/CommentsModel.php";
require_once "View/ApiView.php";
require_once "Helpers/AuthHelper.php";

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

    function getCommentsByProductId($params = []){
        $id = $params[":ID"];
        $minRating = 0;
        if (isset($_GET["minrating"]))
            $minRating = $_GET["minrating"];
        $comments = $this->model->getCommentsByProductId($id,$minRating);
        $this->view->response($comments, 200);
    }


    public function deleteComment($params = null) {
        if (AuthHelper::checkLoggedInAdmin()){
            $id = $params[':ID'];
            $comment = $this->model->getCommentById($id);
            // $result =  $product = $this->model->deleteProducts($id);
            if($comment){
                $this->model->deleteComment($id);
                $this->view->response("El comentario con el id=$id fue eliminada", 200);
            } else {
                $this->view->response("El comentario con el id=$id no existe", 404);
            };
        }
        else{
            $this->view->response("El usuario no está autorizado", 401);
        }

    }
    
    public function insertComments($params = null){
        if (AuthHelper::checkLoggedIn()){
            $body = $this->getBody();
            if(!isset( $body->user_id) || $body->user_id=="" || !isset( $body->product_id) || $body->product_id=="" ){
                $this->view->response("El Comentario no se pudo insertar", 400);
            }
            else{
                if (!empty($body)) {
                    $id = $this->model->addComments($body->comment,$body->rating,$body->product_id, $body->user_id);
                    $this->view->response( $this->model->getCommentsById($id), 200);
                } else {
                    $this->view->response("El Comentario no se pudo insertar", 404);
                }
            }
        }
        else{
            $this->view->response("El usuario no está autorizado para realizar el comentario", 401);
        }
    }

    private function getBody(){
        $bodystring = file_get_contents("php://input");
        return json_decode($bodystring);
    }

    /*
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
    */
}