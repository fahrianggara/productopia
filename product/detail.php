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

                <section id="product-detail" style="padding-top: 40px">
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
                                        <span class="original">Rp<?= number_format($row['original'], 0, ".", ".") ?></span>
                                    <?php } else { ?>
                                        <span class="original">Rp<?= number_format($row['original'], 0, ".", ".") ?></span>
                                        <span class="discount">Rp<?= number_format($row['discount'], 0, ".", ".") ?></span>
                                    <?php } ?>
                                </div>

                                <?php if ($row['description'] != "") { ?>
                                    <hr>

                                    <div class="description">
                                        <p><?= $row['description'] ?></p>
                                    </div>
                                <?php } ?>

                                <div class="card">
                                    <div class="card-header font-weight-bold">
                                        Atur Pesanan
                                    </div>
                                    <form action="#">
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

                                            <!-- Subtotal -->
                                            <!-- <div class="form-group m-0 d-flex align-items-center justify-content-between">
                                                <span>Subtotal </span>
                                                <span id="total">
                                                    <?php if ($row['discount'] == "") { ?>
                                                        Rp<?= number_format($row['original'], 0, ".", ".") ?>
                                                    <?php } else { ?>
                                                        Rp<?= number_format($row['discount'], 0, ".", ".") ?>
                                                    <?php } ?>
                                                </span>
                                            </div> -->

                                            <!-- <script>
                                                const quantity = document.querySelector('#quantity');
                                                const total = document.querySelector('#total');
                                                const minQty = document.querySelector('.min-qty');
                                                const plusQty = document.querySelector('.plus-qty');

                                                minQty.addEventListener('click', function() {
                                                    let subtotal = <?= $row['discount'] == "" ? $row['original'] : $row['discount'] ?> * quantity.value;
                                                    let toRupiah = subtotal.toLocaleString('id-ID');
                                                    total.innerHTML = `Rp${toRupiah}`;
                                                });

                                                plusQty.addEventListener('click', function() {
                                                    let subtotal = <?= $row['discount'] == "" ? $row['original'] : $row['discount'] ?> * quantity.value;
                                                    let toRupiah = subtotal.toLocaleString('id-ID');
                                                    total.innerHTML = `Rp${toRupiah}`;
                                                });
                                            </script> -->

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

<section style="padding-top: 20px ">
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
                    $groupedData = []; // menyimpan data yang dikelompokkan berdasarkan grup
                    
                    foreach ($product as $row) {
                        $group = $row['category']; // Mendapatkan kategori (grup) dari produk

                        if (!isset($groupedData[$group])) {
                            $groupedData[$group] = []; // Membuat array kosong untuk grup jika belum ada
                        }

                        $groupedData[$group][] = $row; // Menambahkan produk ke dalam array grup yang sesuai
                    }

                    foreach ($groupedData as $group => $data) {
                        $count = 0; // Menghitung jumlah data yang sudah ditampilkan dalam satu grup
                
                        foreach ($data as $row) {
                            if ($row['id'] != $id && $row['category'] == $category) {
                                echo itemProduct($row); // Menampilkan item produk
                                $count++; // Meningkatkan nilai variabel $count setelah setiap data ditampilkan.
                    
                                if ($count == 6) {
                                    break; // Menghentikan perulangan setelah tiga data ditampilkan
                                }
                            }
                        }
                    }
                } ?>
            </ul>

            <div class="product-controls">
                <button class="product-prev"><i class="fas fa-arrow-left"></i></button>
                <button class="product-next"><i class="fas fa-arrow-right"></i></button>
            </div>
        </div>
    </div>
</section>