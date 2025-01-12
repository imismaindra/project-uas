<?php

require_once 'models/category_model.php';

class CategoryController {
    public function list() {
        $categoryModel = new CategoryModel();

        // Ambil parameter pencarian dan pagination
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $limit = 5; // Jumlah item per halaman
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        // Hitung total kategori untuk pagination
        $totalCategories = $categoryModel->getTotalCategories($search);
        $totalPages = ceil($totalCategories / $limit);

        // Ambil data kategori dengan pagination dan search
        $categories = $categoryModel->getCategories($search, $limit, $offset);

        // Tampilkan view
        include 'views/category/category_list.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $image = isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK ? $_FILES['image'] : null;

            $categoryModel = new CategoryModel();
            $categoryModel->insertCategory($_POST['name'], $_POST['description'], $_POST['slug'], $image, $_POST['tipe']);

            header('Location: /category/list');
            exit;
        }

        include 'views/category/category_insert.php';
    }

    public function delete($id) {
        $categoryModel = new CategoryModel();
        $categoryModel->deleteCategory($id);

        header('Location: /category/list');
        exit;
    }
}
