<?php
// Membaca data array dari file JSON (opsional)
$data = json_decode(file_get_contents('data.json'), true);
if (!$data) {
    $data = array();
}
// Jika ada data yang dikirimkan melalui metode POST
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

    // Mencari data dengan ID yang sesuai
    $id = $_GET['id'];
    foreach ($data as $index =>$row) {
        if ($row['id'] == $id) {
            $updateIndex = $index;
            break;
        }
        // }else{
        //     echo "<script> alert('Data tidak ditemukan'); </script>";
        //     echo "<script>document.location.href='index.php';</script>";
        // }
    }

    // Jika index data ditemukan
    if ($updateIndex !== null) {
        // Memperbarui data dalam array
        $data[$updateIndex]['image'] = $image;
        $data[$updateIndex]['name'] = $name;
        $data[$updateIndex]['badge'] = $badge;
        $data[$updateIndex]['category'] = $category;
        $data[$updateIndex]['original'] = $original;
        $data[$updateIndex]['discount'] = $discount;
        $data[$updateIndex]['description'] = $description;
        $data[$updateIndex]['size'] = $size;
        $data[$updateIndex]['quantity'] = $quantity;
        $data[$updateIndex]['stock'] = $stock;

        // Menyimpan data array ke file JSON (opsional)
        file_put_contents('data.json', json_encode($data));
        echo "<script> alert('Data Berhasil Diupdate'); </script>";
        echo "<script>document.location.href='../index.php?page=product';</script>";
    }

    // Mengarahkan kembali ke halaman utama
    // header('Location: index.php');
}
?>