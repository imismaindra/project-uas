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
        'EA FC' => '/assets/include/FUT.png',
    ];
    $banner = [
        'Mobile Legends' => '/assets/include/banner-ml.webp',
        'Free Fire' => '/assets/include/dm.webp',
        'PUBG' => '/assets/include/banner-pubg.jpg',
        'Valorant' => '/assets/include/vp.webp',
        'Genshin Impact' => '/assets/include/gc.webp',
        'Honor of King' => '/assets/include/banner-hok.jpg',
        'EA FC' => '/assets/include/banner-EA.jpeg',
    ];

    include 'views/store/product-list.php';
    exit; // Hentikan eksekusi agar tidak masuk ke switch $modul
}
switch ($modul) {
    case 'leaderboard':
        require_once 'models/dashboard_model.php';
        require_once 'models/user_model.php';

        $dashboard = new DashboardModel();
        $userModel = new Users();
      
        $top5order = $dashboard->getTop5Transaksi();
        include 'views/store/leaderboard.php';

        break;
    case 'dashboard':
        include 'views/dashboard.php';
        break;
    case 'auth':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
        if (file_exists('models/user_model.php')) {
            require_once 'models/user_model.php';
            $userModel = new Users();
            switch ($fitur) {
                case 'login':           
                    $email = isset($_POST['email']) ? $_POST['email'] : null;
                    $password = isset($_POST['password']) ? $_POST['password'] : null;
                    try {
                        $check = $userModel->checkLogin($email, $password);
                        if ($check != null && $check['role_id'] == 1) {
                            $_SESSION['user'] = $check;
                            header('Location: index.php?modul=dashboard');
                            exit();
                        }elseif($check != null && $check['role_id'] == 3){
                            $_SESSION['user'] = $check;
                            header('Location:index.php?');
                        } else {
                            echo "Login gagal. Periksa email dan password Anda.";
                        }
                    } catch (Exception $e) {
                        echo "Error: " . $e->getMessage();
                    }   
                    break;
                case 'register':
                    // Logika untuk registrasi
                    break;
                case 'logout':
                    session_unset();
                    session_destroy();
                    header('Location: index.php?'); 
                    exit();
                default:
                    echo "Fitur tidak valid.";
                    break;
            }
        } else {
            die('File user_model.php tidak ditemukan.');
        }
        break;
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
        require_once 'models/product_model.php';
        require_once 'models/user_model.php';
        require_once 'models/category_model.php';
        require_once 'models/dashboard_model.php';
       

        switch($fitur){
            case 'list':
                $productModel =  new productModel();
                $transaksiModel = new TransaksiModel();
                $transaksis = $transaksiModel->getAllTransaksi();
                include 'views/transaction_list.php';
                break;
            case 'get_detail':
                $transaksiModel = new TransaksiModel();
                if (isset($_GET['id'])) {
                    $id = intval($_GET['id']);
                    $transaksi = $transaksiModel->getTransaksiById($id);
                    if ($transaksi) {
                        echo json_encode($transaksi[0]); // Kirim data transaksi sebagai JSON
                    } else {
                        echo json_encode(['error' => 'Transaksi tidak ditemukan']);
                    }
                } else {
                    echo json_encode(['error' => 'ID tidak valid']);
                }
                break;                
            case 'add':
                $memberId = isset($_SESSION['user']['id']) && $_SESSION['user']['id']  !== NULL ? $_SESSION['user']['id'] : NULL;
                $akungame_id = isset($_POST['akungame_id']) ? $_POST['akungame_id'] : NULL;
                $bank_id = isset($_POST['bank_id']) ? $_POST['bank_id'] : NULL;


                $total_price = $_POST['totalAmount'];
                $productId = $_POST['product_id'];
                $pembayaran = $_POST['pembayaran'];
                $accountId = $_POST['id'];
                $qty = $_POST['amount'];
                $email = $_POST['email'];
                $transaksiModel = new TransaksiModel();
                $invoiceId = $transaksiModel->insertTransaksi($memberId, $email, $productId, $qty, $total_price, $pembayaran,$akungame_id,$bank_id, 0);   
                if ($invoiceId) {
                    header("Location: ?modul=transaksi&fitur=invoice&invoices=$invoiceId");
                    exit();
                } else {
                    echo "Error: " . $invoiceId;
                }
                break;
            case 'pembayaran':
                $transaksiModel = new TransaksiModel();
                $VaCode = $_GET['vacode']??null;
                $transaksibyVA = $transaksiModel->getTransaksiByVaCode($VaCode);
                if ($transaksibyVA) {
                    include 'views/store/pembayaran.php';
                    
                } else {
                    include 'views/store/pembayaran.php';
                }
                break;
        
            case 'update':
                $transaksiId = $_GET['id'];
                $transaksiModel = new TransaksiModel();
                $status = $_GET['status'];
                if(isset($transaksiId) && isset($status)){
                    try {
                        $transaksiModel->updateTransaksi($transaksiId,$status);
                        header('Location: index.php?modul=transaksi&fitur=list');

                    } catch (Exception $e) {
                        echo "Error: " . $e->getMessage();
                    }
                }
                break;
            case 'invoice':
                $productModel =  new productModel();
                $usermodel = new Users();
                $transaksiModel = new TransaksiModel();
                $categoryModel = new CategoryModel();
                $invoiceId = $_GET['invoices']??null;
                $transaksibyInvoices = $transaksiModel->getTransaksiByInvoice($invoiceId);
                if ($transaksibyInvoices) {
                    include 'views/store/transactions.php';
                } else {
                    include 'views/store/transactions.php';
                    echo "Invoice tidak ditemukan.";
                }
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