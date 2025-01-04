<?php
require_once 'models/role_model.php';

class RoleController {
    public function list() {
        $roleModel = new RoleModel();
        $roles = $roleModel->getAllRoles();
        include 'views/role_list.php';
    }

    public function add() {
        $roleModel = new RoleModel();
        $roleModel->createRole($_POST['name']);
        header('Location: index.php?modul=role&fitur=list');
    }

    public function delete() {
        $roleModel = new RoleModel();
        $id = $_GET['id'] ?? null;

        if ($id) {
            $roleModel->deleteRole($id);
            header('Location: index.php?modul=role&fitur=list');
        } else {
            echo "ID role tidak ditemukan.";
        }
    }
}
