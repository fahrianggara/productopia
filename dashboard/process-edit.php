<?php
// Membaca data array dari file JSON (opsional)
$data = json_decode(file_get_contents('data.json'), true);
if (!$data) {
    $data = array();
}
// Jika ada data yang dikirimkan melalui metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari form
    $name = $_POST['name'];
    $email = $_POST['email'];

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
        $data[$updateIndex]['name'] = $name;
        $data[$updateIndex]['email'] = $email;

        // Menyimpan data array ke file JSON (opsional)
        file_put_contents('data.json', json_encode($data));
        echo "<script> alert('Data Berhasil Diupdate'); </script>";
        echo "<script>document.location.href='index.php';</script>";
    }

    // Mengarahkan kembali ke halaman utama
    // header('Location: index.php');
}
?>