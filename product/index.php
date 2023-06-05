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
$countFashiion =0;
     if (!empty($product)) {
        foreach ($product as $row) {
?>          
<?php
    if ($row['category']== "FASHION"){
        $countFashiion++   
?>
                                <li class="product-item">
                                    <a href="javascript:void(0)" class="product">
                                        <div class="product-image">
                                            <span class="product-tag bg-danger"><?=$row['badge']?></span>
                                            <img src="<?=$row['image']?>">
                                            <ul class="product-action">
                                                <li><a href="javascript:void(0)"><i class="fas fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-info">
                                            <span class="category"><?=$row['category']?></span>
                                            <h3 class="product-name"><?=$row['name']?></h3>
                                            <div class="product-price">
                                            <?php
                                            if ($row['discount'] == "") {
                                            ?>
                                                <p class="price">Rp. <?=number_format($row['original'],0,".",".")?></p>
                                            <?php
                                            }else{
                                            ?>
                                                <p class="price">Rp. <?=number_format($row['original'],0,".",".")?></p>
                                                <p class="discount">Rp. <?=number_format($row['discount'],0,".",".")?></p>
                                            <?php
                                            }
                                            ?>
                                            </div>
                                        </div>
                                    </a>
                                </li>
<?php
        }
?>
<?php 
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
?>          
<?php
    if ($row['category']== "ELEKTRONIK"){
        $countElek++;
?>
                                <li class="product-item">
                                    <a href="javascript:void(0)" class="product">
                                        <div class="product-image">
                                            <span class="product-tag bg-danger"><?=$row['badge']?></span>
                                            <img src="<?=$row['image']?>">
                                            <ul class="product-action">
                                                <li><a href="javascript:void(0)"><i class="fas fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-info">
                                            <span class="category"><?=$row['category']?></span>
                                            <h3 class="product-name"><?=$row['name']?></h3>
                                            <div class="product-price">
                                            <?php
                                            if ($row['discount'] == "") {
                                            ?>
                                                <p class="price">Rp. <?=number_format($row['original'],0,".",".")?></p>
                                            <?php
                                            }else{
                                            ?>
                                                <p class="price">Rp. <?=number_format($row['original'],0,".",".")?></p>
                                                <p class="discount">Rp. <?=number_format($row['discount'],0,".",".")?></p>
                                            <?php
                                            }
                                            ?>
                                            </div>
                                        </div>
                                    </a>
                                </li>
<?php
        }
?>
<?php 
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
                        <header class="card-header">
                            Kategori Produk
                        </header>
                        <div class="filter-content">
                            <div class="list-group list-group-flush">
                                <a href="#fashion" data-toggle="tab" class="list-group-item active">Fashion
                                    <span class="count-item"><?=$countFashiion?></span>
                                </a>
                                <a href="#elektronik" data-toggle="tab" class="list-group-item">Elektronik
                                    <span class="count-item"><?=$countElek?></span>
                                </a>
                                <a href="#" data-toggle="tab" class="list-group-item">Olahraga
                                    <span class="count-item">3</span>
                                </a>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="card">
                    <article class="card-group-item">
                        <header class="card-header">
                            Filter Harga
                        </header>
                        <div class="filter-content">
                            <div class="list-group list-group-flush">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label>Min</label>
                                            <input type="number" class="form-control" id="price-min" name="price-min" placeholder="0">
                                        </div>
                                        <div class="form-group col-12 m-0">
                                            <label>Max</label>
                                            <input type="number" class="form-control" id="price-max" name="price-max" placeholder="100000">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

            </aside>
        </div>

    </div>
</section>