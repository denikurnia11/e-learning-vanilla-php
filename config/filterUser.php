<?php
if (!$_SESSION['isLogin']) {
    return header("Location: ../auth/login.php?message=Login terlebih dahulu!&alert=danger");
}
if ($_SESSION['role'] != 'user') {
    return header("Location: ../admin/dashboard.php");
}
