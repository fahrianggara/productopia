<!-- process.php -->
<?php

// File json yang akan dibaca
$file = 'data.json';
// Mendapatkan file json
$anggota = file_get_contents($file);
// Mendecode anggota.json
$data = json_decode($anggota, true);

// Jika ada data yang dikirimkan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari form
    $image = $_POST['img'];
    $name = $_POST['nm'];
    $badge = $_POST['bg'];
    $category = $_POST['cate'];
    $original = $_POST['ori'];
    $discount = $_POST['dis'];
    $description = $_POST['desc'];
    $size = $_POST['size'];
    $quantity = $_POST['qty'];
    $stock = $_POST['stk'];

    // Menambahkan data baru ke dalam array
    if (empty($data)) {
        $newId = 1;
    } else {
        $newId = end($data)['id'] + 1;
    }

    $newData = array(
        'id' => $newId,
        'image' => $image,
        'name' => $name,
        'badge' => $badge,
        'category' => $category,
        'original' => $original,
        'discount' => $discount,
        'description' => $description,
        'size' => $size,
        'quantity' => $quantity,
        'stock' => $stock
    );
    $data[] = $newData;
}
// Mengencode data menjadi json
$jsonfile = json_encode($data, JSON_PRETTY_PRINT);
// Menyimpan data ke dalam anggota.json
$anggota = file_put_contents($file, $jsonfile);

header('Location: index.php');
?>