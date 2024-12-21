<?php

include "../../../koneksi.php";
session_start();


    $id_pesanan = $_POST['id_pesanan'];
    $rekening = $_POST['rekening'];
    $status = "Dibatalkan";

    $sql = mysqli_query($koneksi, "SELECT * FROM pesanan WHERE id_pesanan='$id_pesanan'");
    $data = mysqli_fetch_array($sql);

    // $old_produk = mysqli_query($koneksi, "SELECT * FROM detail_pesanan INNER JOIN produk ON detail_pesanan.id_produk=produk.id_produk WHERE id_pesanan='$id'");
    // foreach($old_produk as $pid => $qty){
    //     $data = mysqli_fetch_array($old_produk);

    //     $add_stok = (int)$data['stok'] + (int)$data['kuantitas'];
    //     $update_stok = mysqli_query($koneksi, "UPDATE produk SET stok='$add_stok'");

    mysqli_query($koneksi, "INSERT INTO pembatalan (id_pesanan, id_pelanggan, rekening) VALUES('$id_pesanan', '$data[id_pelanggan]', '$rekening')");

    $query = mysqli_query($koneksi, "UPDATE pesanan SET status='$status' WHERE id_pesanan='$id_pesanan'");

    if($query){
        $_SESSION['berhasil_ubah_status'] = "Berhasil Dibatalkan";
            header("Location: order_history.php");
        } else {
            $_SESSION['gagal_ubah_status'] = "Data Gagal Dibatalkan";
            header("Location: order_history.php");
        }

?>