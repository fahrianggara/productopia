<?php
// Membaca data array dari file JSON (opsional)
$data = json_decode(file_get_contents('data.json'), true);
if (!$data) {
    $data = array();
}

$id = $_GET['id'];
foreach ($data as $index =>$row) {
    if ($row['id'] == $id) {
        $deleteIndex = $index;
    }else{
        echo "<script> alert('Data tidak ditemukan'); </script>";
        echo "<script>document.location.href='index.php';</script>";
    }
}

// Jika index data ditemukan
if ($deleteIndex !== null) {
    // Menghapus data dari array
    array_splice($data, $deleteIndex, 1);

    // Menyimpan data array ke file JSON (opsional)
    file_put_contents('data.json', json_encode($data));
    echo "<script> alert('Data Berhasil Dihapus'); </script>";
    echo "<script>document.location.href='index.php';</script>";
}


// Mengarahkan kembali ke halaman utama

?>