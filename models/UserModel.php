<?php
class UserModel
{
    public function findAll()
    {
        require '../../config/koneksi.php';
        $query = "SELECT * FROM tb_user";
        return mysqli_query($koneksi, $query);
    }

    public function getDataById($id)
    {
        require '../../config/koneksi.php';
        $query = "SELECT * FROM tb_user where id_user='$id'";
        return mysqli_query($koneksi, $query);
    }

    public function getDataByUsernameAndPassword($username, $password)
    {
        require '../../config/koneksi.php';
        $query = "SELECT * FROM tb_user where username='$username' AND password='$password'";
        return mysqli_query($koneksi, $query);
    }

    public function getDataByUsername($username)
    {
        require '../../config/koneksi.php';
        $query = "SELECT * FROM tb_user where username='$username'";
        return mysqli_query($koneksi, $query);
    }

    public function getTotalUser($role)
    {
        require '../../config/koneksi.php';
        $query = "SELECT COUNT(role) as total FROM tb_user WHERE role='$role'";
        return mysqli_query($koneksi, $query);
    }


    public function save($nama, $username, $password, $role)
    {
        require '../../config/koneksi.php';
        $query = "INSERT INTO tb_user VALUES ('', '$nama', '$username', '$password', '$role')";
        return mysqli_query($koneksi, $query);
    }

    public function update($id, $nama, $username, $password, $role)
    {
        require '../../config/koneksi.php';
        $query = "UPDATE tb_user set nama='$nama', username='$username', password='$password', role='$role' where id_user='$id'";
        return mysqli_query($koneksi, $query);
    }

    public function delete($id)
    {
        require '../../config/koneksi.php';
        $query = "DELETE FROM tb_user where id_user='$id'";
        return mysqli_query($koneksi, $query);
    }
}
