<?php
    include "../../../../../koneksi.php";
    session_start();

    if(isset($_POST['passwordsubmit'])){

        $_POST['id_akun1'] = $id_akun1;
        $password_lama    = $_POST['password_lama'];
        $password_baru    = $_POST['password_baru'];
        $confirm_password    = $_POST['confirm_password'];

        $query = "SELECT * FROM akun WHERE id_akun='$_SESSION[id_akun]' AND password='$password_lama'";
        $sql = mysqli_query($koneksi, $query);
        $hasil = mysqli_num_rows($sql);
        if (!$hasil >= 1) {
            $_SESSION['password_salah'] = "Password yang dimasukkan tidak sesuai";
            header("Location: ../../form/edit_profile.php");
        }
        //validasi input konfirm password
        else if (($_POST['password_baru']) != ($_POST['confirm_password'])) {
            $_SESSION['password_beda'] = "Password baru yang dimasukkan tidak sesuai dengan Password Konfirmasi";
            header("Location: ../../form/edit_profile.php");  
        }
        else {
        //update data
        $query = "UPDATE akun SET password='$password_baru' WHERE id_akun='$_SESSION[id_akun]'";
        $sql = mysqli_query ($koneksi, $query);
        //setelah berhasil update
        if ($sql) {
            $_SESSION['password_berhasil'] = "Ganti Password Berhasil";
            header("Location: ../../profile.php");    
        } else {
            $_SESSION['password_gagal'] = "Ganti Password Gagal";
            header("Location: ../../form/edit_profile.php");    
        }
     }
}
    



?>