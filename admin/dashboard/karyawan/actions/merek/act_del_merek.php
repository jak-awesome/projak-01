<?php

    include "../../../../../koneksi.php";
    session_start();

    $id = $_GET['id'];

    $q_merek = mysqli_query($koneksi, "SELECT * FROM merek WHERE id_merek = '$id'");
    $q_produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_merek = '$id'");

    $d_merek = mysqli_fetch_array($q_merek);
    $d_produk = mysqli_fetch_array($q_produk);

    if($d_merek['id_merek'] == $d_produk['id_merek']){
        $_SESSION['warning_hapus_merek'] = "Terdapat data merek pada tabel produk, sehingga data tidak dapat dihapus. Silahkan hapus atau ubah data merek pada produk";
        header("Location: ../../data_merek.php");
    }

    if($d_merek['id_merek'] != $d_produk['id_merek']){
        $query_delete = mysqli_query($koneksi, "DELETE FROM merek WHERE id_merek = '$id'");
        if($query_delete){
            $_SESSION['berhasil_hapus_merek'] = "Data berhasil Dihapus";
            header("Location: ../../data_merek.php");
        } else {
            $_SESSION['gagal_hapus_merek'] = "Data gagal Dihapus";
            header("Location: ../../data_merek.php");
        }
    }
?>