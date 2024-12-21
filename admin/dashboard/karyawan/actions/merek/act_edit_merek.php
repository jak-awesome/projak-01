<?php

include "../../../../../koneksi.php";
session_start();

if(isset($_POST['editsubmit'])){
    $id_merek = $_POST['id_merek'];
    $nama_merek = $_POST['nama_merek'];

    $query = mysqli_query($koneksi, "UPDATE merek SET nama_merek='$nama_merek' WHERE id_merek='$id_merek'");

    if($query){
        $_SESSION['berhasil_edit_merek'] = "Data berhasil Diubah";
            header("Location: ../../data_merek.php");
        } else {
            $_SESSION['gagal_edit_merek'] = "Data gagal Diubah";
            header("Location: ../../form/edit_merek.php");
        }
    }

?>
