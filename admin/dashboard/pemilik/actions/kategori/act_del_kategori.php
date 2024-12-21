<?php

    include "../../../../../koneksi.php";
    session_start();

    $id = $_GET['id'];
    
    $query_delete = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori = '$id'");

        if($query_delete){
            $_SESSION['berhasil_hapus_kategori'] = "Data berhasil Dihapus";
            header("Location: ../../data_kategori.php");
        } else {
            $_SESSION['gagal_hapus_kategori'] = "Data gagal Dihapus";
            header("Location: ../../data_kategori.php");
        }

?>