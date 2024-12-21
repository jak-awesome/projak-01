<?php

    include "../../../../../koneksi.php";
    session_start();

    if(isset($_POST['addsubmit'])){
        $nama = $_POST['nama'];
        $keterangan = $_POST['keterangan'];
        $status = $_POST['status'];

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

                $query = mysqli_query($koneksi, "INSERT INTO slider (judul, gambar_slider, keterangan, status) VALUES('$nama', '$gambar', '$keterangan', '$status')");

                if($query){
                    $_SESSION['berhasil_tambah_slider'] = "Data berhasil Ditambahkan";
                    header("Location: ../../data_slider.php");
                } else {
                    $_SESSION['gagal_tambah_slider'] = "Data gagal Ditambahkan";
                    header("Location: ../../form/add_slider.php");
                }
            } else {
                $SESSION['gagal_ukuran_slider'] = "Ukuran file terlalu besar";
                header("Location: ../../form/add_slider.php");
            }
        } else {
            $_SESSION['gagal_ekstensi_slider'] = "Ekstensi file tidak didukung, silahkan masukkan file gambar dalam format png, jpg dan jpeg";
	        header("Location: ../../form/add_slider.php");
        }
    }

?>