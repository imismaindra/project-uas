<?php
require_once 'models/member_model.php';

class MemberController {
    public function list() {
        $memberModel = new Member();
        $members = $memberModel->getAllUsers();
        include 'views/member_list.php';
    }

    // public function add() {
    //     $memberModel = new Member();
    //     $memberModel->createMember($_POST['name'], $_POST['email']);
    //     header('Location: index.php?modul=member&fitur=list');
    // }

    // public function delete() {
    //     $memberModel = new Member();
    //     $id = $_GET['id'] ?? null;

    //     if ($id) {
    //         $memberModel->deleteMember($id);
    //         header('Location: index.php?modul=member&fitur=list');
    //     } else {
    //         echo "ID member tidak ditemukan.";
    //     }
    // }
}
