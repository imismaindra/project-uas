<?php
require_once 'models/role_model.php';
class RoleController {
    public function list() {
        $roleModel = new RoleModel();
        $roles = $roleModel->getRoles();
        include 'views/role/role_list.php';
    }

    public function add() {
        $roleModel = new RoleModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $roleModel->insertRole($_POST['name'], $_POST['description'], $_POST['is_aktif']);
            header('Location: /role/list');
            exit();
        }
        include 'views/role/role_insert.php';
    }
    public function delete($id) {
        $roleModel = new RoleModel();
        $roleModel->deleteRole($id);
        header('Location: /role/list');
    }
    public function edit($id) {
        $roleModel = new RoleModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $roleModel->updateRole($id, $_POST['name'], $_POST['description'], $_POST['is_aktif']);
            header('Location: /role/list');
            exit();
        }
        $role = $roleModel->getRole($id);
        include 'views/role/role_update.php';
    }
}

