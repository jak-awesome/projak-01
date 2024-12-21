<?php
session_start();

include "../../../koneksi.php";

if(isset($_POST['contact'])){
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $pesan = $_POST['pesan'];

    $query = mysqli_query($koneksi, "INSERT INTO pesan_kontak (nama_lengkap, email, no_hp, pesan) VALUES('$nama_lengkap', '$email', '$no_hp', '$pesan')");

    if($query){
        header("Location: contact.php?success");
    } else {
        header("Location: contact.php?failed");
    }


}
?>