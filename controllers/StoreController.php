<?php

require_once 'models/product_model.php';
require_once 'models/category_model.php';

class StoreController {
    public function index() {
        $categoryModel = new CategoryModel();
        $limit = 6;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        $categories = $categoryModel->getCategories('', $limit, $offset);
        $categoriesCard = $categoryModel->getCategories('', 12, $offset);
        $filter = isset($_GET['filter']) ? $_GET['filter'] : null;

        if ($filter) {
            $categoriesCard = $categoryModel->getFilteredCategoriesByTipe($filter);
        } else {
            $categoriesCard = $categoryModel->getFilteredCategoriesByTipe('topup');
        }

        include 'views/store/store.php';
    }

    public function productList($slug) {
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
    }

    public function leaderboard() {
        require_once 'models/dashboard_model.php';
        require_once 'models/user_model.php';

        $dashboard = new DashboardModel();
        $userModel = new Users();
      
        $top5order = $dashboard->getTop5Transaksi();
        include 'views/store/leaderboard.php';
    }
}
