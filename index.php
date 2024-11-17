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
        }
        break;
    case 'login-admmin':
        include 'login-admin.php';
        break;
    default:
        // $store = new ();
        include 'views/store/store.php';
        break;
}
?>