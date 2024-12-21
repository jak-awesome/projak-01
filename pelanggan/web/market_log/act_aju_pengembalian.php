<?php
include "../../../koneksi.php";
session_start();

if(isset($_POST['proses'])){
        $id_pesanan = $_POST['id_pesanan'];
        $alasan = $_POST['alasan'];

        $allowed_extension = array('png','jpg', 'jpeg');
        $file = $_FILES['bukti']['name'];
        $dot = explode('.',$file);
        $ekstensi = strtolower(end($dot));
        $ukuran = $_FILES['bukti']['size'];
        $file_tmp = $_FILES['bukti']['tmp_name'];

        $gambar = md5(uniqid($file,true).time()).'.'.$ekstensi;

        if(in_array($ekstensi, $allowed_extension) == true){
            if($ukuran < 2097152){
                move_uploaded_file($file_tmp, 'img/pengembalian/'.$gambar);

                $sql = mysqli_query($koneksi, "SELECT * FROM pesanan WHERE id_pesanan='$id_pesanan'");
                $data = mysqli_fetch_array($sql);

                $query = mysqli_query($koneksi, "INSERT INTO pengembalian (id_pesanan, id_pelanggan, bukti, alasan, status_pengembalian) VALUES('$id_pesanan', '$data[id_pelanggan]', '$gambar', '$alasan', 'Tahap Pengajuan')");

                if($query){
                    mysqli_query($koneksi, "UPDATE pesanan SET status='Pengembalian' WHERE id_pesanan='$id_pesanan'");
                    header("Location: order_history.php");
                } else {
                    $_SESSION['gagal_order'] = "Pemesanan gagal";
                    header("Location: order_history.php");
                }
            } else {
                $_SESSION['gagal_ukuran_produk'] = "Ukuran file terlalu besar";
                header("Location: order_history.php");
            }
        } else {
            $_SESSION['gagal_ekstensi_produk'] = "Ekstensi file tidak didukung, silahkan masukkan file gambar dalam format png, jpg dan jpeg";
	        header("Location: order_history.php");
        }
}

?>