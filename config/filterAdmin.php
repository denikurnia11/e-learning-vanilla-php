<?php 
if (!$_SESSION['isLogin']) {
    return header("Location: ../auth/login.php?message=Login terlebih dahulu!&alert=danger");
}
if ($_SESSION['role'] != 'admin') {
    return header("Location: ../user/home.php");
}
