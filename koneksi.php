<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$database = "alvindo";

$koneksi = mysqli_connect("$dbhost", "$dbuser", "$dbpassword", "$database");

if (mysqli_connect_error()) {
    echo "Koneksi Database Gagal" . mysqli_connect_error();
}
