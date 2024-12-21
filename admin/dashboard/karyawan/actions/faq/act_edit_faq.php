<?php

include "../../../../../koneksi.php";
session_start();

if(isset($_POST['editsubmit'])){
    $id_faq = $_POST['id_faq'];
    $pertanyaan = $_POST['pertanyaan'];
    $jawaban = $_POST['jawaban'];

    $query = mysqli_query($koneksi, "UPDATE faq SET tanya='$pertanyaan', jawab='$jawaban' WHERE id_faq='$id_faq'");

    if($query){
        $_SESSION['berhasil_edit_kategori'] = "Data berhasil Diubah";
            header("Location: ../../data_faq.php");
        } else {
            $_SESSION['gagal_edit_kategori'] = "Data gagal Diubah";
            header("Location: ../../form/edit_faq.php");
        }
    }

?>
