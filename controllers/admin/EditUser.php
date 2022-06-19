<?php
require_once '../../models/UserModel.php';
$UserModel = new UserModel();

$id = $_POST['id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = sha1($_POST['password']);
$role = $_POST['role'];
$usernameOLD = $_POST['usernameOLD'];

// Cek duplikat username
$duplicate = $UserModel->getDataByUsername($username);
// Cek apakah merubah username
if (mysqli_num_rows($duplicate) > 0 && $usernameOLD !=  mysqli_fetch_array($duplicate)['username']) {
    return header("Location: ../../views/admin/editUser.php?message=Username sudah digunakan!&id=$id");
}
// Update
if ($UserModel->update($id, $nama, $username, $password, $role)) {
    return header('Location: ../../views/admin/users.php');
} else {
    return "Pendaftaran Gagal : " . mysqli_error($koneksi);
}
