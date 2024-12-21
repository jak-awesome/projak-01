<?php
 
 session_start();
 include "../../koneksi.php";
 
$username = $_POST['username'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// include library phpmailer
include('../../assets/PHPMailer/src/Exception.php');
include('../../assets/PHPMailer/src/PHPMailer.php');
include('../../assets/PHPMailer/src/SMTP.php');

function randomPassword()
{
// function untuk membuat password random 6 digit karakter
 
$digit = 6;
$karakter = "ABCDEFGHJKLMNPQRSTUVWXYZ23456789";
 
srand((double)microtime()*1000000);
$i = 0;
$pass = "";
while ($i <= $digit-1)
{
$num = rand() % 32;
$tmp = substr($karakter,$num,1);
$pass = $pass.$tmp;
$i++;
}
return $pass;
} 
 
// membuat password baru secara random -> memanggil function randomPassword
$newPassword = randomPassword();
 
// perlu dibuat sebarang pengacak
$pengacak  = "NDJS3289JSKS190JISJI";
     
// mengenkripsi password dengan md5() dan pengacak
$newPasswordEnkrip = md5($pengacak . md5($newPassword) . $pengacak);
  
// mencari alamat email si user
$query = "SELECT * FROM akun_pelanggan WHERE username = '$username'";
$hasil = mysqli_query($koneksi, $query);
$data  = mysqli_fetch_array($hasil);
$alamatEmail = $data['email'];
 
$email_pengirim = 'jakatrinata07@gmail.com';
$nama_pengirim = 'Alvindo Computama';
$email_penerima = $alamatEmail;
$subjek = 'Kata Sandi Baru';
$pesan  = "Username Anda : ".$username.". \nPassword Anda yang baru adalah ".$newPassword;

$mail = new PHPMailer;
$mail->isSMTP();

$mail->Host = 'smtp.gmail.com';
$mail->Username = $email_pengirim;
$mail->Password = 'qncljhrvogqfxnwy';
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->SMTPDebug = 3;

$mail->setFrom($email_pengirim, $nama_pengirim);
$mail->addAddress($email_penerima);
$mail->isHTML(true);
$mail->Subject = $subjek;
$mail->Body = $pesan;

$send = $mail->send();

if($send){
    $query = "UPDATE akun_pelanggan SET password = '$newPasswordEnkrip' WHERE username = '$username'";
    $hasil = mysqli_query($koneksi, $query);

    if ($hasil){ 
        $_SESSION['sukses_ganti_password'] = "Password baru telah direset dan sudah dikirim ke email Anda";
        header("Location: login.php");
    }

} else {
    $_SESSION['gagal_ganti_password'] = "Pengiriman password baru ke email gagal";
    header("Location: lupaPassword.php");
}

?>