<?php
session_start();


$modul = isset($_GET['modul']) ? $_GET['modul'] : 'store';
$slug =  isset($_GET['slug']) ? $_GET['slug'] : null;

if ($slug) {
    require_once 'models/product_model.php';
    $productModel = new ProductModel();
    $products = $productModel->getProductsByCategorySlug($slug);
    
    $category_images = [
        'Mobile Legends' => '/assets/include/dm.webp',
        'Free Fire' => '/assets/include/dm.webp',
        'PUBG' => '/assets/include/uc.webp',
        'Valorant' => '/assets/include/vp.webp',
        'Genshin Impact' => '/assets/include/gc.webp',
        'Honor of Kings' => '/assets/include/dm.webp',
        'EA FC' => '/assets/include/dm.webp',
    ];

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
    case 'transaksi':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : 'dashboard';
        require_once 'models/transaksi_model.php';
        switch($fitur){
            case 'list':
                $transaksiModel = new TransaksiModel();
                $transaksis = $transaksiModel->getAllTransaksi();
                break;
            case 'add':
                // http://project-uas.test/post?id=9879798798&product_id=1&amount=4&pembayaran=Dana&totalAmount=20500
                $total_price = $_POST['totalAmount'];
                $productId =$_POST['product_id'];
                $pembayaran = $_POST['pembayaran'];
                $accountId = $_POST['id'];
                $qty = $_POST['amount'];
                $transaksiModel = new TransaksiModel();
                $transaksiModel->insertTransaksi(null,"guset","fufufafa@gmail.com",$productId,3,15500,"ShopeePay","2024-12-06 19:48:39");   
                break;
            case 'invoices':
                include 'views/store/transactions.php';
                $transaksiModel = new TransaksiModel();
               
                $transaksis = $transaksiModel->getTransaksiById(10);
                break;
        }
        break;
    case 'users':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : 'dashboard';
        require_once 'models/user_model.php';
        switch($fitur){
            case 'list':
                $usermodel = new Users();
                $users = $usermodel->getAllUsers();
                include 'views/user_list.php';
                break;
            case 'insert':
                require_once 'models/role_model.php';

                $roleModel = new RoleModel();
                $roles = $roleModel->getRoles(); 
                include 'views/user_insert.php';
                break;
            case 'add':
                $userModel = new Users();
                $userModel->insertUser($_POST['username'],$_POST['password'],$_POST['email'],$_POST['role_id']);
                header('Location: ?modul=users&fitur=list');
                break;    
        }
        break;
    case 'category':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : 'list';
        require_once 'models/category_model.php';
        switch ($fitur) {
            case 'list':
                $categoryModel = new CategoryModel();
                $search = isset($_GET['search']) ? $_GET['search']: '';
                $limit = 5;
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $offset = ($page - 1) * $limit;
                
                $totalCategories = $categoryModel->getTotalCategories($search);
                $totalPages = ceil($totalCategories / $limit);
                
                $categories = $categoryModel->getCategories($search, $limit, $offset);
                include 'views/category_list.php';
                break;
            case 'insert':
                include 'views/category_insert.php';
                break;
            case 'add':
                $categoryModel = new CategoryModel();
                $image = isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK ? $_FILES['image'] : null;
                $categoryModel->insertCategory($_POST['name'], $_POST['description'], $_POST['slug'], $image,$_POST['tipe']);
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
                $tipe = $_POST['tipe'];
                $categoryModel = new CategoryModel();
                if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                    $image_name = $_FILES['image']['name'];
                    $image_tmp = $_FILES['image']['tmp_name'];
                    $image_path = "assets/" . $image_name;
                    move_uploaded_file($image_tmp, $image_path);
                } else {
                    $image_path = $categoryModel->getCategoryById($id)['image'];
                }
                $categoryModel->updateCategory($id, $name, $description, $slug, $image_path,$tipe);

            
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
                $search = isset($_GET['search']) ? $_GET['search'] : '';
                $category_id = isset($_GET['category_id']) ? $_GET['category_id'] : null;
                $limit = 5;
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $offset = ($page - 1) * $limit;
            
                $totalProducts = $productModel->GetTotalProducts($search, $category_id);
                $totalPages = ceil($totalProducts / $limit);
            
                $products = $productModel->GetProducts($search, $category_id, $limit, $offset);
            
                require_once 'models/category_model.php';
                $categoryModel = new CategoryModel();
                $categories = $categoryModel->getCategories();
            
                include 'views/product_list.php';
                break;
            case 'insert':
                require_once 'models/category_model.php';
                $categoryModel = new CategoryModel();
                $categories = $categoryModel->getCategories();
                include 'views/product_insert.php';
                break;
            case 'add':
                $productModel = new ProductModel();
                print_r($_POST['category_id']);
                $productModel->insertProduct($_POST['name'],  $_POST['category_id'], $_POST['stock'], $_POST['price']);
                header('Location: index.php?modul=product&fitur=list');
                break;
            case 'edit':
                $product_id = $_GET['id'];
                require_once 'models/category_model.php';
                $productModel = new ProductModel();
                $categoryModel = new CategoryModel();
                $categories = $categoryModel->getCategories();
                $product = $productModel->getProductById($product_id);
                // var_dump($product);
                include 'views/product_update.php';
                break;
            case 'update':
                
                $id = $_POST['id'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $stock = $_POST['stock'];
                $category_id = $_POST['category_id'];
                var_dump($_POST['id'],"-",$_POST['name'],"-",$_POST['price'],"-",$_POST['category_id']);
                $productModel = new ProductModel();
                if ($productModel->updateProduct($id, $name, $price,$stock, $category_id)) {
                    $_SESSION['message'] = "Produk berhasil diperbarui.";
                    header('Location: index.php?modul=product&fitur=list');
                    exit;
                } else {
                    $_SESSION['error'] = "Gagal memperbarui produk.";
                    header('Location: index.php?modul=product&fitur=edit&id=' . $id);
                    exit;
                }
                
            case 'delete':
                $_SESSION['message'] = "Data berhasil diperbarui!"; // atau "Data berhasil dihapus!"
                $productModel = new ProductModel();
                $productModel->deleteProductByid($_GET['id']);
                header('Location: index.php?modul=product&fitur=list');
        }
        break;
    case 'login-admmin':
        include 'login-admin.php';
        break;
    case 'store':
        require_once 'models/category_model.php';
        $limit = 6;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getCategories('', $limit, $offset);
        $categoriesCard = $categoryModel->getCategories('', 12, $offset);
        $filter = isset($_GET['filter']) ? $_GET['filter'] : null;
        if ($filter) {
            $categoriesCard= $categoryModel->getFilteredCategoriesByTipe($filter);
        } else {
            // Jika tidak ada filter, ambil kategori default
            $categoriesCard = $categoryModel->getFilteredCategoriesByTipe('topup');
        }
        include 'views/store/store.php';
        break;
    default:
        
        break;
}

?>