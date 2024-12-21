<?php
session_start();

include "../../koneksi.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
 
    $sql = "SELECT * FROM akun WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $sql);
    
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        if($row['id_level'] == "1"){
            $_SESSION['username'] = $row['username'];
            $_SESSION['id_akun'] = $row['id_akun'];
            $_SESSION['login'] = $row['username'].date('Y-m-d H:i:s');
            $_SESSION['sukses'] = 'Anda Berhasil Login';
            header("Location: ../dashboard/karyawan/index.php");
        } else if($row['id_level'] == "2"){
            $_SESSION['username'] = $row['username'];
            $_SESSION['id_akun'] = $row['id_akun'];
            $_SESSION['login'] = $row['username'].date('Y-m-d H:i:s');
            $_SESSION['sukses'] = 'Anda Berhasil Login';
            header("Location: ../dashboard/pemilik/index.php");
        }
    } else {
        $_SESSION['error'] = 'Username dan Password anda mungkin salah';
        header("Location: index.php");
    }

?>

