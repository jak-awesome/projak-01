<?php

    include "../../../../../koneksi.php";
    session_start();

    $id = $_GET['id'];
    
    $query_delete = mysqli_query($koneksi, "DELETE FROM review WHERE id_review = '$id'");

        if($query_delete){
            $_SESSION['berhasil_hapus_pesan'] = "Data berhasil Dihapus";
            header("Location: ../../data_review.php");
        } else {
            $_SESSION['gagal_hapus_pesan'] = "Data gagal Dihapus";
            header("Location: ../../data_review.php");
        }

?>