<?php

    include "../../../../../koneksi.php";
    session_start();

    $id = $_GET['id'];

    $query_gambar = mysqli_query($koneksi, "SELECT * FROM slider WHERE id_slider = '$id'");
    $ambil_gambar = mysqli_fetch_array($query_gambar);
    $target_gambar = "../../images/slider/$ambil_gambar[gambar_slider]";
    
    $query_delete = mysqli_query($koneksi, "DELETE FROM slider WHERE id_slider = '$id'");

        if($query_delete){
            unlink($target_gambar);
            $_SESSION['berhasil_hapus_slider'] = "Data berhasil Dihapus";
            header("Location: ../../data_slider.php");
        } else {
            $_SESSION['gagal_hapus_slider'] = "Data gagal Dihapus";
            header("Location: ../../data_slider.php");
        }

?>