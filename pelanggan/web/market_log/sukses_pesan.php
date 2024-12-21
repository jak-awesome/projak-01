<?php

include "../../../koneksi.php";
session_start();


    $id = $_GET['id'];

    $status = "Selesai";

    // $old_produk = mysqli_query($koneksi, "SELECT * FROM detail_pesanan INNER JOIN produk ON detail_pesanan.id_produk=produk.id_produk WHERE id_pesanan='$id'");
    // foreach($old_produk as $pid => $qty){
    //     $data = mysqli_fetch_array($old_produk);

    //     $add_stok = (int)$data['stok'] + (int)$data['kuantitas'];
    //     $update_stok = mysqli_query($koneksi, "UPDATE produk SET stok='$add_stok'");

    $query = mysqli_query($koneksi, "UPDATE pesanan SET status='$status' WHERE id_pesanan='$id'");

    if($query){
        $_SESSION['berhasil_ubah_status_sukses'] = "Pesanan Selesai";
            header("Location: order_history.php");
        } else {
            $_SESSION['gagal_ubah_status_sukses'] = "Data Gagal Diubah";
            header("Location: order_history.php");
        }

?>