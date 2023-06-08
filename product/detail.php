<?php
    $category;
    $id = $_GET['id'];

    foreach ($product as $index) {
        if ($index['id'] == $id) {
            $showData = $index;
            break;
        }
    }
?>

<!-- Jika data ditemukan -->
<?php if ($index) { ?>
    <!-- Jika data tidak kosong  -->
    <?php if (!empty($product)) {
        // Looping isi data
        foreach ($product as $row) {
            // Jika id data sama dengan id yang dikirimkan
            if ($row['id'] == $id) { ?>
                <?php
                    $category = $row['category'];

                    function explodeItem($row, $key)
                    {
                        $exp = explode(',', $row[$key]);
                        foreach ($exp as $e) {
                            echo "<li><input type='radio' name='$key' value='$e'>$e</li>";
                        }
                    }
                ?>

                <section id="product-detail" style="padding-top: 40px;">
                    <div class="container">
                        <div class="row">

                            <figure class="image col-xl-6 col-lg-6 col-md-6">
                                <img src="<?= $row['image'] ?>">
                            </figure>

                            <article class="col-xl-6 col-lg-6 col-md-6">

                                <p class="category">
                                    <?php
                                        if ($row['badge']) {
                                            echo $row['badge'] . " •";
                                        }
                                    ?>

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
                                    <form id="orderForm" action="#" method="POST">
                                        <div class="card-body section-bg">

                                            <?php if ($row['size']) { ?>
                                                <div class="form-group">
                                                    <label>Pilih Ukuran: </label>
                                                    <ul class="selection-input">
                                                        <?php explodeItem($row, 'size'); ?>
                                                    </ul>
                                                </div>
                                            <?php } ?>

                                            <?php if ($row['color']) { ?>
                                                <div class="form-group">
                                                    <label>Pilih Warna: </label>
                                                    <ul class="selection-input">
                                                        <?php explodeItem($row, 'color'); ?>
                                                    </ul>
                                                </div>
                                            <?php } ?>

                                            <?php if ($row['weight']) { ?>
                                                <div class="form-group">
                                                    <label>Pilih Berat: </label>
                                                    <ul class="selection-input">
                                                        <?php explodeItem($row, 'weight'); ?>
                                                    </ul>
                                                </div>
                                            <?php } ?>

                                            <div class="form-group mb-0">
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
            <?php
            }
        }
    }
} ?>

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
                <?php if (!empty($product)) {
                    echo groupAndDisplayData($product, $id, $category);
                } ?>
            </ul>

            <div class="product-controls">
                <button class="product-prev"><i class="fas fa-arrow-left"></i></button>
                <button class="product-next"><i class="fas fa-arrow-right"></i></button>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function () {
        var formOrder = $('#orderForm');
        var submitOrder = formOrder.find('.btn-beli');
        var inputSize = formOrder.find("input[name='size']");
        var inputColor = formOrder.find("input[name='color']");
        var inputWeight = formOrder.find("input[name='weight']");

        formOrder.submit(function (e) {
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