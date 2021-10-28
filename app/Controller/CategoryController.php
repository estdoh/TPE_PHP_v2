<?php
require_once './app/View/CategoryView.php';
require_once './app/Model/CategoryModel.php';

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
        AuthHelper::start();
        // $this->authHelper->checkLoggedIn();    
        $categories = $this->model->getCategories();        
        $this->view->viewCategories($categories);
    }

    function delCategories($params = null) {     
        // $this->authHelper->checkLoggedIn();
        if (AuthHelper::checkLoggedIn()){
            $this->model->deleteCategories($params);
            // $categories = $this->model->getCategories();
            // $this->view->viewCategories($categories);
            header("Location: ".BASE_URL."showCategories");
        }
    }

    function addCategory (){
        if (AuthHelper::checkLoggedIn()){
            $name = $_POST['input_name'];
            $description = $_POST['input_description'];
            $this->model->addCategory($name,$description);
            // $categories = $this->model->getCategories(); 
            // $this->view->viewCategories($categories);
            header("Location: ".BASE_URL."showCategories");
        }
    }

    function searchCategories($params = null) {
        // $this->authHelper->checkLoggedIn();
        $categories = $this->model->getCategories($params);
        $productsByCategory = $this->model->getProductsByCategory($params);
        $this->view->viewCategories($productsByCategory);
    }
    
    function viewCategory($params = null){
        $id = $params;        
        // $category = $this->model->getCategoryById($id);
        $category = $this->model->getCategoryById($id);
        $this->view->viewPageCategory($category);
    }

    function editCategory($id_category){
        $name = $_POST['input_name'];
        $description = $_POST['input_description'];

        $this->model->updateCategoryById($name, $description, $id_category);
        header("Location: ".BASE_URL."showCategories");
    }

    function showHomeCSR() {
        $this->view->showCategoriesLayout();
    }

}