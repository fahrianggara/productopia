<?php
// Mendapatkan ID dari URL
$file = "data.json";

// Mendapatkan file json
$anggota = file_get_contents($file);

// Mendecode anggota.json
$data = json_decode($anggota, true);

// Mencari index data dengan ID yang sesuai
$id = $_GET['id'];
$deleteIndex = null;
foreach ($data as $index => $row) {
    if ($row['id'] === $id) {
        $deleteIndex = $index;
        break;
    }
}

// Jika index data ditemukan
if ($deleteIndex !== null) {
    // Menghapus data dari array
    array_splice($data, $deleteIndex, 1);

    // Menyimpan data array ke file JSON (opsional)
    file_put_contents('data.json', json_encode($data));
}

// Mengarahkan kembali ke halaman utama
header('Location: index.php');
?>