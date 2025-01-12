<?php

require_once 'models/product_model.php';

    class ProductController {
        public function list() {
            $productModel = new ProductModel();
            $categoryModel = new CategoryModel();
    
            // Ambil parameter dari URL
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            $category_id = isset($_GET['category_id']) ? $_GET['category_id'] : null;
    
            // Pagination
            $limit = 5;
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $page = max($page, 1); // Pastikan halaman tidak negatif
            $offset = ($page - 1) * $limit;
    
            // Hitung total produk dan halaman
            $totalProducts = $productModel->GetTotalProducts($search, $category_id);
            $totalPages = ceil($totalProducts / $limit);
    
            // Ambil data produk dengan filter dan pencarian
            $products = $productModel->getProducts($search, $category_id, $limit, $offset);
    
            // Ambil daftar kategori
            $categories = $categoryModel->getCategories();
    
            // Tampilkan halaman
            include 'views/product/product_list.php';
        }

    public function create() {
        require_once 'models/category_model.php';
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getCategories();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $productModel = new ProductModel();
            
            $productModel->insertProduct($_POST['name'],  $_POST['category_id'], $_POST['stock'], $_POST['price']);

            header('Location: /product/list');
        }

        include 'views/product/product_insert.php';
    }

    public function edit($id){
        require_once 'models/category_model.php';
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getCategories();
        $productModel = new ProductModel();
        $product = $productModel->getProductById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productModel->updateProduct($id, $_POST['name'], $_POST['category_id'], $_POST['stock'], $_POST['price']);
            header('Location: /product/list');
        }

        include 'views/product/product_update.php';
    }

    public function delete($id) {
        $productModel = new ProductModel();
        $productModel->deleteProductByid($id);

        header('Location: /product/list');
    }
}
