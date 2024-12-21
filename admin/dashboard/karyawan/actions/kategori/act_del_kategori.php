<?php

    include "../../../../../koneksi.php";
    session_start();

    $id = $_GET['id'];

    $q_kategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori = '$id'");
    $q_produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_kategori = '$id'");

    $d_kategori = mysqli_fetch_array($q_kategori);
    $d_produk = mysqli_fetch_array($q_produk);

    if($d_kategori['id_kategori'] == $d_produk['id_kategori']){
        $_SESSION['warning_hapus_kategori'] = "Terdapat data kategori pada tabel produk, sehingga data tidak dapat dihapus. Silahkan hapus atau ubah data kategori pada produk";
        header("Location: ../../data_kategori.php");
    }

    if($d_kategori['id_kategori'] != $d_produk['id_kategori']){
        $query_delete = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori = '$id'");
        if($query_delete){
            $_SESSION['berhasil_hapus_kategori'] = "Data berhasil Dihapus";
            header("Location: ../../data_kategori.php");
        } else {
            $_SESSION['gagal_hapus_kategori'] = "Data gagal Dihapus";
            header("Location: ../../data_kategori.php");
        }
    }
        

?>