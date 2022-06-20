<?php
class MateriModel
{
    public function findAll()
    {
        require '../../config/koneksi.php';
        $query = "SELECT * FROM tb_materi";
        return mysqli_query($koneksi, $query);
    }

    public function getDataById($id)
    {
        require '../../config/koneksi.php';
        $query = "SELECT * FROM tb_materi WHERE id_materi='$id'";
        return mysqli_query($koneksi, $query);
    }

    public function getDataURLById($id)
    {
        require '../../config/koneksi.php';
        $query = "SELECT url FROM tb_materi WHERE id_materi='$id'";
        return mysqli_query($koneksi, $query);
    }

    public function getTotalMateri()
    {
        require '../../config/koneksi.php';
        $query = "SELECT COUNT(*) as total FROM tb_materi";
        return mysqli_query($koneksi, $query);
    }

    public function save($judul, $keterangan, $file)
    {
        require '../../config/koneksi.php';
        $query = "INSERT INTO tb_materi VALUES ('', '$judul', '$keterangan', '$file')";
        return mysqli_query($koneksi, $query);
    }


    public function update($id, $judul, $keterangan, $url)
    {
        require '../../config/koneksi.php';
        $query = "UPDATE tb_materi set judul='$judul', keterangan='$keterangan', url='$url' where id_materi='$id'";
        return mysqli_query($koneksi, $query);
    }

    public function delete($id)
    {
        require '../../config/koneksi.php';
        $query = "DELETE FROM tb_materi where id_materi='$id'";
        return mysqli_query($koneksi, $query);
    }
}
