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
                            <div class="col-8">
                                <p class="heading">Tanggal Pembelian</p>
                                <p class="detail"><?= date("d F Y") ?></p>
                            </div>
                            <div class="col-4">
                                <p class="heading">Order ID</p>
                                <p class="detail">#012J1GH</p> <!-- 7string dirandom di checkout -->
                            </div>
                        </div>
                        <div class="row" style="margin-top: .8rem;">
                            <div class="col-12">
                                <p class="heading">Alamat Pengiriman</p>
                                <p class="detail">Jl. Lorem Ipsum Dolor Sit</p>
                            </div>
                        </div>
                    </div>

                    <div class="purchase-pricing">
                        <h3>Informasi pembayaran</h3>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <span>Fantech C30 Luminos (1x)</span>
                                    <span>Rp349.000</span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <span>Pajak</span>
                                    <span>Rp0</span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <span>Pengiriman</span>
                                    <span>Rp0</span>
                                </div>
                            </li>
                            <li class="list-group-item border-0 pb-0">
                                <table class="float-right mt-1">
                                    <tr>
                                        <td class="px-3" style="padding: .15rem 0;">Subtotal</td>
                                        <td class="pr-1">:</td>
                                        <td>Rp349.000</td>
                                    </tr>
                                    <tr>
                                        <td class="px-3" style="padding: .15rem 0;">Cash</td>
                                        <td class="pr-1">:</td>
                                        <td>Rp350.000</td>
                                    </tr>
                                    <tr>
                                        <td class="px-3" style="padding-top: .15rem;">Kembalian</td>
                                        <td class="pr-1">:</td>
                                        <td>Rp1.000</td>
                                    </tr>
                                </table>
                            </li>
                        </ul>
                    </div>

                    <div class="purchase-button mb-1 mt-4">
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