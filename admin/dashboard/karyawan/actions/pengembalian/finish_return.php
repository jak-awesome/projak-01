<?php
include "../../../../../koneksi.php";
session_start();

$id_pengembalian = $_POST['id_pengembalian'];

$query = mysqli_query($koneksi, "UPDATE pengembalian SET status_pengembalian='Pengembalian Selesai' WHERE id_pengembalian='$id_pengembalian'");

header("Location: ../../data_pengembalian.php");
?>