<?php

    include "../../../../../koneksi.php";
    session_start();

    if(isset($_POST['addsubmit'])){
        $kota = $_POST['kota'];
        $biaya = $_POST['biaya'];
        
        $query = mysqli_query($koneksi, "INSERT INTO ongkir (kota, biaya) VALUES('$kota', '$biaya')");

        if($query){
            $_SESSION['berhasil_tambah_ongkir'] = "Data berhasil Ditambahkan";
            header("Location: ../../data_ongkir.php");
        } else {
            $_SESSION['gagal_tambah_ongkir'] = "Data gagal Ditambahkan";
            header("Location: ../../form/add_ongkir.php");
        }
            
    }

?>