<?php
require_once 'models/product_model.php';
require_once 'models/category_model.php';

class ProductController {
    public function list() {
        $productModel = new ProductModel();
        $search = $_GET['search'] ?? '';
        $category_id = $_GET['category_id'] ?? null;
        $limit = 5;
        $page = $_GET['page'] ?? 1;
        $offset = ($page - 1) * $limit;

        $totalProducts = $productModel->GetTotalProducts($search, $category_id);
        $totalPages = ceil($totalProducts / $limit);

        $products = $productModel->GetProducts($search, $category_id, $limit, $offset);

        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getCategories();

        include 'views/product_list.php';
    }

    public function insert() {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getCategories();
        include 'views/product_insert.php';
    }

    public function add() {
        $productModel = new ProductModel();
        $productModel->insertProduct($_POST['name'], $_POST['category_id'], $_POST['stock'], $_POST['price']);
        header('Location: index.php?modul=product&fitur=list');
    }
}
