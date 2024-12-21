<?php

include "../../../koneksi.php";
session_start();

	$id_pelanggan = $_POST['id_pelanggan'];
	$nama_penerima = $_POST['nama_penerima'];
	$no_penerima = $_POST['no_penerima'];
	$alamat_1 = $_POST['alamat_1'];
	$alamat_2 = $_POST['alamat_2'];
	$desa_kelurahan = $_POST['desa_kelurahan'];
	$kecamatan = $_POST['kecamatan'];
	$kab_kota = $_POST['kab_kota'];
	$provinsi = $_POST['provinsi'];
	$kode_pos = $_POST['kode_pos'];
	$ket = "0";

	$query = mysqli_query($koneksi, "INSERT INTO alamat_pelanggan (nama_penerima, no_penerima, alamat_1, alamat_2, desa_kelurahan, kecamatan, kab_kota, provinsi, kode_pos, id_pelanggan, ket)
						 VALUES('$nama_penerima', '$no_penerima', '$alamat_1', '$alamat_2', '$desa_kelurahan', '$kecamatan', '$kab_kota', '$provinsi', '$kode_pos', '$id_pelanggan', '$ket')");

    if($query){
            header("Location: profile.php");
        } else {
            header("Location: profile.php");
        }

?>