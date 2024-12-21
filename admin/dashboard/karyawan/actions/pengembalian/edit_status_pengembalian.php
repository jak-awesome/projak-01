<?php
include "../../../../../koneksi.php";
session_start();

if(isset($_POST['ubahStatus'])){
    $status_pengembalian = $_POST['status_pengembalian'];
    $id_pengembalian = $_POST['id_pengembalian'];

    $query = mysqli_query($koneksi, "UPDATE pengembalian SET status_pengembalian='$status_pengembalian' WHERE id_pengembalian='$id_pengembalian'");

    header("Location: ../../data_pengembalian.php");
}
?>