<?php
require_once 'models/user_model.php';

class AuthController {
    public function loginForm() {
        include 'views/auth/login.php';
    }
    
    public function login() {
        $userModel = new Users();
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;

        try {
            $check = $userModel->checkLogin($email, $password);
            if ($check) {
                $_SESSION['user'] = $check;
                $_SESSION['status'] = 'success';
                $_SESSION['message'] = 'Login berhasil! Selamat datang.';
                $_SESSION['redirect'] = $check['role_id'] == 1 ? '/dashboard' : '/store';
            } else {
                $_SESSION['status'] = 'error';
                $_SESSION['message'] = 'Email atau password salah.';
            }
            header('Location: /auth/login');
            exit();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function registerForm() {
        include 'views/auth/register.php';
    }
    public function register() {
        $userModel = new Users();
        $username = $_POST['username'] ?? null;
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;
        $role_id = 2;

        $data = [
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'role_id' => $role_id,
        ];

        try {
            $userModel->checkRegister($data);
            // echo "Registr";
            // Kirim pesan sukses menggunakan session
            $_SESSION['status'] = 'success';
            // echo "Registrasi berhasil! Silakan login.";
            $_SESSION['message'] = 'Registrasi berhasil! Silakan login.';
            $_SESSION['redirect'] = '/auth/login';
        } catch (Exception $e) {
            // Kirim pesan error menggunakan session
            $_SESSION['status'] = 'error';
            $_SESSION['message'] = $e->getMessage();
            $_SESSION['redirect'] = '';
        }

        header('Location: /auth/register'); // Kembali ke halaman registrasi
        exit();
    }

    public function logout() {
        session_unset();
        session_destroy();
        header('Location: /store');
        exit();
    }
}
