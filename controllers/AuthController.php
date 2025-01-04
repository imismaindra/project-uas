<?php
require_once 'models/user_model.php';

class AuthController {
    public function login() {
        $userModel = new Users();
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;

        try {
            $check = $userModel->checkLogin($email, $password);
            if ($check) {
                $_SESSION['user'] = $check;
                $redirect = $check['role_id'] == 1 ? 'index.php?modul=dashboard' : 'index.php';
                header("Location: $redirect");
                exit();
            } else {
                echo "Login gagal.";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit();
    }
}
