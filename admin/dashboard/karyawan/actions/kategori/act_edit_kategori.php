<?php

include "../../../../../koneksi.php";
session_start();

if(isset($_POST['editsubmit'])){
    $id_kategori = $_POST['id_kategori'];
    $nama_kategori = $_POST['nama_kategori'];

    $query = mysqli_query($koneksi, "UPDATE kategori SET nama_kategori='$nama_kategori' WHERE id_kategori='$id_kategori'");

    if($query){
        $_SESSION['berhasil_edit_kategori'] = "Data berhasil Diubah";
            header("Location: ../../data_kategori.php");
        } else {
            $_SESSION['gagal_edit_kategori'] = "Data gagal Diubah";
            header("Location: ../../form/edit_kategori.php");
        }
    }

?>
