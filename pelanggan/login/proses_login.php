<?php
session_start();

include "../../koneksi.php";

if (isset($_POST['masuk'])) {
	

	$username = $_POST['username'];
    $password = $_POST['password'];
 
    $sql = "SELECT * FROM akun_pelanggan WHERE username ='$username'";
    $result = mysqli_query($koneksi, $sql);
    
    if (mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result);
		if(password_verify($password, $row['password'])){
			$_SESSION['login'] = true;
			$_SESSION['id_akun_pelanggan'] =  $row['id_akun_pelanggan'];
			$_SESSION['username'] =  $row['username'];
			$_SESSION['sukses_login']  = 'Berhasil login ke dalam sistem.';

			header("Location: ../web/market_log/index.php");
		}else{
			$_SESSION['password_salah'] = 'Password anda salah.';
			header("Location: login.php");
		}
	
	}else{
		$_SESSION['gagal_login'] = 'Username dan password anda tidak ditemukan.';
		header("Location: login.php");
	}
}

?>