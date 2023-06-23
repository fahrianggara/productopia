<?php
    $category; // <-- digunakan untuk mengambil data kategori didalam perulangan
    $found = false; // <-- digunakan untuk mengecek apakah data ditemukan atau tidak
?>

<?php if (!empty($products)) { ?>

    <?php foreach ($products as $row) { ?>

        <?php if ($row['id'] == $id) { ?>

            <?php
                $category = $row['category'];
                $found = true;
            ?>

            <section id="product-detail">
                <div class="container">
                    <div class="row">

                        <figure class="col-xl-6 col-lg-6 col-md-6">
                            <img src="<?= $row['image'] ?>">
                            <span class="sc-img">Sumber Gambar : <?=$row['source-img']?></span>
                        </figure>

                        <article class="col-xl-6 col-lg-6 col-md-6">
                            <p class="category">
                                <?php if (!empty($row['badge'])) echo $row['badge'] . " •"; ?>

                                <?= $row['category'] ?>
                            </p>

                            <h1 class="name"><?= $row['name'] ?></h1>

                            <div class="price <?= $row['description'] == "" ? "mb-4" : "" ?>">
                                <?php if ($row['discount'] == "") { ?>
                                    <span class="original"><?= formatRupiah($row['original']) ?></span>
                                <?php } else { ?>
                                    <span class="original"><?= formatRupiah($row['original']) ?></span>
                                    <span class="discount"><?= formatRupiah($row['discount']) ?></span>
                                <?php } ?>
                            </div>

                            <?php if ($row['description'] != "") { ?>
                                <hr class="rule-detail">

                                <div class="description">
                                    <p><?= $row['description'] ?></p>
                                </div>
                            <?php } ?>

                            <div class="card">
                                <div class="card-header font-weight-bold">
                                    Atur Pesanan
                                </div>
                                <form id="orderForm" action="?page=checkout" method="POST">
                                    <input type="hidden" value="<?= $row['image'] ?>" name="image">
                                    <input type="hidden" value="<?= $row['source-img'] ?>" name="source-img">
                                    <input type="hidden" value="<?= $row['name'] ?>" name="name">
                                    <input type="hidden" value="<?= $row['id'] ?>" name="id">
                                    <input type="hidden" value="<?= $row['original'] ?>" name="original">
                                    <input type="hidden" value="<?= $row['discount'] == null ? "" : $row['discount'] ?>" name="discount">
                                    <input type="hidden" value="checkout" name="checkout">

                                    <div class="card-body section-bg">

                                        <?php if ($row['size']) { ?>
                                            <div class="form-group">
                                                <label>Pilih Ukuran: </label>
                                                <ul class="selection-input">
                                                    <?php explodeItemSelection($row, 'size'); ?>
                                                </ul>
                                            </div>
                                        <?php } ?>

                                        <?php if ($row['color']) { ?>
                                            <div class="form-group">
                                                <label>Pilih Warna: </label>
                                                <ul class="selection-input">
                                                    <?php explodeItemSelection($row, 'color'); ?>
                                                </ul>
                                            </div>
                                        <?php } ?>

                                        <?php if ($row['weight']) { ?>
                                            <div class="form-group">
                                                <label>Pilih Berat: </label>
                                                <ul class="selection-input">
                                                    <?php explodeItemSelection($row, 'weight'); ?>
                                                </ul>
                                            </div>
                                        <?php } ?>

                                        <div class="form-group">
                                            <label>Kuantitas: </label>

                                            <div class="qty">
                                                <button type="button" class="min-qty" onclick="this.parentNode.querySelector('#quantity').stepDown()">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <div class="form-outline">
                                                    <input id="quantity" min="1" max="10" name="quantity" value="1" type="number" class="form-control" readonly />
                                                </div>
                                                <button type="button" class="plus-qty" onclick="this.parentNode.querySelector('#quantity').stepUp()">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="region">Wilayah Pengiriman: </label>
                                            <select class="input-billing form-control" id="region" name="region" required>
                                                <option value="jabodetabek">Jabodetabek</option>
                                                <option value="jawa_barat">Jawa Barat</option>
                                                <option value="jawa_tengah">Jawa Tengah</option>
                                                <option value="jawa_timur">Jawa Timur</option>
                                                <option value="luar_jawa">Luar Jawa</option>
                                                <option value="luar_negeri">Luar Negeri</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-sm btn-beli btn-primary">
                                            Beli Sekarang
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </article>

                    </div>
                </div>
            </section>

        <?php break; } // <-- end if ($row['id'] == $id) ?>

    <?php } // <-- end foreach ($products as $row) ?>

<?php } // <-- end if (!empty($products)) ?>

<?php 
    if (!$found) { // <-- jika data tidak ditemukan maka akan diarahkan ke halaman product
        echo "<script>window.location.href = '". base_url() ."?page=product';</script>"; // <-- digunakan untuk mengarahkan ke halaman tertentu
        $_SESSION['message'] = "Maaf.. Produk tersebut tidak ditemukan!"; // <-- kasih pesan
    }
?>

<section style="padding-top: 30px;">
    <div class="container">
        <div class="section-title">
            <h2>Produk Terkait</h2>
            <p>
                Produk lainnya yang mungkin kamu suka
            </p>
        </div>

        <div class="product-container">
            <ul class="slider product-list">

                <?php if (!empty($products)) {
                    echo groupAndDisplayData($products, $id, $category);
                } ?>

            </ul>

            <div class="product-controls">
                <button class="product-prev"><i class="fas fa-arrow-left"></i></button>
                <button class="product-next"><i class="fas fa-arrow-right"></i></button>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function() {
        var formOrder = $('#orderForm');
        var submitOrder = formOrder.find('.btn-beli');
        var inputSize = formOrder.find("input[name='size']");
        var inputColor = formOrder.find("input[name='color']");
        var inputWeight = formOrder.find("input[name='weight']");

        formOrder.submit(function(e) {
            e.preventDefault();

            // jika radio button tidak ada yang terpilih kasih alert
            if (inputSize.length > 0 && !inputSize.is(':checked')) {
                alertify.error('Pilih ukuran terlebih dahulu');
                return;
            } else if (inputColor.length > 0 && !inputColor.is(':checked')) {
                alertify.error('Pilih warna terlebih dahulu');
                return;
            } else if (inputWeight.length > 0 && !inputWeight.is(':checked')) {
                alertify.error('Pilih berat terlebih dahulu');
                return;
            }

            this.submit();
        });
    });
</script>