<?php

include "../../../../../koneksi.php";
session_start();

if(isset($_POST['ubah_gambar'])){
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

                $sql = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
                $data = mysqli_fetch_array($sql);
                $target_gambar = "../../images/produk/$data[foto_produk]";
                unlink($target_gambar);

                $query = mysqli_query($koneksi, "UPDATE produk SET nama_produk='$nama_produk', foto_produk='$gambar', harga='$harga', diskon='$diskon', stok='$stok', detail='$detail', id_kategori='$nama_kategori', id_merek='$nama_merek', harga_jual='$harga_jual' WHERE id_produk='$id_produk'");

                if($query){
                    $_SESSION['berhasil_edit_produk'] = "Data berhasil Diubah";
                    header("Location: ../../data_produk.php");
                } else {
                    $_SESSION['gagal_edit_produk'] = "Data gagal Diubah";
                    header("Location: ../../form/edit_produk.php");
                }
            } else {
                $SESSION['gagal_ukuran_produk'] = "Ukuran file terlalu besar";
                header("Location: ../../form/edit_produk.php");
            }
        } else {
            $_SESSION['gagal_ekstensi_produk'] = "Ekstensi file tidak didukung, silahkan masukkan file gambar dalam format png, jpg dan jpeg";
	        header("Location: ../../form/edit_produk.php");
        }

}else {
    $id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $nama_kategori = $_POST['nama_kategori'];
    $harga = $_POST['harga'];
    $diskon = $_POST['diskon'];
    $stok = $_POST['stok'];
    $detail = $_POST['detail'];
    $nama_merek = $_POST['nama_merek'];

    if($diskon > "0"){
        $harga_diskon = ($diskon * 1/100)*$harga;
        $harga_jual = $harga - $harga_diskon;
    } else {
        $harga_jual = $harga;
    }

    $query = mysqli_query($koneksi, "UPDATE produk SET nama_produk='$nama_produk', harga='$harga', diskon='$diskon', stok='$stok', detail='$detail', id_kategori='$nama_kategori', id_merek='$nama_merek', harga_jual='$harga_jual' WHERE id_produk='$id_produk'");

    if($query){
        $_SESSION['berhasil_edit_produk'] = "Data berhasil Diubah";
        header("Location: ../../data_produk.php");
    } else {
        $_SESSION['gagal_edit_produk'] = "Data gagal Diubah";
        header("Location: ../../form/edit_produk.php");
    }

}


?>
