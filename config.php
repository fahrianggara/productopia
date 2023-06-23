<?php 

session_start(); // <-- Memulai session (menyimpan data sementara di server)

/**
 * Mengambil data dari file JSON
 * 
 * json_decode digunakan untuk mengubah JSON menjadi array
 */
// Membaca dan mengurai file JSON 'data/team.json'
$teamsJson = file_get_contents('data/team.json');
$teams = json_decode($teamsJson, true); // <-- true digunakan untuk mengubah JSON menjadi array

// Memeriksa apakah variabel $teams kosong atau null
if (!$teams) {
    $teams = array(); // Jika kosong, buat array kosong
}

// Membaca dan mengurai file JSON 'data/product.json'
$productsJson = file_get_contents('data/product.json');
$products = json_decode($productsJson, true);

// Memeriksa apakah variabel $products kosong atau null
if (!$products) {
    $products = array(); // Jika kosong, buat array kosong
}

/**
 * Membuat Base URL untuk mengakses halaman
 *
 * @return void
 */
function base_url() 
{
    // Jika HTTPS aktif, gunakan HTTPS, jika tidak, gunakan HTTP
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['PHP_SELF']); 
    $base_url = $protocol . '://' . $host . $path;

    return $base_url;
}

/**
 * Menentukan url halaman saat ini
 *
 * @return void
 */
function url_current()
{
    $url = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $request_uri = $_SERVER['REQUEST_URI'];
    
    return $url . '://' . $host . $request_uri;
}

/**
 * Mengambil parameter page dari URL
 *
 * @return void
 */
$uri = $_SERVER['REQUEST_URI'];
if (strpos($uri, '?') !== false) { // <-- Jika ada parameter
    $param = explode('=', explode('?', $uri)[1])[1]; // <-- Ambil parameter
    $param = explode('&', $param)[0]; // <-- Jika ada parameter lain, ambil parameter pertama
}

/**
 * Membuat menu aktif berdasarkan parameter page yang diambil
 *
 * @return void
 */
$page = isset($_GET['page']) ? $_GET['page'] : ''; 
function setActive($param, $page) 
{
    if (is_array($page)) {
        foreach ($page as $p) {
            if ($p == $param) {
                return 'active';
            }
        }
    } else {
        if ($param == $page) {
            return 'active';
        }
    }
}

/**
 * Mengambil data produk berdasarkan ID
 *
 * @param  mixed $id
 * @return void
 */
function getProductById($id)
{
    global $products; // <-- Mengambil variabel global (diluar function)

    foreach ($products as $row) { // <-- Looping data produk
        if ($row['id'] == $id) { // <-- Jika ID produk sama dengan ID yang dicari
            return $row; // <-- Kembalikan data produk
            break;
        }
    }
}

/**
 * Memformat angka menjadi format rupiah
 *
 * @param  mixed $angka
 * @return void
 */
function formatRupiah($angka)
{
    return 'Rp' . number_format($angka, 0, ".", ".");
}

/**
 * Memecahkan item selection menjadi array
 * digunakan di file product/detail.php
 *
 * @param  mixed $row
 * @param  mixed $key
 * @return void
 */
function explodeItemSelection($row, $key) 
{
    $exp = explode(',', $row[$key]);

    foreach ($exp as $e) {
        echo "<li><input type='radio' name='$key' value='$e'>$e</li>";
    }
}

/**
 * Menampilkan item produk
 *
 * @param  mixed $row
 * @return void
 */
function itemProduct($row)
{
    $price = ""; $discount = ""; $badge = "";
    
    if ($row['discount'] == "") {
        $price = '<p class="original">' . formatRupiah($row['original']) . '</p>';
    } else {
        $price = '<p class="original">' . formatRupiah($row['original']) . '</p>';
        $discount = '<p class="discount">' . formatRupiah($row['discount']) . '</p>';
    }
    
    if ($row['badge'] != "") {
        $badge = $row['badge'] == "hot"
            ? '<span class="product-tag bg-danger">Hot</span>'
            : '<span class="product-tag bg-info">New</span>';
    }
    
    return '
        <li class="product-item">
            <a href="?page=product-detail&id=' . $row['id'] . '" class="product">
                <div class="product-image">
                    ' . $badge . '
                    <img src="' . $row['image'] . '" title="Gambar Dari : '. $row['source-img'].'">
                    <div class="sc-img">Sumber Gambar : '. $row['source-img'] .'</div>
                </div>
                <div class="product-info">
                    <span class="category">' . $row['category'] . '</span>
                    <h3 class="product-name">
                        <a title="' . $row['name'] . '" 
                            href="?page=product-detail&id=' . $row['id'] . '">
                            ' . $row['name'] . '
                        </a>
                    </h3>
                    <div class="product-price">
                        ' . $price . $discount . '
                    </div>
                </div>
            </a>
        </li>
    ';
}

/**
 * Menampilkan item produk berdasarkan group (category)
 *
 * @param  mixed $product
 * @param  mixed $id
 * @param  mixed $category
 * @return void
 */
function groupAndDisplayData($products, $id = "", $category = "")
{
    $groupedData = []; // <-- Menampung data yang sudah dikelompokkan

    foreach ($products as $row) { // <-- Mengelompokkan data
        $group = $row['category']; // <-- Menentukan group berdasarkan category

        if (!isset($groupedData[$group])) { // <-- Jika group belum ada, buat group baru
            $groupedData[$group] = []; // <-- Buat group baru
        }

        $groupedData[$group][] = $row; // <-- Masukkan data ke group yang sudah dibuat
    }

    foreach ($groupedData as $group => $data) { // <-- Menampilkan data
        $count = 0; // <-- Membuat counter untuk membatasi jumlah data yang ditampilkan

        foreach ($data as $row) { 
            if ($id && $category) { // <-- ini untuk tampilan produk dihalaman detail
                if ($row['id'] != $id && $row['category'] == $category) {
                    echo itemProduct($row);
                    $count++; // <-- Increment counter

                    if ($count == 6) { // <-- Jika counter sudah mencapai 6, berhenti
                        break;
                    }
                }
            } else {
                echo itemProduct($row);
                $count++; // <-- Increment counter

                if ($count == 2) { // <-- Jika counter sudah mencapai 3, berhenti
                    break;
                }
            }
        }
    }
}

/**
 * Menyimpan data ($_POST) ke session untuk digunakan pada halaman checkout dan purchase
 * param $page diambil dari halaman checkout dan purchase, untuk menentukan halaman yang akan diakses
 *
 * @param  mixed $page
 * @return void
 */
function saveDataWithSession($page) 
{
    // Jika ada data id yang dikirim lewat $_POST
    if (isset($_POST["id"])) {
        
        session_unset(); // <-- Hapus semua session

        foreach ($_POST as $key => $value) { // <-- Looping data $_POST
            $_SESSION[$key] = $value; // <-- Simpan data ke session
        }
        
    } else { // <-- Jika tidak ada data id yang dikirim lewat $_POST

        /**
         * Kondisi dibawah ini digunakan untuk mencegah user mengakses halaman 
         * checkout dan purchase dari URL, agar tidak terjadi error
         */
        
        if (!isset($_SESSION[$page])) { // <-- Jika session page tidak ada
            session_unset(); // <-- Hapus semua session (jika ada)
            echo "<script>window.location.href = '". base_url() ."?page=product';</script>"; // <-- Redirect ke halaman product
            $_SESSION['message'] = "Tidak boleh mengakses halaman ini dari URL!"; // <-- Tampilkan pesan error
        }

    }

    return $_SESSION; // <-- Kembalikan data session
}