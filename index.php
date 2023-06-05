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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productopia</title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.css">
    <link rel="stylesheet" href="assets/plugins/tinyslider/tiny-slider.css">
    <link rel="stylesheet" href="assets/css/s.css">
</head>

<body>
    <!-- Navbar -->
    <?php include('layouts/navbar.php'); ?>

    <main id="main">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];

            switch ($page) {
                case 'product':
                    include('product/index.php');
                    break;
                case 'product-detail':
                    include('product/detail.php');
                    break;
                case 'cart':
                    include('product/cart.php');
                    break;
                default:
                    include('homepage/index.php');
                    break;
            }
        } else {
            include('homepage/index.php');
        }
        ?>
    </main>

    <a href="javascript:void(0)" class="btn to-the-top">
        <i class="fas fa-chevron-up"></i>
    </a>

    <!-- Footer -->
    <?php include('layouts/footer.php'); ?>

    <!-- Javascript -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap4/bootstrap.bundle.min.js"></script>
    <script src="assets/plugins/jquery/sticky/jquery.sticky.js"></script>
    <script src="assets/plugins/jquery/easing/jquery.easing.min.js"></script>
    <script src="assets/plugins/tinyslider/tiny-slider.js"></script>
    <script src="assets/js/i.js"></script>
</body>