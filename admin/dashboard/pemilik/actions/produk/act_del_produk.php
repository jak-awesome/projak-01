<?php

    include "../../../../../koneksi.php";
    session_start();

    $id = $_GET['id'];

    $query_gambar = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk = '$id'");
    $ambil_gambar = mysqli_fetch_array($query_gambar);
    $target_gambar = "../../images/produk/$ambil_gambar[foto_produk]";
    
    $query_delete = mysqli_query($koneksi, "DELETE FROM produk WHERE id_produk = '$id'");

        if($query_delete){
            unlink($target_gambar);
            $_SESSION['berhasil_hapus_produk'] = "Data berhasil Dihapus";
            header("Location: ../../data_produk.php");
        } else {
            $_SESSION['gagal_hapus_produk'] = "Data gagal Dihapus";
            header("Location: ../../data_produk.php");
        }

?>