<?php
require_once 'models/role_model.php';

function handleRole() {
    $roleModel = new RoleModel();
    $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;

    switch ($fitur) {
        case 'list':
            $roles = $roleModel->getRoles();
            include 'views/role_list.php';
            break;
        case 'add':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $roleModel->insertRole($_POST['name'], $_POST['description'], $_POST['permissions']);
                header('Location: index.php?modul=role&fitur=list');
                exit();
            }
            include 'views/role_form.php';
            break;
        default:
            echo "Fitur Role tidak valid.";
            break;
    }
}
