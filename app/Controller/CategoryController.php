<?php
require_once './app/Model/CategoryModel.php';
require_once './app/View/CategoryView.php';
require_once './app/Helpers/AuthHelper.php';

class CategoryController {
    private $model;
    private $view;
    private $authHelper;

    public function __construct() {
        $this->model = new CategoryModel();
        $this->view = new CategoryView();
        $this->authHelper = new AuthHelper();
    }

    function showCategories() {
        // $this->authHelper->checkLoggedIn();    
        $categories = $this->model->getCategories();        
        $this->view->viewCategories($categories);
    }

    function delCategories($params = null) {     
        // $this->authHelper->checkLoggedIn();
        $this->model->deleteCategories($params);
        $categories = $this->model->getCategories();
        $this->view->viewCategories($categories);
    }

    function addCategory (){
        $name = $_POST['input_name'];
        $description = $_POST['input_description'];
        $this->model->addCategory($name,$description);
        $categories = $this->model->getCategories();        
        
        $this->view->viewCategories($categories);
    }

    function searchCategories($params = null) {
        // $this->authHelper->checkLoggedIn();
        $categories = $this->model->getCategories($params);
        $productsByCategory = $this->model->getProductsByCategory($params);
        $this->view->viewCategories($productsByCategory);
    }
    
}