<?php

// Membaca data array dari file JSON (opsional)
$teams = json_decode(file_get_contents('data/team.json'), true);
if (!$teams) {
    $teams = array();
}

$product = json_decode(file_get_contents('data/product.json'), true);
if (!$product) {
    $product = array();
}

function itemProduct($row)
{
    $price = "";
    $discount = "";
    $badge = "";

    if ($row['discount'] == "") {
        $price = '<p class="original"> Rp' . number_format($row['original'], 0, ".", ".") . '</p>';
    } else {
        $price = '<p class="original"> Rp' . number_format($row['original'], 0, ".", ".") . '</p>';
        $discount = '<p class="discount"> Rp' . number_format($row['discount'], 0, ".", ".") . '</p>';
    }

    if ($row['badge'] == "") {
        $badge = "";
    } else {
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

function base_url()
{
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['PHP_SELF']);
    $base_url = $protocol . '://' . $host . $path . '/';

    return $base_url;
}

$uri = $_SERVER['REQUEST_URI'];
if (strpos($uri, '?') !== false) { // Jika ada parameter
    $param = explode('=', explode('?', $uri)[1])[1]; // Ambil parameter
    $param = explode('&', $param)[0]; // Jika ada parameter lain, ambil parameter pertama
}

$page = isset($_GET['page']) ? $_GET['page'] : ''; // Ambil parameter page
function setActive($param, $page) // Fungsi untuk menandai menu yang aktif
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
