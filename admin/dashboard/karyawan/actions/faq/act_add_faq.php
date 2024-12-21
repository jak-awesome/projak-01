<?php

    include "../../../../../koneksi.php";
    session_start();

    if(isset($_POST['addsubmit'])){
        $pertanyaan = $_POST['pertanyaan'];
        $jawaban = $_POST['jawaban'];
        
        $query = mysqli_query($koneksi, "INSERT INTO faq (tanya, jawab) VALUES('$pertanyaan', '$jawaban')");

        if($query){
            $_SESSION['berhasil_tambah_kategori'] = "Data berhasil Ditambahkan";
            header("Location: ../../data_faq.php");
        } else {
            $_SESSION['gagal_tambah_kategori'] = "Data gagal Ditambahkan";
            header("Location: ../../form/add_faq.php");
        }
            
    }

?>