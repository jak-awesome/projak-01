<?php

    include "../../../../../koneksi.php";
    session_start();

    if(isset($_POST['addsubmit'])){
        $id_produk = $_POST['id_produk'];
        $nama_produk = $_POST['nama_produk'];
        $nama_kategori = $_POST['nama_kategori'];
        $harga = $_POST['harga'];
        $diskon = $_POST['diskon'];
        $stok = $_POST['stok'];
        $detail = $_POST['detail'];
        $nama_merek = $_POST['nama_merek'];

        $allowed_extension = array('png','jpg', 'jpeg');
        $file = $_FILES['foto_produk']['name'];
        $dot = explode('.',$file);
        $ekstensi = strtolower(end($dot));
        $ukuran = $_FILES['foto_produk']['size'];
        $file_tmp = $_FILES['foto_produk']['tmp_name'];

        $gambar = md5(uniqid($file,true).time()).'.'.$ekstensi;

        if(in_array($ekstensi, $allowed_extension) == true){
            if($ukuran < 2097152){
                move_uploaded_file($file_tmp, '../../images/produk/'.$gambar);

                if($diskon > "0"){
                    $harga_diskon = ($diskon * 1/100)*$harga;
                    $harga_jual = $harga - $harga_diskon;
                } else {
                    $harga_jual = $harga;
                }

                $query = mysqli_query($koneksi, "INSERT INTO produk (id_produk, nama_produk, foto_produk, harga, diskon, stok_awal, stok_akhir, detail, id_merek, id_kategori, harga_jual) VALUES('$id_produk', '$nama_produk', '$gambar', '$harga', '$diskon', '$stok', '$stok', '$detail', '$nama_merek', '$nama_kategori', '$harga_jual')");

                if($query){
                    $_SESSION['berhasil_tambah_produk'] = "Data berhasil Ditambahkan";
                    header("Location: ../../data_produk.php");
                } else {
                    $_SESSION['gagal_tambah_produk'] = "Data gagal Ditambahkan";
                    header("Location: ../../form/add_produk.php");
                }
            } else {
                $SESSION['gagal_ukuran_produk'] = "Ukuran file terlalu besar";
                header("Location: ../../form/add_produk.php");
            }
        } else {
            $_SESSION['gagal_ekstensi_produk'] = "Ekstensi file tidak didukung, silahkan masukkan file gambar dalam format png, jpg dan jpeg";
	        header("Location: ../../form/add_produk.php");
        }
    }

?>