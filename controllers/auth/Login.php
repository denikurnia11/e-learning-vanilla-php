<?php
session_start();
require_once '../../models/UserModel.php';
$UserModel = new UserModel();

$username = $_POST['username'];
$password = sha1($_POST['password']);

// Cek username dan password
$cek = $UserModel->getDataByUsernameAndPassword($username, $password);
if (mysqli_num_rows($cek) == 0) {
    return header("Location: ../../views/auth/login.php?message=Username atau Password Salah!&alert=danger");
}

// Cek role
$data = mysqli_fetch_array($cek);
$_SESSION['username'] = $data['username'];
$_SESSION['role'] = $data['role'];
$_SESSION['isLogin'] = true;
if ($data['role'] == 'admin') {
    return header("Location: ../../views/admin/dashboard.php");
} else {
    return header("Location: ../../views/user/home.php");
}
