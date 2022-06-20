<?php
if (isset($_SESSION['isLogin'])) {
    echo '<script>window.history.back();</script>';
}
