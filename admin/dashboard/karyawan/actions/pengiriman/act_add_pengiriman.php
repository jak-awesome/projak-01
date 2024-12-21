<?php

    include "../../../../../koneksi.php";
    session_start();

    if(isset($_POST['submitPengiriman'])){
        $ekspedisi = $_POST['ekspedisi'];
        $resi = $_POST['resi'];
        $id_pesanan = $_POST['id_pesanan'];
        $tgl_pengiriman = date('Y-m-d');
        $waktu_pengiriman = date("H-i-s");
        
        $query = mysqli_query($koneksi, "INSERT INTO pengiriman (id_pesanan, tgl_pengiriman, waktu_pengiriman, ekspedisi, resi) VALUES('$id_pesanan', '$tgl_pengiriman', '$waktu_pengiriman', '$ekspedisi', '$resi')");

        if($query){
            $q_detail = mysqli_query($koneksi, "SELECT * FROM detail_pesanan WHERE id_pesanan='$id_pesanan'");
            $d_detail = mysqli_fetch_array($q_detail);
            $q_produk = mysqli_query($koneksi, "SELECT * FROM produk");
            $d_produk = mysqli_fetch_array($q_produk);

            if($d_detail['id_produk'] == $d_produk['id_produk']){
                
            }


            mysqli_query($koneksi, "UPDATE pesanan SET status='Dikirim' WHERE id_pesanan='$id_pesanan'");

            $_SESSION['berhasil_tambah_pengiriman'] = "Data berhasil Ditambahkan";
            header("Location: ../../data_pengiriman.php");
        } else {
            $_SESSION['gagal_tambah_pengiriman'] = "Data gagal Ditambahkan";
            header("Location: ../../form/detail_pengiriman.php");
        }
            
    }

?>