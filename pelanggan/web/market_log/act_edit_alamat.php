<?php

include "../../../koneksi.php";
session_start();

	$id_alamat_pelanggan = $_POST['id_alamat_pelanggan'];
	$nama_penerima = $_POST['nama_penerima'];
	$no_penerima = $_POST['no_penerima'];
	$alamat_1 = $_POST['alamat_1'];
	$alamat_2 = $_POST['alamat_2'];
	$desa_kelurahan = $_POST['desa_kelurahan'];
	$kecamatan = $_POST['kecamatan'];
	$kab_kota = $_POST['kab_kota'];
	$provinsi = $_POST['provinsi'];
	$kode_pos = $_POST['kode_pos'];

	$query = mysqli_query($koneksi, "UPDATE alamat_pelanggan SET nama_penerima='$nama_penerima', no_penerima='$no_penerima', alamat_1='$alamat_1', alamat_2='$alamat_2', desa_kelurahan='$desa_kelurahan', kecamatan='$kecamatan', kab_kota='$kab_kota', provinsi='$provinsi', kode_pos='$kode_pos' WHERE id_alamat_pelanggan='$id_alamat_pelanggan'");

    if($query){
        $_SESSION['berhasil_edit_alamat'] = "Data berhasil Diubah";
            header("Location: profile.php");
        } else {
            $_SESSION['gagal_edit_alamat'] = "Data gagal Diubah";
            header("Location: profile.php");
        }

?>