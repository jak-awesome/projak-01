<?php

include "../../../../../koneksi.php";
session_start();


$id_akun = $_POST['id_akun'];
$nama_lengkap = $_POST['nama_lengkap'];
$username = $_POST['username'];
$email = $_POST['email'];
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
                move_uploaded_file($file_tmp, '../../img/profile/'.$gambar);

                $sql = mysqli_query($koneksi, "SELECT * FROM akun WHERE id_akun = '$id_akun'");
                $data = mysqli_fetch_array($sql);
                $target_gambar = "../../img/profile/$data[foto]";
                unlink($target_gambar);

                $query = mysqli_query($koneksi, "UPDATE akun SET nama_lengkap='$nama_lengkap', foto='$gambar', username='$username', email='$email', no_hp='$no_hp' WHERE id_akun='$id_akun'");

                if($query){
                    $_SESSION['berhasil_edit_profil'] = "Data berhasil Diubah";
                    header("Location: ../../profile.php");
                } else {
                    $_SESSION['gagal_edit_profil'] = "Data gagal Diubah";
                    header("Location: ../../form/edit_profile.php");
                }
            } else {
                $SESSION['gagal_ukuran_profil'] = "Ukuran file terlalu besar";
                header("Location: ../../form/edit_profile.php");
            }
        } else {
            $_SESSION['gagal_ekstensi_profil'] = "Ekstensi file tidak didukung, silahkan masukkan file gambar dalam format png, jpg dan jpeg";
	        header("Location: ../../form/edit_profile.php");
        }

}else {
    
    $query = mysqli_query($koneksi, "UPDATE akun SET nama_lengkap='$nama_lengkap',  username='$username', email='$email', no_hp='$no_hp' WHERE id_akun='$id_akun'");

    if($query){
        $_SESSION['berhasil_edit_profil'] = "Data berhasil Diubah";
        header("Location: ../../profile.php");
    } else {
        $_SESSION['gagal_edit_profil'] = "Data gagal Diubah";
        header("Location: ../../form/edit_profile.php");
    }

}



?>
