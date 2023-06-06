<section id="purchase">
    <div class="container">
        <div class="purchase-row row">
            <div class="col-lg-6 col-md-8">
                <div class="purchase-container">
                    <div class="purchase-title">
                        <h3>Halo, Lorem Ipsum👋</h3>
                        <p>Terimakasih telah berbelanja di Productopia!</p>
                    </div>

                    <hr>

                    <div class="purchase-info">
                        <div class="row">
                            <div class="col-7">
                                <p class="heading">Tanggal Pembelian</p>
                                <p class="detail"><?= date("d F Y") ?></p>
                            </div>
                            <div class="col-5">
                                <p class="heading">Order ID</p>
                                <p class="detail">#012j1gAcx2</p>
                            </div>
                        </div>
                    </div>

                    <div class="purchase-pricing">
                        <h3>Ringkasan pembayaran</h3>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <span>Fantech C30 Luminos (1x)</span>
                                    <span>Rp349.000</span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <span>Pengiriman</span>
                                    <span>Rp0</span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <span>Pajak</span>
                                    <span>Rp0</span>
                                </div>
                            </li>
                            <li class="list-group-item mt-2">
                                <div class="d-flex justify-content-between">
                                    <span></span>
                                    <span class="text-primary">Rp349.000</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <br>

                    <div class="purchase-button mb-1">
                        <a href="<?= base_url(); ?>?page=product-detail&id=5" class="btn btn-block btn-success p-1">Beli Lagi</a>
                        <a href="<?= base_url(); ?>" class="btn btn-block btn-primary p-1">Halaman Utama</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $("body").css("overflow", "hidden");
        $("#header").remove();
        $("footer").remove();
        $(".menu-toggle").remove();
    });
</script>