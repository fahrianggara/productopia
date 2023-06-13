<?php
    $categories = []; // <-- Membuat array kosong untuk menampung kategori
    $productCount = []; // <-- Membuat array kosong untuk menampung jumlah produk per kategori

    if (!empty($products)) {
        foreach ($products as $row) {
            $category = $row['category'];
            if (!in_array($category, $categories)) { // <-- Jika kategori belum ada di array $categories
                $categories[] = $category; // <-- Tambahkan kategori ke array $categories
                $productCount[$category] = 1; // <-- Tambahkan jumlah produk ke array $productCount
            } else { // <-- Jika kategori sudah ada di array $categories
                $productCount[$category]++; // <-- Tambahkan jumlah produk ke array $productCount
            }
        }
    }
?>

<section id="all-product" style="padding-top: 40px;">
    <div class="container">

        <!-- Header -->
        <div class="row flex-row-reverse">
            <article class="col-md-8">
                <div class="tab-content">

                    <?php foreach ($categories as $category) { ?>
                        <div id="<?= $category ?>" class="tab-pane fade show 
                            <?= $category == $categories[0] ? 'active' : '' ?>">

                            <div class="product-container">
                                <ul class="product-list grid grid-sm">
                                    <?php if (!empty($products)) { ?>
                                        <?php foreach ($products as $row) { ?>
                                            <?php if ($row['category'] == $category) { ?>
                                                <?= itemProduct($row) ?>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                </ul>
                            </div>

                        </div>
                    <?php } ?>

                </div>
            </article>

            <aside class="col-md-4">
                <div class="card mb-3">
                    <article class="card-group-item">
                        <header class="card-header font-weight-bold">
                            Kategori Produk
                        </header>
                        <div class="filter-content">
                            <div class="list-group list-group-flush" style="border-radius: 8px;">
                                <?php foreach ($categories as $category) { ?>
                                    <a href="#<?= $category ?>" data-toggle="tab" 
                                        class="list-group-item <?= $category == $categories[0] ? 'active' : '' ?>">

                                        <?= ucfirst($category) ?>
                                        <span class="count-item"><?= $productCount[$category] ?></span>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </article>
                </div>
            </aside>
        </div>

    </div>
</section>

<script>
    $(document).ready(function() {
        if ($(window).width() <= 768.98) {
            $(".list-group-item").click(function() {
                $("html, body").animate({
                    scrollTop: 0
                }, 1000, 'easeInOutExpo');
            });
        }
    });
</script>
