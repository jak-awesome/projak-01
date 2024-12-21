<?php
include "../../../../../koneksi.php";
session_start();

if(isset($_POST['ubahStatus'])){
    $status_pemesanan = $_POST['status_pemesanan'];
    $id_pesanan = $_POST['id_pesanan'];

    $query = mysqli_query($koneksi, "UPDATE pesanan SET status='$status_pemesanan' WHERE id_pesanan='$id_pesanan'");

    header("Location: ../../data_pemesanan_masuk.php");
}
?>