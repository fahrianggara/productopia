<?php
    saveDataWithSession('checkout'); // $_POST to $_SESSION

    // membuat pengiriman berdasarkan wilayah
    $shipping = 0;
    if ($_SESSION['region'] == "jabodetabek") {
        $shipping = 5000;
    } else if ($_SESSION['region'] == "jawa_barat") {
        $shipping = 10000;
    } else if ($_SESSION['region'] == "jawa_tengah") {
        $shipping = 15000;
    } else if ($_SESSION['region'] == "jawa_timur") {
        $shipping = 20000;
    } else if ($_SESSION['region'] == "luar_jawa") {
        $shipping = 25000;
    } else if ($_SESSION['region'] == "luar_negeri") {
        $shipping = 30000;
    }

    // membuat region menjadi huruf kapital dan mengganti underscore menjadi spasi. (jawa_barat -> Jawa Barat)
    $region = ucwords(str_replace('_', ' ', $_SESSION['region']));

    // membuat order id dengan diawali PT# dan diikuti 5 digit angka random
    $orderId = "PT#" . rand(10000, 99999);

    // jika discount kosong, maka pakai harga original, jika discount ada, pakai harga discount
    $_SESSION['discount'] == null ? $price = $_SESSION['original'] : $price = $_SESSION['discount'];

    // menghitung pajak 5% dari harga
    $tax = $price * 0.05;

    // menghitung kuantitas dengan harga
    $priceQty = $price * $_SESSION['quantity'];

    // menghitung total harga keseluruhan
    $total = $priceQty + $shipping + $tax;
?>

<section id="checkout" style="padding: 30px 0;">
    <div class="container">
        <div class="section-title">
            <h2>Checkout</h2>
        </div>

        <form class="row checkout-form" action="?page=purchase" method="POST" autocomplete="off">

            <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
            <input type="hidden" name="name" value="<?= $_SESSION['name'] ?>">
            <input type="hidden" name="price" value="<?= $price ?>">
            <input type="hidden" name="quantity" value="<?= $_SESSION['quantity'] ?>">
            <input type="hidden" name="shipping" value="<?= $shipping ?>">
            <input type="hidden" name="tax" value="<?= $tax ?>">
            <input type="hidden" name="order-id" value="<?= $orderId ?>">
            <input type="hidden" name="total" value="<?= $total ?>">
            <input type="hidden" name="region" value="<?= $_SESSION['region'] ?>">
            <input type="hidden" name="purchase" value="purchase">
            <input type="hidden" name="nominal"> 
            <!-- Untuk menyimpan data sementara lalu nanti akan di tampilkan di purchase -->

            <div class="col-lg-8">
                <div class="checkout-container">
                    <ul class="checkout-list">
                        <li class="checkout-item">
                            <div class="checkout-info">

                                <figure class="checkout-image">
                                    <img src="<?= $_SESSION['image'] ?>" class="img-fluid">
                                </figure>

                                <div class="checkout-desc">
                                    <article class="checkout-detail">
                                        <a href="<?= base_url() ?>?page=product-detail&id=<?= $_SESSION['id'] ?>" class="checkout-name">
                                            <?= $_SESSION['name'] ?>
                                        </a>
                                        <div class="price">
                                            <?php if ($_SESSION['discount'] == null) { ?>
                                                <span class="original"><?= formatRupiah($_SESSION['original']) ?></span>
                                            <?php } else { ?>
                                                <span class="original"><?= formatRupiah($_SESSION['original']) ?></span>
                                                <span class="discount"><?= formatRupiah($_SESSION['discount']) ?></span>
                                            <?php } ?>
                                        </div>
                                        <div class="checkout-optional mt-3">
                                            <?php if (isset($_SESSION['size'])) { ?>
                                                <p class="checkout-size">Ukuran: <?= $_SESSION['size'] ?></p>

                                                <input type="hidden" name="size" value="<?= $_SESSION['size'] ?>">
                                            <?php } ?>

                                            <?php if (isset($_SESSION['color'])) { ?>
                                                <p class="checkout-color">Warna: <?= $_SESSION['color'] ?></p>

                                                <input type="hidden" name="color" value="<?= $_SESSION['color'] ?>">
                                            <?php } ?>

                                            <?php if (isset($_SESSION['weight'])) { ?>
                                                <p class="checkout-weight">Berat: <?= $_SESSION['weight'] ?></p>

                                                <input type="hidden" name="weight" value="<?= $_SESSION['weight'] ?>">
                                            <?php } ?>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="card my-3 mt-4">
                    <div class="card-header font-weight-bold">
                        Alamat Tagihan
                    </div>
                    <div class="card-body section-bg">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">
                                        Nama Awal
                                        <small class="text-danger">*</small>
                                    </label>
                                    <input type="text" class="input-billing form-control" id="firstname" name="firstname" 
                                        placeholder="Masukkan nama awalan kamu" required maxlength="20" 
                                        oninvalid="this.setCustomValidity('Silahkan masukkan nama awal kamu!')" 
                                        oninput="setCustomValidity('')">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname">
                                        Nama Akhir
                                        <small class="text-danger">*</small>
                                    </label>
                                    <input type="text" class="input-billing form-control" id="lastname" name="lastname" 
                                        placeholder="Masukkan nama akhiran kamu" required maxlength="20" 
                                        oninvalid="this.setCustomValidity('Silahkan masukkan nama akhir kamu!')" 
                                        oninput="setCustomValidity('')">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email
                                <small class="text-danger">*</small>
                            </label>
                            <input type="email" class="input-billing form-control" id="email" name="email" 
                                placeholder="Masukkan email kamu" required 
                                oninvalid="this.setCustomValidity('Silahkan masukkan email kamu yang valid!')" 
                                oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="address">
                                Alamat
                                <small class="text-danger">*</small>
                            </label>
                            <input type="text" class="input-billing form-control" id="address" name="address" 
                                placeholder="Masukkan alamat kamu" required 
                                oninvalid="this.setCustomValidity('Silahkan masukkan alamat kamu!')" 
                                oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="wilayah">Wilayah</label>
                            <input type="text" class="input-billing form-control" id="wilayah" name="wilayah"
                            value="<?= $region ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <aside class="checkout-summary card">
                    <div class="card-header font-weight-bold">
                        Ringkasan
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <span>Kuantitas</span>
                                    <span>
                                        <?= $_SESSION['quantity'] ?>
                                        <small class="text-secondary">(<?= formatRupiah($priceQty) ?>)</small>
                                    </span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <span>Pengiriman</span>
                                    <span><?= formatRupiah($shipping) ?></span>
                                </div>
                            </li>
                            <li class="list-group-item" style="border-bottom: 0;">
                                <div class="d-flex justify-content-between">
                                    <span>Pajak</span>
                                    <span>
                                        <?= formatRupiah($tax) ?>
                                        <small class="text-secondary">(5%)</small>
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between font-weight-bold">
                            <span>Total</span>
                            <span id="total"><?= formatRupiah($total) ?></span>
                        </div>
                    </div>
                </aside>

                <aside class="checkout-summary card mt-3">
                    <div class="card-header font-weight-bold">
                        Pembayaran
                    </div>
                    <div class="card-body section-bg">
                        <div class="form-group m-0">
                            <input type="text" class="form-control" id="nominal" placeholder="Nominal uang kamu" required
                                onkeyup="this.value = formatRupiah(this.value, 'Rp')" 
                                oninvalid="this.setCustomValidity('Silahkan masukkan uang kamu')" 
                                oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-block btn-success">Bayar</button>
                    </div>
                </aside>
            </div>
        </form>
    </div>
