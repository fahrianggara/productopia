<?php
    session_start();

    if (isset($_POST["id"])) { // if post request
        session_unset(); // clear session

        foreach ($_POST as $key => $value) { // set session
            $_SESSION[$key] = $value; 
        }
    } else {
        if (!isset($_SESSION['qty'])) { // if session not set
            session_unset(); // clear session
            header("Location:" . base_url() . "?page=product"); // redirect to product page
        }
    }

    // Combining first name and last name
    function fullName() {
        return $_SESSION["firstname"] . " " . $_SESSION["lastname"];
    }

    // calculate price and quantity
    $price = $_SESSION['price'] * $_SESSION['qty']; 

    // calculate total price
    $total = $price + $_SESSION['tax'] + $_SESSION['shipping'];

    // calculate change
    $change = $_SESSION['nominal'] - $total;

    // session color, size, weight
    $arrayChoice = array();
    if (isset($_SESSION['color'])) {
        $arrayChoice[] = $_SESSION['color'];
    }
    if (isset($_SESSION['size'])) {
        $arrayChoice[] = $_SESSION['size'];
    }
    if (isset($_SESSION['weight'])) {
        $arrayChoice[] = $_SESSION['weight'];
    }
    
    $arrayChoice = array_filter($arrayChoice); // remove empty array
    $textChoice = implode(", ", $arrayChoice); // convert array to string
    if (!empty($textChoice)) { // if not empty
        $textChoice = "[" . $textChoice . "]"; // add bracket
    }

?>

<section id="purchase">
    <div class="container">
        <div class="purchase-row row">
            <div class="col-lg-6 col-md-8">
                <div class="purchase-container">
                    <div class="purchase-title">
                        <h3>Halo, <?= fullName() ?>👋</h3>
                        <p>Terimakasih telah berbelanja di Productopia!</p>
                    </div>

                    <hr>

                    <div class="purchase-info">
                        <div class="row">
                            <div class="col-8">
                                <p class="heading">Tanggal Pembelian</p>
                                <p class="detail"><?= date("d F Y") ?></p>
                            </div>
                            <div class="col-4">
                                <p class="heading">Order ID</p>
                                <p class="detail"><?= $_SESSION['order-id'] ?></p>
                            </div>
                        </div>
                        <div class="row" style="margin-top: .8rem;">
                            <div class="col-12">
                                <p class="heading">Alamat Pengiriman</p>
                                <p class="detail"><?= $_SESSION['address'] ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="purchase-pricing">
                        <h3>Informasi pembayaran</h3>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="pr-2">
                                        <?= $_SESSION['name'] ?>
                                        <small class="text-secondary">
                                            <?= $textChoice ?>
                                            (<?= $_SESSION['qty'] ?>x) 
                                            (<?= formatRupiah($_SESSION['price']) ?>)
                                        </small>
                                    </span>
                                    <span><?= formatRupiah($_SESSION['price'] * $_SESSION['qty']) ?></span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center justify-content-between">
                                    <span>Pajak</span>
                                    <span><?= formatRupiah($_SESSION['tax']) ?></span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center justify-content-between">
                                    <span>
                                        Pengiriman 
                                        <small class="text-secondary">
                                            (<?= ucwords(str_replace('_', ' ', $_SESSION['region'])) ?>)
                                        </small>
                                    </span>
                                    <span><?= formatRupiah($_SESSION['shipping']) ?></span>
                                </div>
                            </li>
                            <li class="list-group-item border-0 pb-0">
                                <table class="float-right mt-1">
                                    <tr>
                                        <td class="px-3" style="padding: .15rem 0;">Total</td>
                                        <td class="pr-1">:</td>
                                        <td><?= formatRupiah($total) ?></td>
                                    </tr>
                                    <tr>
                                        <td class="px-3" style="padding: .15rem 0;">Cash</td>
                                        <td class="pr-1">:</td>
                                        <td><?= formatRupiah($_SESSION['nominal']) ?></td>
                                    </tr>
                                    <tr>
                                        <td class="px-3" style="padding-top: .15rem;">Kembalian</td>
                                        <td class="pr-1">:</td>
                                        <td><?= formatRupiah($change) ?></td>
                                    </tr>
                                </table>
                            </li>
                        </ul>
                    </div>

                    <div class="purchase-button mb-1 mt-4">
                        <a href="<?= base_url(); ?>?page=product-detail&id=<?= $_SESSION['id'] ?>" class="btn btn-block btn-success p-1">Beli Lagi</a>
                        <a href="<?= base_url(); ?>" class="btn btn-block btn-primary p-1">Halaman Utama</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $("#header").remove();
        $("footer").remove();
        $(".menu-toggle").remove();
    });
</script>