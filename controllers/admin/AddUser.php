<?php
require_once '../../models/UserModel.php';
$UserModel = new UserModel();

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = sha1($_POST['password']);
$role = $_POST['role'];

// Cek duplikat username
$duplicate = $UserModel->getDataByUsername($username);
if (mysqli_num_rows($duplicate) > 0) {
    return header("Location: ../../views/admin/addUser.php?message=Username sudah digunakan!");
}

if ($UserModel->save($nama, $username, $password, $role)) {
    return header('Location: ../../views/admin/users.php');
} else {
    return "Pendaftaran Gagal : " . mysqli_error($koneksi);
}
