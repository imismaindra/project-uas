<?php

require_once 'models/user_model.php';

class UserController {
    public function list() {
        $userModel = new Users();
        $users = $userModel->getAllUsers();
        include 'views/user/user_list.php';
    }

    public function create() {
        $roleModel = new RoleModel();
        $roles = $roleModel->getRoles(); 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $role = $_POST['role'] ?? 'member';

            $userModel = new Users();
            $userModel->insertUser($_POST['username'],$_POST['password'],$_POST['email'],$_POST['role_id']);

            header('Location: /user/list');
        }


        include 'views/user/user_insert.php';
    }

    public function delete($id) {
        $userModel = new Users();
        $userModel->deleteUser($id);

        header('Location: /user/list');
    }

    public function edit($id) {
        $userModel = new Users();
        $user = $userModel->getUser($id);
        $roleModel = new RoleModel();
        $roles = $roleModel->getRoles(); 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel->updateUser($id, $_POST['username'], $_POST['password'], $_POST['email'], $_POST['role_id']);
            header('Location: /user/list');
            exit();
        }
        include 'views/user/user_update.php';
    }
}
