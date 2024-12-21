<?php

include "../../../koneksi.php";
session_start();


$id_pelanggan = $_POST['id_pelanggan'];
$nama_lengkap = $_POST['nama_lengkap'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$no_hp = $_POST['no_hp'];

if(isset($_POST['ubah_gambar'])){

        $allowed_extension = array('png','jpg', 'jpeg');
        $file = $_FILES['foto']['name'];
        $dot = explode('.',$file);
        $ekstensi = strtolower(end($dot));
        $ukuran = $_FILES['foto']['size'];
        $file_tmp = $_FILES['foto']['tmp_name'];

        $gambar = md5(uniqid($file,true).time()).'.'.$ekstensi;

        if(in_array($ekstensi, $allowed_extension) == true){
            if($ukuran < 2097152){
                move_uploaded_file($file_tmp, 'img/profile/'.$gambar);

                $sql = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'");
                $data = mysqli_fetch_array($sql);
                $target_gambar = "img/profile/$data[foto_pelanggan]";
                unlink($target_gambar);

                $query = mysqli_query($koneksi, "UPDATE pelanggan SET nama_lengkap='$nama_lengkap', foto_pelanggan='$gambar', jenis_kelamin='$jenis_kelamin', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', no_hp='$no_hp' WHERE id_pelanggan='$id_pelanggan'");

                if($query){
                    $_SESSION['berhasil_edit_profil'] = "Data berhasil Diubah";
                    header("Location: profile.php");
                } else {
                    $_SESSION['gagal_edit_profil'] = "Data gagal Diubah";
                    header("Location: profile.php");
                }
            } else {
                $SESSION['gagal_ukuran_profil'] = "Ukuran file terlalu besar";
                header("Location: profile.php");
            }
        } else {
            $_SESSION['gagal_ekstensi_profil'] = "Ekstensi file tidak didukung, silahkan masukkan file gambar dalam format png, jpg dan jpeg";
	        header("Location: profile.php");
        }

}else {
    
    $query = mysqli_query($koneksi, "UPDATE pelanggan SET nama_lengkap='$nama_lengkap', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', no_hp='$no_hp' WHERE id_pelanggan='$id_pelanggan'");

    if($query){
        $_SESSION['berhasil_edit_profil'] = "Data berhasil Diubah";
        header("Location: profile.php");
    } else {
        $_SESSION['gagal_edit_profil'] = "Data gagal Diubah";
        header("Location: profile.php");
    }

}



?>
