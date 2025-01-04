<?php
require_once 'models/dashboard_model.php';

class DashboardController {
    public function index() {
        $dashboardModel = new DashboardModel();
        $stats = $dashboardModel->getTop5Transaksi();
        include 'views/dashboard.php';
    }
}
