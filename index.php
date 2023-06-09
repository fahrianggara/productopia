<?php require_once('config.php') ?>

<?php
    $project_name = "Productopia"; // <-- Nama project

    $title = $project_name;
    $description = "$project_name adalah sebuah website yang menyediakan berbagai macam produk seperti 
        produk aksesoris, elektronik dan lain lain yang dapat dibeli secara online dan mudah.";

    if (isset($_GET['page'])) { // <-- Jika ada parameter page di URL (?page=..)
        $page = $_GET['page']; // <-- Ambil nilai parameter page (..=nilai)

        switch ($page) { // <-- Cek nilai parameter page
            case 'product': // <-- Jika nilainya product
                $title = "Product - $title";
                $content = 'views/product.php';
                break;
            case 'product-detail': // <-- Jika nilainya product-detail
                $id = $_GET['id'];
                $product = getProductById($id);
                $title = $product['name'] . " - $title";
                $content = 'views/detail.php';
                break;
            case 'checkout': // <-- Jika nilainya checkout
                $title = "Checkout - $title";
                $content = 'views/checkout.php';
                break;
            case 'purchase': // <-- Jika nilainya purchase
                $title = "Purchase - $title";
                $content = 'views/purchase.php';
                break;
            default: // <-- Jika nilainya tidak ada
                $content = 'views/homepage.php';
                break;
        }
    } else { // <-- Jika tidak ada parameter page di URL
        $content = 'views/homepage.php';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>  
    <!-- Meta Tag -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title of the page -->
    <title><?= $title; ?></title>

    <!-- Logo favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>/assets/images/favicon/apple-touch-icon.png"> 
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>/assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/assets/images/favicon/favicon-16x16.png">

    <!-- CSS File -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome-free/css/all.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/tinyslider/tiny-slider.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/alertify/css/alerts.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/styling.css">

    <!-- jQuery -->
    <script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
</head>

<body>
    <!-- Navbar -->
    <?php include('views/layouts/navbar.php'); ?>

    <!-- Flash Message -->
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="flash-message" data-message="<?= $_SESSION['message'] ?>"></div> 
        <?php unset($_SESSION['message']); ?> <!-- Hapus session message -->
    <?php } ?>

    <!-- Content -->
    <main id="main">
        <?php include($content); ?>
    </main>

    <!-- Tombol untuk ke atas -->
    <a href="javascript:void(0)" class="btn to-the-top">
        <i class="fas fa-chevron-up"></i>
    </a>

    <!-- Footer -->
    <?php include('views/layouts/footer.php'); ?>

    <!-- Modal Payment info -->
    <?php include('views/payment-info.php') ?>

    <!-- JS File -->
    <script src="<?= base_url() ?>/assets/plugins/bootstrap4/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/jquery/sticky/jquery.sticky.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/jquery/easing/jquery.easing.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/tinyslider/tiny-slider.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/alertify/js/alerts.js"></script>
    <script src="<?= base_url() ?>/assets/js/script.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            // Flash message
            var message = $('.flash-message').data('message');
            if (message) alertify.log(message);

            // Tooltip
            $('[data-toggle="tooltip"]').tooltip({ // <-- Inisialisasi tooltip bootstrap
                trigger: 'hover'
            }).on('click', function() { // <-- Jika tooltip di klik
                $(this).tooltip('hide'); // <-- Sembunyikan tooltip
            });
        });
    </script>
</body>