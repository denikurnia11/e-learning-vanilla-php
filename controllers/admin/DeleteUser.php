<?php
require_once '../../models/UserModel.php';
$UserModel = new UserModel();

$id = $_GET['id'];
if ($UserModel->delete($id)) {
    return header('Location: ../../views/admin/users.php');
} else {
    return "Hapus Gagal : " . mysqli_error($koneksi);
}
