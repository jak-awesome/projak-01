<?php

    include "../../../../../koneksi.php";
    session_start();

    if(isset($_POST['addsubmit'])){
        $nama_merek = $_POST['nama_merek'];
        
        $query = mysqli_query($koneksi, "INSERT INTO merek (nama_merek) VALUES('$nama_merek')");

        if($query){
            $_SESSION['berhasil_tambah_merek'] = "Data berhasil Ditambahkan";
            header("Location: ../../data_merek.php");
        } else {
            $_SESSION['gagal_tambah_merek'] = "Data gagal Ditambahkan";
            header("Location: ../../form/add_merek.php");
        }
            
    }

?>