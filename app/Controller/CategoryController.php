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
        $categories = $this->model->getCategories();        
        $this->view->viewCategories($categories);
    }

    function delCategories($params = null) {
        if (AuthHelper::checkLoggedIn()){
            $products = $this->model->getProductsByCategoryId($params);
            if (count($products)==0){
                $this->model->deleteCategories($params);
                header("Location: ".BASE_URL."showCategories");
            }
            else{
                $this->showError("No se puede borrar la categoría, existen productos asociados");
            }
            
        }
    }

    function addCategory (){
        if (AuthHelper::checkLoggedIn()){
            $name = $_POST['input_name'];
            $description = $_POST['input_description'];
            $this->model->addCategory($name,$description);
            header("Location: ".BASE_URL."showCategories");
        }
    }

    function searchCategories($params = null) {        
        $categories = $this->model->getCategories($params);
        $productsByCategory = $this->model->getProductsByCategory($params);
        $this->view->viewCategories($productsByCategory);
    }
    
    function viewCategory($params = null){
        $id = $params;
        $category = $this->model->getCategoryById($id);
        $this->view->viewPageCategory($category);
    }

    function editCategory($id_category){
        if (AuthHelper::checkLoggedIn()){
            $this->authHelper->checkLoggedIn();        
            $name = $_POST['input_name'];
            $description = $_POST['input_description'];
            $this->model->updateCategoryById($name, $description, $id_category);
            header("Location: ".BASE_URL."showCategories");
        }
    }

    function showHomeCSR() {
        $this->view->showCategoriesLayout();
    }

    function viewCategoryCSR($params = null){
        $id = $params;
        $category = $this->model->getCategoryById($id);
        $this->view->viewCategoryCSRLayout($category);
    }

    public function showError($msg){
        $this->view->showError($msg);
    }
}