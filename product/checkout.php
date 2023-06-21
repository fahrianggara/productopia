<?php
    saveDataWithSession('quantity');

    // add shipping cost
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

    // generate random for order Id
    $orderId = "PT#" . rand(10000, 99999);

    // if discount is null, use original price else use discount price
    $_SESSION['discount'] == null ? $price = $_SESSION['original'] : $price = $_SESSION['discount'];

    // calculate tax, price * 5%
    $tax = $price * 0.05;

    // calculate total price and quantity
    $priceQty = $price * $_SESSION['quantity'];

    // calculate total
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
            <input type="hidden" name="qty" value="<?= $_SESSION['quantity'] ?>">
            <input type="hidden" name="shipping" value="<?= $shipping ?>">
            <input type="hidden" name="tax" value="<?= $tax ?>">
            <input type="hidden" name="order-id" value="<?= $orderId ?>">
            <input type="hidden" name="total" value="<?= $total ?>">
            <input type="hidden" name="region" value="<?= $_SESSION['region'] ?>">
            <input type="hidden" name="nominal">
 
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
                                        <a href="javascript:void(0)" class="checkout-name">
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
                                                <p class="checkout-weight">Jumlah: <?= $_SESSION['weight'] ?></p>

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
                                    <label for="firstname">Nama Awal</label>
                                    <input type="text" class="input-billing form-control" id="firstname" name="firstname" 
                                        placeholder="Masukkan nama awalan kamu" required maxlength="20">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname">Nama Akhir</label>
                                    <input type="text" class="input-billing form-control" id="lastname" name="lastname" 
                                        placeholder="Masukkan nama akhiran kamu" required maxlength="20">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="input-billing form-control" id="email" name="email" 
                                placeholder="Masukkan email kamu" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <input type="text" class="input-billing form-control" id="address" name="address" 
                                placeholder="Masukkan alamat kamu" required>
                        </div>
                        <div class="form-group">
                            <label for="wilayah">Wilayah</label>
                            <input type="text" class="input-billing form-control" id="wilayah" name="wilayah"
                            value="<?= ucwords(str_replace('_', ' ', $_SESSION['region'])) ?>" readonly>
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
                                    <span><?= formatRupiah($tax) ?></span>
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
                            <input type="text" class="form-control" id="nominal" placeholder="999999" required
                                onkeyup="this.value = formatRupiah(this.value, 'Rp')">
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
    /**
     * Memformat angka menjadi format rupiah 
     *
     * @param {int} angka
     * @param {string} prefix
     */
    function formatRupiah(angka, prefix) {
        var number_string = angka.toString().replace(/[^,\d]/g, ""); // <-- Menghapus karakter selain digit dan koma
        var split = number_string.split(","); // <-- Memisahkan string angka berdasarkan koma
        var sisa = split[0].length % 3; // <-- Menyimpan sisa dari panjang angka saat dibagi 3
        var rupiah = split[0].substr(0, sisa); // <-- Mengambil sebagian angka dari awal hingga sisa karakter pertama
        var ribuan = split[0].substr(sisa).match(/\d{3}/gi); // <-- Memisahkan angka menjadi grup tiga digit setelah karakter sisa
        
        if (ribuan) {
            separator = sisa ? "." : "";  // <-- Menambahkan separator setiap 3 digit
            rupiah += separator + ribuan.join("."); // <-- Menggabungkan angka yang sudah dipisah
        } 

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah; // <-- Tambahkan koma dan bagian desimal ke rupiah, jika tidak, rupiah tetap sama
        return prefix == undefined ? rupiah : (rupiah ? "Rp" + rupiah : ""); // <-- Tambahkan "Rp" pada awal rupiah jika tidak kosong, jika kosong kembalikan string kosong
    }
    
    /**
     * Mengubah format rupiah menjadi angka
     *
     * @param {string} angka
     */
    function rupiahToInt(angka) {
        var rupiah = angka.replace(/[^,\d]/g, ""); // <-- Menghapus karakter selain digit dan koma
        return parseInt(rupiah); // <-- Mengembalikan nilai berupa integer
    }

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

            if (nominal <= total) {
                alertify.error("Duuuh, Uang-mu kurang tuh..");
                return false; // <-- Submit Form
            } else {
                var isInputValid = true; // <-- Flag untuk menandakan apakah input valid atau tidak

                // Loop melalui setiap input pada form checkout
                checkoutForm.find('input').each(function() {
                    var inputValue = $(this).val(); // Ambil nilai input

                    // Cek apakah nilai input mengandung tag HTML
                    if (regex.test(inputValue)) {
                        alertify.error("Inputan tidak valid! Tidak diperbolehkan menggunakan script HTML.");

                        isInputValid = false; // <-- Set flag menjadi false
                        return false; // <-- Submit Form
                    }
                });

                if (isInputValid) { // <-- Jika input valid
                    submitPay.html("Memproses...");
                    submitPay.attr("disabled", true);

                    setTimeout(function() {
                        checkoutForm.unbind('submit').submit();
                    }, 1000);
                }
            }
        });
    });
</script>