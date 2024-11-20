<?php

$modul = isset($_GET['modul']) ? $_GET['modul'] : 'store';
$slug =  isset($_GET['slug']) ? $_GET['slug'] : null;

if ($slug) {
    require_once 'models/product_model.php';
    $productModel = new ProductModel();
    $products = $productModel->getProductsByCategorySlug($slug);
    include 'views/store/product-list.php';
    exit; // Hentikan eksekusi agar tidak masuk ke switch $modul
}
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
            case 'insert':
                include 'views/role_insert.php';
                break;
            case 'add':
                $roleModel = new RoleModel();
                $roleModel->insertRole($_POST['name'], $_POST['description'], $_POST['is_aktif']);
                header('Location: ?modul=role&fitur=list');
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
                $categoryModel->insertCategory($_POST['name'], $_POST['description'], $_POST['slug'], $_FILES['image']);
                header('Location: index.php?modul=category&fitur=list');
                break;
            case 'edit':
                $category_id = $_GET['id'];
                $categoryModel = new CategoryModel();
                $category = $categoryModel->getCategoryById($category_id);
                include 'views/category_update.php';
                break;
            case 'update':
                $id = $_POST['id'];
                $name = $_POST['name'];
                $description = $_POST['description'];
                $slug = $_POST['slug'];
                $categoryModel = new CategoryModel();
            
                // Proses upload file gambar
                if ($_FILES['image']['name']) {
                    $image_name = $_FILES['image']['name'];
                    $image_tmp = $_FILES['image']['tmp_name'];
                    $image_path = "assets/". $image_name;
                    move_uploaded_file($image_tmp, $image_path);
                } else {
                    // Jika tidak ada file diunggah, gunakan gambar lama
                    $image_name = $categoryModel->getCategoryById($id)['image'];
                }
                //print_r($image_path);
                $categoryModel->updateCategory($id, $name, $description, $slug, $image_path);
            
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

//route front end store
// switch ($slug) {
//     case 'mobile-legends':
//         require_once 'models/product_model.php';

//         $productModel = new ProductModel();
//         $products = $productModel->getProductsByCategorySlug($slug);
//         include 'views/store/product-list.php';
//         // header("Location: views/store/product-list.php");

// }
?>