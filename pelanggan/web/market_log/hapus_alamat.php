<?php

    include "../../../koneksi.php";
    session_start();

    $id = $_GET['id'];
    
    $query_delete = mysqli_query($koneksi, "DELETE FROM alamat_pelanggan WHERE id_alamat_pelanggan = '$id'");

        if($query_delete){
            $_SESSION['berhasil_edit_alamat'] = "Data berhasil Diubah";
			header("Location: profile.php");
        } else {
            $_SESSION['gagal_edit_alamat'] = "Data gagal Diubah";
		    header("Location: profile.php");
        }

?>