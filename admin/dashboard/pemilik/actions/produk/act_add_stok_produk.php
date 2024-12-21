<?php

include "../../../../../koneksi.php";
session_start();

if(isset($_POST['tambahStok'])){
    $id_produk1 = $_POST['id_produk'];
    $jumlah1 = $_POST['jumlah'];
    $tanggal = date('Y-m-d H:i:s');

    $query1 = mysqli_query($koneksi, "INSERT INTO produk_masuk (id_produk, tgl_masuk, jumlah) VALUES('$id_produk1', '$tanggal', '$jumlah1')");

    if($query1){
        $_SESSION['berhasil_tambah_stok'] = "Stok berhasil ditambahkan";
        header("Location: ../../data_produk.php");
    } else {
        $_SESSION['gagal_tambah_stok'] = "Stok gagal ditambahkan";
        header("Location: ../../data_produk.php");
    }
}



?>
