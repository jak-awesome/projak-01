<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['login']);
unset($_SESSION['id_akun_pelanggan']);
session_destroy();
header("Location:../../login/login.php");
?>