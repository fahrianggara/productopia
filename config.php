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
    $teams = []; // Jika kosong, buat array kosong
}

// Membaca dan mengurai file JSON 'data/product.json'
$productsJson = file_get_contents('data/product.json');
$products = json_decode($productsJson, true);

// Memeriksa apakah variabel $products kosong atau null
if (!$products) {
    $products = []; // Jika kosong, buat array kosong
}

/**
 * Membuat Base URL untuk mengakses file
 * fungsinya untuk memanggil alamat utama dari URL (localhost atau domain)
 *
 * @return void
 */
function base_url() 
{
    // Jika HTTPS aktif, gunakan HTTPS, jika tidak, gunakan HTTP
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST']; // <-- Mengambil host (localhost atau domain)
    $path = dirname($_SERVER['PHP_SELF']);  // <-- Mengambil path (folder) dari file ini
    $base_url = $protocol . '://' . $host . $path; // <-- Menggabungkan semua variabel diatas

    return $base_url;
}

/**
 * Menentukan url halaman saat ini
 *
 * @return void
 */
function url_current()
{
    // Jika HTTPS aktif, gunakan HTTPS, jika tidak, gunakan HTTP
    $url = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST']; // <-- Mengambil host (localhost atau domain)
    $request_uri = $_SERVER['REQUEST_URI']; // <-- Mengambil URI (halaman) saat ini
    
    return $url . '://' . $host . $request_uri;
}

/**
 * Mengambil parameter page dari URL
 * Contoh: ?page=home => home
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
 * @param string $param
 * @param string|array $page
 */
$page = isset($_GET['page']) ? $_GET['page'] : ''; 
function setActive($param, $page) 
{
    if (is_array($page)) { // <-- Jika parameter $page berupa array
        foreach ($page as $p) { // <-- Looping data didalam array
            if ($p == $param) { // <-- Jika parameter sama dengan data didalam array
                return 'active'; // <-- Tambahkan class active
            }
        }
    } else { // <-- Jika parameter $page bukan array
        if ($param == $page) { // <-- Jika parameter sama dengan $page
            return 'active'; // <-- Tambahkan class active
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
    /**
     * Parameter number_format
     * 
     * 1. Angka (value) yang akan diformat
     * 2. Jumlah digit desimal (Contoh: 0 = 1000, 2 = 1000,00)
     * 3. Karakter pemisah desimal
     * 4. Karakter pemisah ribuan
     */
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
    /**
     * explode digunakan untuk memecahkan string menjadi array
     * disini kita memecahkan string berdasarkan koma (,)
     * Contoh: "S,M,L" => ["S", "M", "L"]
     */
    $exp = explode(',', $row[$key]);

    foreach ($exp as $e) { // <-- Looping data didalam array
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
    $price = ""; 
    $discount = ""; 
    $badge = "";
    
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
            <a href="'. base_url().'/?page=product-detail&id=' . $row['id'] . '" class="product">
                <div class="product-image">
                    ' . $badge . '
                    <img src="' . $row['image'] . '" title="Gambar Dari : '. $row['source-img'].'">
                    <div class="sc-img">Sumber Gambar : '. $row['source-img'] .'</div>
                </div>
                <div class="product-info">
                    <span class="category">' . $row['category'] . '</span>
                    <h3 class="product-name">
                        <a title="' . $row['name'] . '" 
                            href="'. base_url().'/?page=product-detail&id=' . $row['id'] . '">
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
 * Menampilkan item produk berdasarkan group (kategori)
 *
 * @param  mixed $product
 * @param  mixed $id
 * @param  mixed $category
 * @return void
 */
function groupAndDisplayData($products, $id = "", $category = "")
{
    $groupProducts = []; // <-- Menampung data produk berdasarkan group (kategori)

    foreach ($products as $row) { // <-- Looping data produk
        $group = $row['category']; // <-- Menentukan group (kategori) produk

        if (!isset($groupProducts[$group])) {  // <-- Jika group (kategori) belum ada
            $groupProducts[$group] = []; // <-- Buat group (kategori) baru
        }

        $groupProducts[$group][] = $row; // <-- Masukkan data produk ke group (kategori) yang sesuai
    }

    foreach ($groupProducts as $group => $data) { // <-- Looping data produk berdasarkan group (kategori)
        $count = 0; // <-- Menentukan jumlah item produk yang akan ditampilkan
        $hideAnotherProduct = false; // <-- menentukan apakah item produk lainnya akan ditampilkan atau tidak

        foreach ($data as $row) { // <-- Looping data produk

            if ($id && $category) { // <-- Jika ada parameter ID dan kategori (digunakan di halaman detail produk)

                // Tampilkan produk lainnya, selain produk yang sedang dibuka dan kategori yang sama
                if ($row['category'] == $category) {
                    $count++; // <-- Tambah jumlah item produk

                    if ($row['id'] != $id) {
                        echo itemProduct($row); // <-- Tampilkan item produk
                       
                        if ($count == 6) { // <-- Jika jumlah item produk sudah 6, maka berhenti
                            break;
                        }
                    } else {
                        // Jika item produk hanya 1 dan kategori yang sama
                        if (count($data) == 1) {
                            $hideAnotherProduct = true; // hide section another product
                        }
                    }
                }

            } else { // <-- Jika tidak ada parameter ID dan kategori (digunakan di halaman home)

                echo itemProduct($row); // <-- Tampilkan item produk
                $count++; // <-- Tambah jumlah item produk

                if ($count == 2) { // <-- Jika item produk dalam satu group sudah 2, maka berhenti
                    break;
                }

            }
        }
    }

    // hapus section another product menggunakan javascript
    if ($hideAnotherProduct) {
        echo "<script>$('#anotherProduct').remove();</script>";
    }
}

/**
 * Menyimpan data ($_POST) ke session untuk digunakan pada halaman checkout dan purchase
 * param $page diambil dari file checkout dan purchase, untuk menentukan halaman yang akan diakses
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
         * Kondisi dibawah ini digunakan untuk mencegah user mengakses halaman- 
         * checkout dan purchase lewat URL (JIKA TIDAK ADA SESSION), agar tidak terjadi error
         */
        
        if (!isset($_SESSION[$page])) { // <-- Jika session page tidak ada
            session_unset(); // <-- Hapus semua session (jika ada)
            echo "<script>window.location.href = '". base_url() ."?page=product';</script>"; // <-- Redirect ke halaman product
            $_SESSION['message'] = "Kamu tidak boleh mengakses halaman ini dari URL!"; // <-- Tampilkan pesan error
        }

    }

    return $_SESSION; // <-- Kembalikan data session
}