<section id="all-product" style="padding-top: 40px;">
    <div class="container">

        <!-- Header -->
        <div class="row flex-row-reverse">
            <article class="col-md-8">
                <div class="tab-content">

                    <div id="fashion" class="tab-pane fade show active">
                        <div class="product-container">
                            <ul class="product-list grid grid-sm">
                                <?php
                                    $countFashion = 0;
                                    if (!empty($product)) {
                                        foreach ($product as $row) {
                                            if ($row['category'] == "fashion") {
                                                $countFashion++;

                                                echo itemProduct($row);
                                            }
                                        }
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>

                    <div id="elektronik" class="tab-pane fade">
                        <div class="product-container">
                            <ul class="product-list grid grid-sm">
                                <?php
                                    $countElek = 0;
                                    if (!empty($product)) {
                                        foreach ($product as $row) {
                                            if ($row['category'] == "elektronik") {
                                                $countElek++;

                                                echo itemProduct($row);
                                            }
                                        }
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>

                    <div id="sports" class="tab-pane fade">
                        <div class="product-container">
                            <ul class="product-list grid grid-sm">
                                <?php
                                    $countOg = 0;
                                    if (!empty($product)) {
                                        foreach ($product as $row) {
                                            if ($row['category'] == "sports") {
                                                $countOg++;

                                                echo itemProduct($row);
                                            }
                                        }
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>

                </div>
            </article>

            <aside class="col-md-4">
                <div class="card mb-3">
                    <article class="card-group-item">
                        <header class="card-header font-weight-bold">
                            Kategori Produk
                        </header>
                        <div class="filter-content">
                            <div class="list-group list-group-flush">
                                <a href="#fashion" data-toggle="tab" class="list-group-item active">Fashion
                                    <span class="count-item"><?= $countFashion ?></span>
                                </a>
                                <a href="#elektronik" data-toggle="tab" class="list-group-item">Elektronik
                                    <span class="count-item"><?= $countElek ?></span>
                                </a>
                                <a href="#sports" data-toggle="tab" class="list-group-item">Sports
                                    <span class="count-item"><?= $countOg ?></span>
                                </a>
                            </div>
                        </div>
                    </article>
                </div>

            </aside>
        </div>

    </div>
</section>