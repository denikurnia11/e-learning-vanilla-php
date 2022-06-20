<?php
require_once '../../models/UserModel.php';
$UserModel = new UserModel();

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = sha1($_POST['password']);
$cpassword = sha1($_POST['cpassword']);
$role = 'user';

// Cek apakah user sudah terdaftar
$duplicate = $UserModel->getDataByUsername($username);
if (mysqli_num_rows($duplicate) > 0) {
    return header("Location: ../../views/auth/register.php?message=Username sudah digunakan!&alert=danger");
}

if ($UserModel->save($nama, $username, $password, $role)) {
    return header('Location: ../../views/auth/login.php?message=Registrasi Berhasil!&alert=success');
} else {
    return "Pendaftaran Gagal : " . mysqli_error($koneksi);
}
