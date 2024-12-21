<?php
session_start();

include "../../../../../koneksi.php";

if(isset($_POST['send_message'])){
    $message = $_POST['message'];
    $id_akun_pelanggan = $_POST['id_akun_pelanggan'];
    $id_akun = $_POST['id_akun'];
    $nama_chatroom = "room".$_POST['id_akun_pelanggan'];
    $waktu = date('Y-m-d H:i:s');

    $query = mysqli_query($koneksi, "INSERT INTO chat (chat, waktu, penerima, pengirim, id_akun, id_akun_pelanggan) VALUES('$message', '$waktu', '$id_akun_pelanggan', '$id_akun', '$id_akun', '$id_akun_pelanggan')");

    if($query){
        mysqli_query($koneksi, "UPDATE chat SET a_read='1' WHERE penerima='$id_akun_pelanggan' OR pengirim='$id_akun_pelanggan'");
        header("Location: ../../form/chat.php?id_akun_pelanggan=$id_akun_pelanggan");
    } else {
        header("Location: ../../form/chat.php?id_akun_pelanggan=$id_akun_pelanggan");
    }



}
?>