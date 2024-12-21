<?php

    include "../../../../../koneksi.php";
    session_start();

    $id = $_GET['id'];
    
    $query_delete = mysqli_query($koneksi, "DELETE FROM produk_masuk WHERE id_masuk = '$id'");

        if($query_delete){
            $_SESSION['berhasil_hapus_stok_produk'] = "Data berhasil Dihapus";
            header("Location: ../../stok_masuk.php");
        } else {
            $_SESSION['gagal_hapus_stok_produk'] = "Data gagal Dihapus";
            header("Location: ../../stok_masuk.php");
        }

?>