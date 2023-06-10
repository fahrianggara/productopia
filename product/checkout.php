<section id="checkout" style="padding: 30px 0;">
    <div class="container">
        <div class="section-title">
            <h2>Checkout</h2>
        </div>
        <?php
            $Subtotal = null;
            $pengiriman = null;

            if (empty($_POST['discount'])){
                $Subtotal = $_POST['original'];
            }else{
                $Subtotal = $_POST['discount'];
            }
            $ppn = $Subtotal * (5 / 100);

            if ($_POST['wilayah'] == "Jabodetabek") {
                $pengiriman = 8000;
            } else if ($_POST['wilayah'] == "Jawa Barat") {
                $pengiriman = 15000;
            } else if ($_POST['wilayah'] == "Jawa Tengah") {
                $pengiriman = 27000;
            } else if ($_POST['wilayah'] == "Jawa Timur") {
                $pengiriman = 29000;
            }
    
            function generateOrderNumber() {
                $prefix = 'PTO';
                $randomNumber = mt_rand(1000, 9999);
                $orderNumber = $prefix . $randomNumber;
            
                return $orderNumber;
            }
            $orderNumber = generateOrderNumber();

        ?>
        <form class="row checkout-form" action="?page=purchase" method="POST" autocomplete="off">

            <input type="hidden" name="id" value="<?=$_POST['id']?>">
            <input type="hidden" name="quantity" value="<?=$_POST['quantity']?>">
            <input type="hidden" name="shipping" value="<?=$pengiriman?>">
            <input type="hidden" name="total" value="<?=$Subtotal?>">
            <input type="hidden" name="tax" value="<?=$ppn?>">
            <input type="hidden" name="name" value="<?=$_POST['name']?>">
            <input type="hidden" name="orderId" value="<?=$orderNumber?>">
            <input type="hidden" name="date" value="<?= date("d F Y") ?>">
            <input type="hidden" name="price" value="<?=$Subtotal?>">
            
            <div class="col-lg-8">
                <div class="checkout-container">
                    <ul class="checkout-list">
                        <li class="checkout-item">
                            <div class="checkout-info">
                                <figure class="checkout-image col-md-4">
                                    <img src="<?=$_POST['image']?>" alt="product-1" class="img-fluid">
                                </figure>
                                <div class="checkout-desc">
                                    <article class="checkout-detail">
                                        <a href="javascript:void(0)" class="checkout-name">
                                            <?=$_POST['name']?>
                                        </a>
                                        <div class="price">
                                            <?php 
                                                if(!empty($_POST['discount'])){
                                            ?>
                                             <span class="original"><?= formatRupiah($_POST['original']) ?></span>
                                             <span class="discount"><?= formatRupiah($_POST['discount']) ?></span><br>
                                             <small><i>Belum termasuk PPN 5%</i></small>
                                            <?php
                                                }else{
                                            ?>
                                             <span class="original"><?= formatRupiah($_POST['original']) ?></span><br>
                                             <small><i>Belum termasuk PPN 5%</i></small>
                                            <?php
                                                }
                                            ?>
                                            
                                        </div>
                                        <div class="checkout-optional mt-3">
                                            <?php 
                                                if (!empty($_POST['size'])){
                                            ?>
                                                <p class="checkout-size">Ukuran: <?=$_POST['size']?></p>
                                            <?php
                                                }
                                            ?>
                                                <p class="checkout-color">Warna: <?=$_POST['color']?></p>
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
                                    <input type="text" class="input-billing form-control" id="firstname" maxlength="10" 
                                        name="firstname" placeholder="Masukkan nama awalan kamu" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname">Nama Akhir</label>
                                    <input type="text" class="input-billing form-control" id="lastname"  maxlength="10"
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
                            <label for="wilayah">Wilayah</label>
                            <input type="text" class="input-billing form-control" name="wilayah" value="<?=$_POST['wilayah']?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <input type="text" class="input-billing form-control" id="address" maxlength="50"
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
                                    <span><?=$_POST['quantity']?></span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <span>Pengiriman</span>
                                    <span id="shipping"></span>
                                </div>
                            </li>
                            <li class="list-group-item" style="border-bottom: 0;">
                                <div class="d-flex justify-content-between">
                                    <span>Pajak</span>
                                    <span id="tax"></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between font-weight-bold">
                            <span>Total</span>
                            <span id="total"></span>
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
        var inputShipping = $("input[name='shipping']");
        var nominalInput = $("input[name='nominal']");
        var quantityInput = $("input[name='quantity']");

        // Set total * quantity
        var total = parseFloat(totalInput.val());
        var quantity = parseFloat(quantityInput.val());
        var shipping = parseFloat(inputShipping.val());
        var ppn = total * (5 / 100)
        var subtotal = total * quantity;
        var Alltotal = subtotal + ppn + shipping;
        document.getElementById("tax").innerHTML = formatRupiah(ppn, "Rp");
        document.getElementById("shipping").innerHTML = formatRupiah(shipping, "Rp");
        totalInput.val(Alltotal);
        $("#total").html(formatRupiah(Alltotal, "Rp"));

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