<?php

$modul = isset($_GET['modul']) ? $_GET['modul'] : 'store';

switch ($modul) {
    case 'role': 
        break;
    case 'login-admmin':
        include 'login-admin.php';
        break;
    default:
        // $store = new ();
        include 'views/store/store.php';
        break;
}
?>