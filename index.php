<?php
session_start();
require_once 'router.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/ProductController.php';
require_once 'controllers/UserController.php';
require_once 'controllers/CategoryController.php';
require_once 'controllers/DashboardController.php';
require_once 'controllers/StoreController.php';
require_once 'controllers/TransaksiController.php';
require_once 'controllers/RoleController.php';
require_once 'controllers/MemberController.php';
$router = new Router();


$router->add('auth/login', [AuthController::class, 'loginForm']);
$router->add('auth/checklogin', [AuthController::class, 'login']);
$router->add('auth/logout', [AuthController::class, 'logout']);
$router->add('auth/register', [AuthController::class, 'registerForm']);
$router->add('auth/checkregister', [AuthController::class, 'register']);

$router->add('product/list', [ProductController::class, 'list']);
$router->add('product/add/{id}', [ProductController::class, 'create']);
$router->add('product/delete/{id}', [ProductController::class, 'delete']);
$router->add('product/edit/{id}', [ProductController::class, 'edit']);

$router->add('user/list', [UserController::class, 'list']);
$router->add('user/add', [UserController::class, 'create']);
$router->add('user/delete/{id}', [UserController::class, 'delete']);
$router->add('user/edit/{id}', [UserController::class, 'edit']);
$router->add('member/list', [MemberController::class, 'list']);

$router->add('category/list', [CategoryController::class, 'list']);
$router->add('category/add', [CategoryController::class, 'create']);
$router->add('category/delete', [CategoryController::class, 'delete']);

//route role
$router->add('role/list', [RoleController::class, 'list']);
$router->add('role/add', [RoleController::class, 'add']);
$router->add('role/delete/{id}', [RoleController::class, 'delete']);
$router->add('role/edit/{id}', [RoleController::class, 'edit']);
$router->add('role/update', [RoleController::class, 'edit']);

//route transaksi
$router->add('transaksi/list', [TransaksiController::class, 'list']);
$router->add('transaksi/detail/{id}', [TransaksiController::class, 'get_detail']);
$router->add('transaksi/add', [TransaksiController::class, 'add']);
$router->add('transaksi/export_pdf', [TransaksiController::class, 'exportPDF']);

$router->add('dashboard', [DashboardController::class, 'index']);

$router->add('', [StoreController::class, 'index']);
$router->add('store', [StoreController::class, 'index']);
$router->add('topup/{slug}', [StoreController::class, 'productList']);
$router->add('transaksi/invoice', [TransaksiController::class, 'forminvoice']);
$router->add('transaksi/checkinvoice/{invoices}', [TransaksiController::class, 'checkinvoice']);
$router->add('leaderboard', [StoreController::class, 'leaderboard']);
$router->add('calculator/winrate', [StoreController::class, 'ClacWinRate']);



// Ambil URI dari request
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// Dispatch request
$router->dispatch($uri);
