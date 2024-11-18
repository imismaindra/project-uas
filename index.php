<?php

$modul = isset($_GET['modul']) ? $_GET['modul'] : 'store';

switch ($modul) {
    case 'role': 
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : 'dashboard';
        require_once 'models/role_model.php';
        switch ($fitur) {
            case'list':
                $roleModel = new RoleModel();
                $roles = $roleModel->getRoles();
                include 'views/role_list.php';
                break;
        }
        break;
    case 'user':
        break;
    case 'category':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : 'list';
        require_once 'models/category_model.php';
        switch ($fitur) {
            case 'list':
                $categoryModel = new CategoryModel();
                $categories = $categoryModel->getCategories();
                include 'views/category_list.php';
                break;
            case 'insert':
                include 'views/category_insert.php';
                break;
            case 'add':
                $categoryModel = new CategoryModel();
                $categoryModel->insertCategory($_POST['name'], $_POST['description'], $_POST['slug']);
                header('Location: index.php?modul=category&fitur=list');
                break;
            case 'edit':
                $category_id = $_GET['id'];
                $categoryModel = new CategoryModel();
                $category = $categoryModel->getCategoryById($category_id);
                include 'views/category_update.php';
                break;
            case 'update':
                $categoryModel = new CategoryModel();
                $categoryModel->updateCategory($_POST['id'], $_POST['name'], $_POST['description'], $_POST['slug']);
                //var_dump($_POST);
                header('Location: index.php?modul=category&fitur=list');
                break;
            case 'delete':
                $categoryModel = new CategoryModel();
                $categoryModel->deleteCategory($_GET['rid']);
                header('Location: index.php?modul=category&fitur=list');
                break;
        }
        break;

    case 'product':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : 'list';
        require_once 'models/product_model.php';
        switch ($fitur) {
            case 'list':
                $productModel = new ProductModel();
                $products = $productModel->getProducts();
                include 'views/product_list.php';
                break;
        }
        break;
    case 'login-admmin':
        include 'login-admin.php';
        break;
    default:
        require_once 'models/category_model.php';

        $categoryModel = new CategoryModel();
         $categories = $categoryModel->getCategories();
        include 'views/store/store.php';
        break;
}
?>