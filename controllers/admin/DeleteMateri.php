<?php
require_once '../../models/MateriModel.php';
$MateriModel = new MateriModel();

$id = $_GET['id'];
// Hapus File
$fileName =  mysqli_fetch_array($MateriModel->getDataURLById($id))[0];
unlink('../../uploads/' . $fileName);
// Hapus data di database
if ($MateriModel->delete($id)) {
    return header('Location: ../../views/admin/materi.php');
} else {
    return "Hapus Gagal : " . mysqli_error($koneksi);
}
