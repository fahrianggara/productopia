<?php
// Membaca data array dari file JSON (opsional)
$data = json_decode(file_get_contents('data.json'), true);
if (!$data) {
    $data = array();
}
?>
<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>CRUD dengan Array PHP</title>
</head>
<body>
    <h2>Tambah Data</h2>
    <form action="process.php" method="POST">
        <label for="name">Nama:</label>
        <input type="text" name="name" required><br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>
        <input type="submit" value="Tambah">
    </form>
    
    <h2>Data</h2>
    <table>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
        <?php
        // Menampilkan data dari array
        if (!empty($data)) {
            foreach ($data as $row) {
        ?>
                 <tr>
                    <td><?=$row['id']?></td>
                    <td><?=$row['name']?></td>
                    <td><?=$row['email']?></td>
                    <td>
                        <a href="edit.php?id=<?=$row['id']?>">Edit</a>
                        <a href="delete.php?id=<?=$row['id']?>">Hapus</a>;
                 </tr>

        <?php
            }
        }
        ?>
    </table>
</body>
</html>
