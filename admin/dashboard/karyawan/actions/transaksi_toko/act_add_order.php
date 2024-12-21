<?php
include "../../../../../koneksi.php";
session_start();

if(isset($_POST['print'])){
        $nominal_bayar = $_POST['nominal_bayar'];
        $total = $_POST['total'];
        $kembali = $_POST['kembali'];
        $kasir = $_POST['kasir'];
        $tanggal_order = date('Y-m-d H:i:s');


        $query = mysqli_query($koneksi, "INSERT INTO transaksi_toko (id_akun, total, bayar, kembali, tanggal_order) VALUES('$kasir', '$total', '$nominal_bayar', '$kembali', '$tanggal_order')");

        if($query){
            $last = mysqli_fetch_array(mysqli_query($koneksi, "SELECT *FROM transaksi_toko order by id_transaksi DESC limit 1"));
            
            $cart = unserialize($_SESSION['cart']);
            if($cart == ''){
                $cart = [];
            }
            
            foreach($cart as $pid => $qty){
                $product = mysqli_fetch_array(mysqli_query($koneksi, "select * from produk WHERE id_produk='$pid'"));
                
                if(!empty($product)){
                    
                    $ins = mysqli_query($koneksi, "insert into detail_transaksi_toko Values(NULL,'$product[id_produk]','$qty','$last[id_transaksi]')");
                    
                    $min_stok = $product['stok'] - $qty;
                    
                    $add_terjual = $product['terjual'] + $qty;
                    
                    $update_stok = mysqli_query($koneksi, "UPDATE produk SET stok='$min_stok', terjual='$add_terjual' WHERE id_produk='$pid'");
                }
            }
            
            unset($_SESSION['cart']);
            header("Location: print_nota.php?id_transaksi=$last[id_transaksi]");
        
        } else {
            $_SESSION['gagal_order'] = "Pemesanan gagal";
            header("Location: ../../pos_kasir.php");
        }
   
}

?>