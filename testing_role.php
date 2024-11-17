<?php
include 'models/role_model.php';

$roleModel = new RoleModel();
$roles = $roleModel->getRoles();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Roles</title>
</head>
<body>
    <h1>Daftar Role</h1>
    <table border="1">
        <tr>
            <th>Role ID</th>
            <th>Role Name</th>
            <th>Role Description</th>
            <th>Role Status</th>
        </tr>
        <?php foreach ($roles as $role): ?>
        <tr>
            <td><?php echo $role['id']; ?></td>       <!-- Sesuaikan dengan nama kolom di tabel Anda -->
            <td><?php echo $role['name']; ?></td>     <!-- Sesuaikan dengan nama kolom di tabel Anda -->
            <td><?php echo $role['description']; ?></td>    <!-- Sesuaikan dengan nama kolom di tabel Anda -->
            <td><?php echo $role['is_aktif']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>