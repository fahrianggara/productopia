<?php 

session_start(); // <-- Memulai session (menyimpan data sementara di server)

/**
 * Mengambil data dari file JSON
 */
$teams = json_decode(file_get_contents('data/team.json'), true);
!$teams ? $teams = array() : null;

$products = json_decode(file_get_contents('data/product.json'), true);
!$products ? $products = array() : null;

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
    $base_url = $protocol . '://' . $host . $path . '/';

    return $base_url;
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
    global $products;

    foreach ($products as $row) {
        if ($row['id'] == $id) {
            return $row;

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
                    <img src="' . $row['image'] . '">
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

                if ($count == 3) { // <-- Jika counter sudah mencapai 3, berhenti
                    break;
                }
            }
        }
    }
}

function saveDataWithSession($quantity) 
{
    if (isset($_POST["id"])) { // if post request
        session_unset(); // clear session

        foreach ($_POST as $key => $value) { // set session
            $_SESSION[$key] = $value; 
        }
    } else {
        if (!isset($_SESSION[$quantity])) { // if session not set
            session_unset(); // clear session
            header("Location:" . base_url() . "?page=product"); // redirect to product page
        }
    }

    return $_SESSION;
}