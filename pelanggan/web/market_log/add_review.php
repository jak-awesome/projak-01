<?php

include "../../../koneksi.php";
session_start();


    $id_pesanan = $_POST['id_pesanan'];
    $skor = $_POST['skor'];
    $review = $_POST['review'];

    $status = "Selesai";

    $query_pelanggan = mysqli_query($koneksi, "SELECT * FROM pesanan WHERE id_pesanan=$id_pesanan");
    while($data_pelanggan = mysqli_fetch_array($query_pelanggan)){
        $query = mysqli_query($koneksi, "SELECT * FROM detail_pesanan WHERE id_pesanan=$id_pesanan");
        $count = mysqli_num_rows($query);
        while($data_produk = mysqli_fetch_array($query)){
            for($i=0; $i < $count; $i++){
                $sql = mysqli_query($koneksi, "INSERT INTO review (id_produk, id_pelanggan, nilai, testimoni) VALUES ('$data_produk[id_produk]', '$data_pelanggan[id_pelanggan][$i]', '$skor[$i]', '$review[$i]')");

                $v_sum = mysqli_query($koneksi, "SELECT SUM(nilai) AS total FROM review WHERE id_produk='$data_produk[id_produk]'");
                $jum = mysqli_query($koneksi, "SELECT * FROM review WHERE id_produk='$data_produk[id_produk]'");

                $sum = mysqli_fetch_array($v_sum);
                $jumlah_data = mysqli_num_rows($jum);

                $rate = (int)$sum['total']/(int)$jumlah_data;

                $sql_1 = mysqli_query($koneksi, "UPDATE produk SET rating='$rate' WHERE id_produk='$data_produk[id_produk]'");

                $sql_3 = mysqli_query($koneksi, "SELECT SUM(kuantitas) AS terjual FROM detail_pesanan WHERE id_produk='$data_produk[id_produk]'");
                $sum_terjual = mysqli_fetch_array($sql_3);

                $terjual = $sum_terjual['terjual'];
                $sql_4 = mysqli_query($koneksi, "UPDATE produk SET terjual='$terjual' WHERE id_produk='$data_produk[id_produk]'");

            }
            if($sql){
                $sql_2 = mysqli_query($koneksi, "UPDATE pesanan SET status='$status' WHERE id_pesanan='$id_pesanan'");
                $_SESSION['berhasil_review'] = "Berhasil Ditambahkan";
                    header("Location: order_history.php");
                } else {
                    $_SESSION['gagal_review'] = "Gagal Ditamnbahkan";
                    header("Location: order_history.php");
                }
        }
    }
    

?>