<?php

include "../../../../../koneksi.php";
session_start();

if(isset($_POST['editsubmit'])){
    $id_ongkir = $_POST['id_ongkir'];
    $kota = $_POST['kota'];
    $biaya = $_POST['biaya'];

    $query = mysqli_query($koneksi, "UPDATE ongkir SET kota='$kota', biaya='$biaya' WHERE id_ongkir='$id_ongkir'");

    if($query){
        $_SESSION['berhasil_edit_ongkir'] = "Data berhasil Diubah";
            header("Location: ../../data_ongkir.php");
        } else {
            $_SESSION['gagal_edit_ongkir'] = "Data gagal Diubah";
            header("Location: ../../form/edit_ongkir.php");
        }
    }

?>
