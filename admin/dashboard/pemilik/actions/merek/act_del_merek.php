<?php

    include "../../../../../koneksi.php";
    session_start();

    $id = $_GET['id'];
    
    $query_delete = mysqli_query($koneksi, "DELETE FROM merek WHERE id_merek = '$id'");

        if($query_delete){
            $_SESSION['berhasil_hapus_merek'] = "Data berhasil Dihapus";
            header("Location: ../../data_merek.php");
        } else {
            $_SESSION['gagal_hapus_merek'] = "Data gagal Dihapus";
            header("Location: ../../data_merek.php");
        }

?>