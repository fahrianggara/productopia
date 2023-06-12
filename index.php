<?php require_once('config.php') ?>

<?php
    $title = "Productopia";

    if (isset($_GET['page'])) {
        $page = $_GET['page'];

        switch ($page) {
            case 'product':
                $title = "All Product - $title";
                $content = 'product/index.php';
                break;
            case 'product-detail':
                $id = $_GET['id'];
                $product = getProductById($id);
                $title = $product['name'] . " - $title";
                $content = 'product/detail.php';
                break;
            case 'checkout':
                $title = "Checkout - $title";
                $content = 'product/checkout.php';
                break;
            case 'purchase':
                $title = "Purchase - $title";
                $content = 'product/purchase.php';
                break;
            default:
                $content = 'homepage/index.php';
                break;
        }
    } else {
        $content = 'homepage/index.php';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <!-- Logo favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/site.webmanifest">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.css">
    <link rel="stylesheet" href="assets/plugins/tinyslider/tiny-slider.css">
    <link rel="stylesheet" href="assets/plugins/alertify/css/alerts.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
</head>

<body>
    <!-- Navbar -->
    <?php include('layouts/navbar.php'); ?>

    <!-- Flash Message -->
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="flash-message" data-message="<?= $_SESSION['message'] ?>"></div> 
        <?php unset($_SESSION['message']); ?>
    <?php } ?>

    <main id="main">
        <?php include($content); ?>
    </main>

    <a href="javascript:void(0)" class="btn to-the-top">
        <i class="fas fa-chevron-up"></i>
    </a>

    <!-- Footer -->
    <?php include('layouts/footer.php'); ?>

    <!-- JS -->
    <script src="assets/plugins/bootstrap4/bootstrap.bundle.min.js"></script>
    <script src="assets/plugins/jquery/sticky/jquery.sticky.js"></script>
    <script src="assets/plugins/jquery/easing/jquery.easing.min.js"></script>
    <script src="assets/plugins/tinyslider/tiny-slider.js"></script>
    <script src="assets/plugins/alertify/js/alerts.js"></script>
    <script src="assets/js/app.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var flashMessage = $('.flash-message');
            var message = flashMessage.data('message');
            if (message) alertify.log(message);
        });
    </script>
</body>