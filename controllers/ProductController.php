<?php

require_once 'models/product_model.php';
require_once 'models/category_model.php';
require_once 'BaseController.php';

class ProductController extends BaseController {
    private $productModel;
    private $categoryModel;


    public function __construct() {
        parent::__construct();
        $this->productModel = new ProductModel($this->conn);
        $this->categoryModel = new CategoryModel();
    }

    /**
     * List all products with pagination and filtering.
     */
    public function list() {
        try {
            // Ambil parameter dari URL
            $search = isset($_GET['search']) ? trim($_GET['search']) : '';
            $category_id = isset($_GET['category_id']) ? (int)$_GET['category_id'] : null;

            // Pagination
            $limit = 5;
            $page = isset($_GET['page']) ? max((int)$_GET['page'], 1) : 1;
            $offset = ($page - 1) * $limit;

            // Hitung total produk dan halaman
            $totalProducts = $this->productModel->getTotalProducts($search, $category_id);
            $totalPages = ceil($totalProducts / $limit);

            // Ambil data produk dengan filter dan pencarian
            $products = $this->productModel->getProducts($search, $category_id, $limit, $offset);

            // Ambil daftar kategori
            $categories = $this->categoryModel->getCategories();

            // Tampilkan halaman
            include 'views/product/product_list.php';
        } catch (Exception $e) {
            error_log("Error in ProductController::list - " . $e->getMessage());
            include 'views/error.php';
        }
    }

    /**
     * Show the form to create a new product and handle form submission.
     */
    public function create() {
        try {
            $categories = $this->categoryModel->getCategories();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = trim($_POST['name']);
                $category_id = (int)$_POST['category_id'];
                $stock = (int)$_POST['stock'];
                $price = (float)$_POST['price'];

                // Validasi input
                if (empty($name) || $category_id <= 0 || $stock < 0 || $price < 0) {
                    throw new Exception("Invalid input data.");
                }

                $this->productModel->insertProduct($name, $category_id, $stock, $price);
                header('Location: /product/list');
                exit;
            }

            include 'views/product/product_insert.php';
        } catch (Exception $e) {
            error_log("Error in ProductController::create - " . $e->getMessage());
            include 'views/error.php';
        }
    }

    /**
     * Show the form to edit a product and handle form submission.
     */
    public function edit($id) {
        try {
            $categories = $this->categoryModel->getCategories();
            $product = $this->productModel->getProductById($id);

            if (!$product) {
                throw new Exception("Product not found.");
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = trim($_POST['name']);
                $category_id = (int)$_POST['category_id'];
                $stock = (int)$_POST['stock'];
                $price = (float)$_POST['price'];

                // Validasi input
                if (empty($name) || $category_id <= 0 || $stock < 0 || $price < 0) {
                    throw new Exception("Invalid input data.");
                }

                $this->productModel->updateProduct($id, $name, $price, $stock, $category_id);
                header('Location: /product/list');
                exit;
            }

            include 'views/product/product_update.php';
        } catch (Exception $e) {
            error_log("Error in ProductController::edit - " . $e->getMessage());
            include 'views/error.php';
        }
    }

    /**
     * Delete a product by ID.
     */
    public function delete($id) {
        try {
            $deletedRows = $this->productModel->deleteProductById($id);

            if ($deletedRows === 0) {
                throw new Exception("Failed to delete product or product not found.");
            }

            header('Location: /product/list');
            exit;
        } catch (Exception $e) {
            error_log("Error in ProductController::delete - " . $e->getMessage());
            include 'views/error.php';
        }
    }
}
