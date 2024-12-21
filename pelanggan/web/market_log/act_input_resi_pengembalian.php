<?php

include "../../../koneksi.php";
session_start();

	$id_pesanan = $_POST['id_pesanan'];
	$ekspedisi = $_POST['ekspedisi'];
	$resi = $_POST['resi'];
    $rekening = $_POST['rekening'];

	$query = mysqli_query($koneksi, "UPDATE pengembalian SET ekspedisi='$ekspedisi',resi='$resi',status_pengembalian='Dikirim',rekening='$rekening' WHERE id_pesanan='$id_pesanan'");

    if($query){
            header("Location: detail_pengembalian.php?id=$id_pesanan");
        } else {
            header("Location: detail_pengembalian.php?id=$id_pesanan");
        }

?>