<?php

include "../../../../../koneksi.php";
session_start();


$id_slider = $_POST['id_slider'];
$nama = $_POST['nama'];
$keterangan = $_POST['keterangan'];
$status = $_POST['status'];

if(isset($_POST['ubah_gambar'])){

        $allowed_extension = array('png','jpg', 'jpeg');
        $file = $_FILES['gambar_slider']['name'];
        $dot = explode('.',$file);
        $ekstensi = strtolower(end($dot));
        $ukuran = $_FILES['gambar_slider']['size'];
        $file_tmp = $_FILES['gambar_slider']['tmp_name'];

        $gambar = md5(uniqid($file,true).time()).'.'.$ekstensi;

        if(in_array($ekstensi, $allowed_extension) == true){
            if($ukuran < 2097152){
                move_uploaded_file($file_tmp, '../../images/slider/'.$gambar);

                $sql = mysqli_query($koneksi, "SELECT * FROM slider WHERE id_slider = '$id_slider'");
                $data = mysqli_fetch_array($sql);
                $target_gambar = "../../images/slider/$data[gambar_slider]";
                unlink($target_gambar);

                $query = mysqli_query($koneksi, "UPDATE slider SET judul='$nama', gambar_slider='$gambar', keterangan='$keterangan', status='$status' WHERE id_slider='$id_slider'");

                if($query){
                    $_SESSION['berhasil_edit_slider'] = "Data berhasil Diubah";
                    header("Location: ../../data_slider.php");
                } else {
                    $_SESSION['gagal_edit_slider'] = "Data gagal Diubah";
                    header("Location: ../../form/edit_slider.php");
                }
            } else {
                $SESSION['gagal_ukuran_slider'] = "Ukuran file terlalu besar";
                header("Location: ../../form/edit_slider.php");
            }
        } else {
            $_SESSION['gagal_ekstensi_slider'] = "Ekstensi file tidak didukung, silahkan masukkan file gambar dalam format png, jpg dan jpeg";
            header("Location: ../../form/edit_slider.php");
        }

}else {
    
    $query = mysqli_query($koneksi, "UPDATE slider SET judul='$nama', keterangan='$keterangan', status='$status' WHERE id_slider='$id_slider'");

    if($query){
        $_SESSION['berhasil_edit_slider'] = "Data berhasil Diubah";
        header("Location: ../../data_slider.php");
    } else {
        $_SESSION['gagal_edit_slider'] = "Data gagal Diubah";
        header("Location: ../../form/edit_slider.php");
    }

}



?>
