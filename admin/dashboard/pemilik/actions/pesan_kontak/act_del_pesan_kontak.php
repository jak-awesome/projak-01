<?php

    include "../../../../../koneksi.php";
    session_start();

    $id = $_GET['id'];
    
    $query_delete = mysqli_query($koneksi, "DELETE FROM pesan_kontak WHERE id_pesan_kontak = '$id'");

        if($query_delete){
            $_SESSION['berhasil_hapus_pesan'] = "Data berhasil Dihapus";
            header("Location: ../../data_pesan_kontak.php");
        } else {
            $_SESSION['gagal_hapus_pesan'] = "Data gagal Dihapus";
            header("Location: ../../data_pesan_kontak.php");
        }

?>