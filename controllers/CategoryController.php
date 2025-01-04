<?php
require_once 'models/category_model.php';

class CategoryController {
    public function list() {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getCategories();
        include 'views/category_list.php';
    }

    public function add() {
        $categoryModel = new CategoryModel();
        $categoryModel->insertCategory($_POST['name'], $_POST['description'], $_POST['created_at'], $_POST['updated_at'], $_POST['status']);
        header('Location: index.php?modul=category&fitur=list');
    }

    public function delete() {
        $categoryModel = new CategoryModel();
        $id = $_GET['id'] ?? null;

        if ($id) {
            $categoryModel->deleteCategory($id);
            header('Location: index.php?modul=category&fitur=list');
        } else {
            echo "ID kategori tidak ditemukan.";
        }
    }
}