</section>

<script>    
    $(document).ready(function() {
        var checkoutForm = $(".checkout-form");
        var submitPay = $("button[type='submit']");
        var totalInput = $('input[name="total"]');
        var nominalId = $('#nominal');
        var nominalInput = $('input[name="nominal"]');

        // Ketika form checkout di-submit 
        checkoutForm.submit(function(e) {
            e.preventDefault();

            var regex = /(<([^>]+)>)/ig; // untuk menghilangkan tag html
            var total = parseFloat(totalInput.val());
            var nominal = rupiahToInt(nominalId.val());
            nominalInput.val(nominal);

            if (nominal < total) { // <-- jika uang kurang dari total
                alertify.error("Duuuh, Uang-mu kurang tuh..");
                return; // <-- hentikan proses submit
            } else {
                var isInputValid = true; // <-- Flag untuk menandakan apakah input valid atau tidak

                // Loop melalui setiap input pada form checkout
                checkoutForm.find('input').each(function() {
                    var inputValue = $(this).val(); // Ambil nilai input

                    // Cek apakah nilai input mengandung tag HTML
                    if (regex.test(inputValue)) {
                        alertify.error("Inputan tidak valid! Tidak diperbolehkan menggunakan script HTML.");

                        isInputValid = false; // <-- Set flag menjadi false
                        return; // <-- Hentikan proses submit
                    }
                });

                if (isInputValid) { // <-- Jika input valid
                    submitPay.html("Memproses...");
                    submitPay.attr("disabled", true);

                    setTimeout(function() { // <-- Jalankan proses submit setelah 1 detik
                        checkoutForm.unbind('submit').submit();
                    }, 1000);
                }
            }
        });
    });
</script>