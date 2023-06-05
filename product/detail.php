<?php 
    $id = $_GET['id'];
    foreach ($product as $index) {
        if ($index['id'] == $id) {
            $editData = $index;
            break;
        }
    }
?>
<?php 
if ($index) {
?>
        <?php 
            if (!empty($product)) {
                foreach ($product as $row) {
                    if($row['id'] == $id){
        ?>
            <section id="product-detail" style="padding-top: 30px">
                <div class="container">
                    <div class="row">
                        <figure class="image col-xl-6 col-lg-6 col-md-6">
                            <img src="<?=$row['image']?>">
                        </figure>
                        <article class="col-xl-6 col-lg-6 col-md-6">
                            
                            <p class="category">
                                <?php
                                    if ($row['badge']) {
                                        echo $row['badge']. " •";
                                    }                                
                                ?>                                
                                <?=$row['category']?>
                            </p>

                            <h1 class="name"><?=$row['name']?></h1>

                            <div class="price">
                                <?php
                                if ($row['discount'] == "") {
                                ?>
                                    <span class="original">Rp. <?=number_format($row['original'],0,".",".")?></span>
                                <?php
                                }else{
                                ?>
                                    <span class="original">Rp. <?=number_format($row['original'],0,".",".")?></span>
                                    <span class="discount">Rp. <?=number_format($row['discount'],0,".",".")?></span>
                                <?php
                                }
                                ?>
                            </div>

                            <hr>

                            <div class="description">
                                <?=$row['description']?>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    Atur Pesanan
                                </div>
                                <form action="#">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Pilih Ukuran: </label>
                                            <ul class="selection-input">
                                                <li><input type="radio" name="size" value="M">M</li>
                                                <li><input type="radio" name="size" value="L">L</li>
                                                <li><input type="radio" name="size" value="XL">XL</li>
                                            </ul>
                                        </div>

                                        <div class="form-group">
                                            <label>Pilih Warna: </label>
                                            <ul class="selection-input">
                                                <li><input type="radio" name="color" value="Black">Black</li>
                                                <li><input type="radio" name="color" value="White">White</li>
                                                <li><input type="radio" name="color" value="Red">Red</li>
                                            </ul>
                                        </div>

                                        <div class="form-group">
                                            <label>Stok: <b><?=$row['stock']?></b></label>

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

                                        <hr>

                                        <!-- Subtotal -->
                                        <div class="form-group m-0 d-flex align-items-center justify-content-between">
                                            <span>Subtotal </span>
                                            <span id="total">Rp1.000.000</span>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-primary btn-sm btn-keranjang">
                                            <i class="fas fa-plus mr-1"></i> Keranjang
                                        </button>
                                        <button class="btn btn-sm btn-beli btn-success">
                                            <i class="fas fa-shopping-cart mr-1"></i> Beli
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
}
?>







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
            <?php 
     if (!empty($product)) {
        foreach ($product as $row) {
?>
                <li class="product-item">
                    <a href="?page=product-detail&id=<?=$row['id']?>" class="product">
                        <div class="product-image">
                            <span class="product-tag bg-danger"><?=$row['badge']?></span>
                            <img src="<?=$row['image']?>">
                            <ul class="product-action">
                                <li><a href=""><i class="fas fa-shopping-cart"></i></a></li>
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
    }
?>
            </ul>

            <div class="product-controls">
                <button class="product-prev"><i class="fas fa-arrow-left"></i></button>
                <button class="product-next"><i class="fas fa-arrow-right"></i></button>
            </div>
        </div>
    </div>
</section>