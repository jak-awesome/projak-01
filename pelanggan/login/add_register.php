<?php

    session_start();
    include "../../koneksi.php";
    //dapatkan data user dari form register
    $user = [
    	'email' => $_POST['email'],
    	'username' => $_POST['username'],
    	'password' => $_POST['password'],
    	'password_confirmation' => $_POST['password_confirmation'],
    ];
    //validasi jika password & password_confirmation sama
    if($user['password'] != $user['password_confirmation']){
    	$_SESSION['error_confirmation_password'] = 'Password yang anda masukkan tidak sama dengan password confirmation.';
    	$_SESSION['email'] = $_POST['email'];
    	$_SESSION['username'] = $_POST['username'];
    	header("Location: register.php");
    	return;
    }
    //check apakah user dengan username tersebut ada di table users
    $query = "select * from akun_pelanggan where username = ? limit 1";
    $stmt = $koneksi->stmt_init();
    $stmt->prepare($query);
    $stmt->bind_param('s', $user['username']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array(MYSQLI_ASSOC);
    //jika username sudah ada, maka return kembali ke halaman register.
    if($row != null){
    	$_SESSION['error_username'] = 'Username: '.$user['username'].' yang anda masukkan sudah ada di database.';
    	$_SESSION['email'] = $_POST['email'];
    	$_SESSION['password'] = $_POST['password'];
    	$_SESSION['password_confirmation'] = $_POST['password_confirmation'];
    	header("Location: register.php");
    	return;
    }else{
    	//hash password
    	$password = password_hash($user['password'],PASSWORD_DEFAULT);
    	//username unik. simpan di database.
    	$query = "insert into akun_pelanggan (email, username, password) values  (?,?,?)";
    	$stmt = $koneksi->stmt_init();
    	$stmt->prepare($query);
    	$stmt->bind_param('sss', $user['email'],$user['username'],$password);
    	$stmt->execute();
    	$result = $stmt->get_result();		

		$last_1 = mysqli_fetch_array(mysqli_query($koneksi, "SELECT *FROM akun_pelanggan order by id_akun_pelanggan DESC limit 1"));

		mysqli_query($koneksi, "INSERT INTO pelanggan (id_akun_pelanggan) VALUES ('$last_1[id_akun_pelanggan]')");

    	var_dump($result);
    	$_SESSION['sukses_register']  = 'Berhasil register ke dalam sistem. Silakan login dengan username dan password yang sudah dibuat.';
    	header("Location: login.php");
    }
    ?>