<?php
include "../../../koneksi.php";
session_start();

if(isset($_POST['proses'])){
        $id_pelanggan = $_POST['id_pelanggan'];
        $id_akun_pelanggan = $_POST['id_akun_pelanggan'];
        $id_alamat_pelanggan = $_POST['id_alamat_pelanggan'];
        $total_biaya = $_POST['total_biaya'];
        $tanggal_pesan = date('Y-m-d H:i:s');


        $query = mysqli_query($koneksi, "INSERT INTO pesanan (tanggal_pesan, id_pelanggan, status, read_pel, read_adm, total, id_alamat_pelanggan) VALUES('$tanggal_pesan', '$id_pelanggan', 'Belum Dibayar', '0', '0', '$total_biaya', '$id_alamat_pelanggan')");

        if($query){
            $last = mysqli_fetch_array(mysqli_query($koneksi, "SELECT *FROM pesanan order by id_pesanan DESC limit 1"));
            
            $cart = unserialize($_SESSION['cart']);
            if($cart == ''){
                $cart = [];
            }
            
            foreach($cart as $pid => $qty){
                $product = mysqli_fetch_array(mysqli_query($koneksi, "select * from produk WHERE id_produk='$pid'"));
                
                if(!empty($product)){
                    
                    $ins = mysqli_query($koneksi, "insert into detail_pesanan Values(NULL,'$product[id_produk]','$qty','$last[id_pesanan]')");
                    
                    $min_stok = $product['stok_akhir'] - $qty;
                    
                    $add_terjual = $product['terjual'] + $qty;
                    
                    $update_stok = mysqli_query($koneksi, "UPDATE produk SET stok_akhir='$min_stok', terjual='$add_terjual' WHERE id_produk='$pid'");
                }
            }
            
            unset($_SESSION['cart']);
            header("Location: success_order.php?id=$last[id_pesanan]");
        
        } else {
            $_SESSION['gagal_order'] = "Pemesanan gagal";
            header("Location: checkout.php");
        }
   
}

?>