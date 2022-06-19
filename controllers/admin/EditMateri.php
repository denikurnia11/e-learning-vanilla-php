<?php
require_once '../../models/MateriModel.php';
$MateriModel = new MateriModel();

// tentukan lokasi file akan dipindahkan
$folder = '../../uploads/';
date_default_timezone_set('Asia/Makassar');
$dates = date("Ymdhisa");

$id = $_POST['id'];
$judul = $_POST['judul'];
$keterangan = $_POST['keterangan'];
$fileName = $_FILES['file']['name'];
$fileSize = $_FILES['file']['size'];
$fileOLD = $_POST['fileOLD'];

// Cek apakah mengubah file
if (strlen($fileName) == 0) {
    // Tidak mengupload file
    if ($MateriModel->update($id, $judul, $keterangan, $fileOLD)) {
        return header('Location: ../../views/admin/materi.php');
    } else {
        return "Insert Gagal : " . mysqli_error($koneksi);
    }
} else {
    // Mengupload file
    // Hapus file lama
    unlink('../../uploads/' . $fileOLD);
    // Cek Ekstensi file
    $extensionList = array("docx", 'pptx', "xlsx", "pdf");
    $ekstensi = explode(".", $fileName)[1];
    if (in_array($ekstensi, $extensionList)) {
        // Kurang dari 5mb
        if ($fileSize <= 5242880) {
            // tmp
            $namaSementaraLampiran = $_FILES['file']['tmp_name'];
            $namabarulampiran = $dates . $fileName;
            // pindahkan file
            move_uploaded_file($namaSementaraLampiran, $folder . $namabarulampiran);
            if ($MateriModel->update($id, $judul, $keterangan, $namabarulampiran)) {
                return header('Location: ../../views/admin/materi.php');
            } else {
                return "Insert Gagal : " . mysqli_error($koneksi);
            }
        } else {
            return header("Location: ../../views/admin/editMateri.php?message=Ukuran File maksimal 5mb!&id=$id");
        }
    } else {
        return header("Location: ../../views/admin/editMateri.php?message=File harus memiliki format docx, pptx, xlsx, atau pdf!&id=$id");
    }
}
