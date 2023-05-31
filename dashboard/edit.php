<!-- edit.php -->
<?php
// Mendapatkan ID dari URL
$id = $_GET['id'];

// Mencari data dengan ID yang sesuai
$editData = null;
foreach ($data as $row) {
    if ($row['id'] === $id) {
        $editData = $row;
        break;
    }
}

// Jika data ditemukan
if ($editData) {
    // Tampilkan form edit
    echo "<h2>Edit Data</h2>";
    echo "<form action='update.php?id=".$editData['id']."' method='post'>";
    echo "<label for='name'>Nama:</label>";
    echo "<input type='text' name='name' value='".$editData['name']."' required><br><br>";
    echo "<label for='email'>Email:</label>";
    echo "<input type='email' name='email' value='".$editData['email']."' required><br><br>";
    echo "<input type='submit' value='Update'>";
    echo "</form>";
}
?>
