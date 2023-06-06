<section id="checkout" style="padding: 30px 0;">
    <div class="container">
        <div class="section-title">
            <h2>Checkout</h2>
        </div>

        <form class="row checkout-form" action="#" method="POST" autocomplete="off">

            <input type="hidden" name="quantity" value="5">
            <input type="hidden" name="shipping" value="0">
            <input type="hidden" name="total" value="100000">
            <input type="hidden" name="tax" value="0">


            <div class="col-lg-8">
                <div class="checkout-container">
                    <ul class="checkout-list">
                        <li class="checkout-item">
                            <div class="checkout-info">
                                <figure class="checkout-image">
                                    <img src="https://images.tokopedia.net/img/cache/200-square/VqbcmM/2023/3/7/f06992e7-2e18-4965-a808-a735f1c4ddbb.jpg" alt="product-1">
                                </figure>
                                <div class="checkout-desc">
                                    <article class="checkout-detail">
                                        <a href="javascript:void(0)" class="checkout-name">
                                            Headset Lenovo Lorem Ipsum Dolor Sit Amet
                                        </a>
                                        <div class="price">
                                            <span class="original">Rp100.000</span>
                                            <span class="discount">Rp50.000</span>
                                        </div>
                                        <div class="checkout-optional mt-3">
                                            <p class="checkout-size">Ukuran: 40</p>
                                            <p class="checkout-color">Warna: Hitam</p>
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
                                    <input type="text" class="input-billing form-control" id="firstname" 
                                        name="firstname" placeholder="Masukkan nama awalan kamu" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname">Nama Akhir</label>
                                    <input type="text" class="input-billing form-control" id="lastname" 
                                        name="lastname" placeholder="Masukkan nama akhiran kamu" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="input-billing form-control" id="email" 
                                name="email" placeholder="Masukkan email kamu" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <input type="text" class="input-billing form-control" id="address" 
                                name="address" placeholder="Masukkan alamat kamu" required>
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
                                    <span>5</span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <span>Pengiriman</span>
                                    <span>Rp0</span>
                                </div>
                            </li>
                            <li class="list-group-item" style="border-bottom: 0;">
                                <div class="d-flex justify-content-between">
                                    <span>Pajak</span>
                                    <span>Rp0</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between font-weight-bold">
                            <span>Total</span>
                            <span id="total">Rp100.000</span>
                        </div>
                    </div>
                </aside>

                <aside class="checkout-summary card mt-3">
                    <div class="card-header font-weight-bold">
                        Pembayaran
                    </div>
                    <div class="card-body section-bg">
                        <div class="form-group m-0">
                            <input type="text" class="form-control" id="nominal" 
                                onkeyup="this.value = formatRupiah(this.value, 'Rp')" 
                                name="nominal" placeholder="999999" required>
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
    function formatRupiah(angka, prefix) {
        var number_string = angka.toString().replace(/[^,\d]/g, ""),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);
        
        if (ribuan) {
            separator = sisa ? "." : ""; 
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? "Rp" + rupiah : "");
    }

    function rupiahToInt(angka) {
        var rupiah = angka.replace(/[^,\d]/g, "");
        return parseInt(rupiah);
    }

    $(document).ready(function() {
        var checkoutForm = $(".checkout-form");
        var submitPay = $("button[type='submit']");
        var totalInput = $("input[name='total']");
        var nominalInput = $("input[name='nominal']");
        var quantityInput = $("input[name='quantity']");

        // Set total * quantity
        var total = parseFloat(totalInput.val());
        var quantity = parseFloat(quantityInput.val());
        var subtotal = total * quantity;
        totalInput.val(subtotal);
        $("#total").html(formatRupiah(subtotal, "Rp"));

        // Ketika form checkout di-submit 
        checkoutForm.submit(function(e) { 
            e.preventDefault();

            var total = parseFloat(totalInput.val());
            var nominal = rupiahToInt(nominalInput.val());

            if (nominal >= total) {
                submitPay.html("Proses...");
                submitPay.attr("disabled", true);

                setTimeout(function() {
                    checkoutForm.unbind("submit").submit();
                }, 2000);
            } else {
                alertify.error("Duuuh, Uang-mu kurang tuh..");
            }
        });
    });
</script>