<?php
// Membaca data array dari file JSON (opsional)
$data = json_decode(file_get_contents('data.json'), true);
if (!$data) {
    $data = array();
}
// Mendapatkan ID dari URL
$id = $_GET['id'];
// Mencari data dengan ID yang sesuai
foreach ($data as $index) {
    if ($index['id'] == $id) {
        $editData = $index;
    }else{
        echo "<script> alert('Data tidak ditemukan'); </script>";
        echo "<script>document.location.href='index.php';</script>";
    }
}

// Jika data ditemukan
if ($index) {
    // Tampilkan form edit
    echo "<h2>Edit Data</h2>";
    echo "<form action='process-edit.php?id=".$editData['id']."' method='post'>";
    echo "<label for='name'>Nama:</label>";
    echo "<input type='text' name='name' value='".$editData['name']."' required><br><br>";
    echo "<label for='email'>Email:</label>";
    echo "<input type='email' name='email' value='".$editData['email']."' required><br><br>";
    echo "<input type='submit' value='Update'>";
    echo "</form>";
}
?>
