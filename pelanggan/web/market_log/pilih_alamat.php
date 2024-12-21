<?php

include "../../../koneksi.php";
session_start();

	$id_alamat_pelanggan = $_POST['id_alamat_pelanggan'];
	$id_pelanggan = $_POST['id_pelanggan'];
	$alamat = $_POST['alamat'];
	$page = $_POST['page'];
	
	$query = mysqli_query($koneksi, "UPDATE alamat_pelanggan SET ket='1' WHERE id_pelanggan='$id_pelanggan' AND id_alamat_pelanggan='$id_alamat_pelanggan'");

	if($query){
		$query_2 = mysqli_query($koneksi, "UPDATE alamat_pelanggan SET ket='0' WHERE id_pelanggan='$id_pelanggan' AND NOT id_alamat_pelanggan='$id_alamat_pelanggan'");
		if($query_2){
			$_SESSION['berhasil_edit_alamat'] = "Data berhasil Diubah";
			header("Location: $page");
		}
	} else {
		$_SESSION['gagal_edit_alamat'] = "Data gagal Diubah";
		header("Location: $page");
	}

?>