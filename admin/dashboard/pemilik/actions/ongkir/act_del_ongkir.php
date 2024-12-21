<?php

    include "../../../../../koneksi.php";
    session_start();

    $id = $_GET['id'];
    
    $query_delete = mysqli_query($koneksi, "DELETE FROM ongkir WHERE id_ongkir = '$id'");

        if($query_delete){
            $_SESSION['berhasil_hapus_ongkir'] = "Data berhasil Dihapus";
            header("Location: ../../data_ongkir.php");
        } else {
            $_SESSION['gagal_hapus_ongkir'] = "Data gagal Dihapus";
            header("Location: ../../data_ongkir.php");
        }

?>