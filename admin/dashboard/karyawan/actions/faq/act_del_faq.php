<?php

    include "../../../../../koneksi.php";
    session_start();

    $id = $_GET['id'];
    
    $query_delete = mysqli_query($koneksi, "DELETE FROM faq WHERE id_faq = '$id'");

    if($query_delete){
        $_SESSION['berhasil_hapus_kategori'] = "Data berhasil Dihapus";
        header("Location: ../../data_faq.php");
    } else {
        $_SESSION['gagal_hapus_kategori'] = "Data gagal Dihapus";
        header("Location: ../../data_faq.php");
    }

?>