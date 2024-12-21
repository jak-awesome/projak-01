<?php

    include "../../../../../koneksi.php";
    session_start();

    if(isset($_POST['addsubmit'])){
        $nama_kategori = $_POST['nama_kategori'];
        
        $query = mysqli_query($koneksi, "INSERT INTO kategori (nama_kategori) VALUES('$nama_kategori')");

        if($query){
            $_SESSION['berhasil_tambah_kategori'] = "Data berhasil Ditambahkan";
            header("Location: ../../data_kategori.php");
        } else {
            $_SESSION['gagal_tambah_kategori'] = "Data gagal Ditambahkan";
            header("Location: ../../form/add_kategori.php");
        }
            
    }

?>