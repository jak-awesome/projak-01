<?php
include "../../../koneksi.php";
session_start();

if(isset($_POST['editInfoAkun'])){
    $username = $_POST['username'];
    $email = $_POST['email'];

    $query = mysqli_query($koneksi, "UPDATE akun_pelanggan SET username='$username', email='$email' WHERE id_akun_pelanggan='$_SESSION[id_akun_pelanggan]'");

    if($query){
        $_SESSION['berhasil_edit_info_akun'] = "Data berhasil Diubah";
            header("Location: profile.php");
        } else {
            $_SESSION['gagal_edit_info_akun'] = "Data gagal Diubah";
            header("Location: profile.php");
        }
}

if(isset($_POST['ganti_password'])){
    $password_lama = $_POST['password_lama'];
    $password_baru = $_POST['password_baru'];
    $konf_password_baru = $_POST['konf_password_baru'];

    $sql = "SELECT * FROM akun_pelanggan WHERE id_akun_pelanggan ='$_SESSION[id_akun_pelanggan]'";
    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result);
		if(password_verify($password_lama, $row['password'])){
			if ($password_baru != $konf_password_baru) {
            $_SESSION['password_beda'] = "Password baru yang dimasukkan tidak sesuai dengan Password Konfirmasi";
            header("Location: profile.php");  
        } else {
        	//update data
        	$password = password_hash($password_baru,PASSWORD_DEFAULT);
        	$query = "UPDATE akun_pelanggan SET password='$password' WHERE id_akun_pelanggan='$_SESSION[id_akun_pelanggan]'";
        	$sql = mysqli_query ($koneksi, $query);
        	//setelah berhasil update
        		if ($sql) {
            		$_SESSION['password_berhasil'] = "Ganti Password Berhasil";
            		header("Location: profile.php");    
        		} else {
            		$_SESSION['password_gagal'] = "Ganti Password Gagal";
            		header("Location: profile.php");    
        			}
     			}
		}else{
			$_SESSION['password_salah'] = 'Password lama anda salah.';
			header("Location: profile.php");
		}
	
	}else{
		$_SESSION['password_tidak_ada'] = 'Data tidak ditemukan.';
		header("Location: profile.php");
	}
}
?>