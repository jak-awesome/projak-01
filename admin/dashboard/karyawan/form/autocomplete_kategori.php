<?php
// Set header type konten.
header("Content-Type: application/json; charset=UTF-8");

include "../../../../koneksi.php";

// Deklarasi variable keyword buah.
$nama_kategori = $_GET["query"];

// Query ke database.
$query  = $koneksi->query("SELECT * FROM kategori WHERE nama_kategori LIKE '%$nama_kategori%' ORDER BY nama_kategori DESC");
$result = $query->fetch_all(MYSQLI_ASSOC);

// Format bentuk data untuk autocomplete.
foreach($result as $data) {
    $output['suggestions'][] = [
        'value' => $data['nama_kategori'],
        'nama_kategori'  => $data['nama_kategori']
    ];
}

if (! empty($output)) {
    // Encode ke format JSON.
    echo json_encode($output);
}