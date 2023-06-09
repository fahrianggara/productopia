<?php
    saveDataWithSession('purchase'); // $_POST to $_SESSION
    
    // Membuat nama lengkap dari session firstname dan lastname
    $fullname = $_SESSION["firstname"] . " " . $_SESSION["lastname"];

    // menghitung harga per kuantitas
    $price = $_SESSION['price'] * $_SESSION['quantity']; 

    // menghitung total harga keseluruhan
    $total = $price + $_SESSION['tax'] + $_SESSION['shipping'];

    // menghitung kembalian
    $change = $_SESSION['nominal'] - $total;

    // data pilihan (color, size, weight) jika ada
    $arrayChoice = array(); // buat array kosong untuk menampung data pilihan

    if (isset($_SESSION['color'])) { // jika ada data color, masukkan ke arrayChoice
        $arrayChoice[] = $_SESSION['color'];  
    }
    if (isset($_SESSION['size'])) { // jika ada data size, masukkan ke arrayChoice
        $arrayChoice[] = $_SESSION['size']; 
    }
    if (isset($_SESSION['weight'])) { // jika ada data weight, masukkan ke arrayChoice
        $arrayChoice[] = $_SESSION['weight']; 
    }
    
    $arrayChoice = array_filter($arrayChoice); // jika ada data kosong, hapus data kosongnya
    $textChoice = implode(", ", $arrayChoice); // gabungkan data menjadi string lalu pisahkan dengan koma
    if (!empty($textChoice)) {  // jika textChoice tidak kosong, tambahkan kurung siku
        $textChoice = "[" . $textChoice . "]";  // Contoh: [Color, Size, Weight]
    }
?>

<section id="purchase">
    <div class="container">
        <div class="purchase-row row">
            <div class="col-lg-6 col-md-8">
                <div class="purchase-container">
                    <div class="purchase-title">
                        <h3>Halo, <?= ucwords($fullname) ?>👋</h3>
                        <p>Terimakasih telah berbelanja di <?= $project_name ?>! jangan lupa berikan bintang 5</p>
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
                                <p class="detail"><?= $_SESSION['order-id'] ?></p>
                            </div>
                        </div>
                        <div class="row" style="margin-top: .8rem;">
                            <div class="col-12">
                                <p class="heading">Alamat Pengiriman</p>
                                <p class="detail"><?= $_SESSION['address'] ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="purchase-pricing">
                        <h3>Informasi pembayaran</h3>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="d-flex align-items-start justify-content-between">
                                    <span class="pr-2">
                                        <?= $_SESSION['name'] ?>
                                        <small class="text-secondary">
                                            <?= $textChoice ?>
                                            (<?= $_SESSION['quantity'] ?>x) 
                                            (<?= formatRupiah($_SESSION['price']) ?>)
                                        </small>
                                    </span>
                                    <span><?= formatRupiah($_SESSION['price'] * $_SESSION['quantity']) ?></span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-start justify-content-between">
                                    <span>
                                        Pengiriman 
                                        <small class="text-secondary">
                                            (<?= ucwords(str_replace('_', ' ', $_SESSION['region'])) ?>)
                                        </small>
                                    </span>
                                    <span><?= formatRupiah($_SESSION['shipping']) ?></span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-start justify-content-between">
                                    <span>
                                        Pajak
                                        <small class="text-secondary">(5%)</small>
                                    </span>
                                    
                                    <span><?= formatRupiah($_SESSION['tax']) ?></span>
                                </div>
                            </li>
                            <li class="list-group-item border-0 pb-0">
                                <table class="float-right mt-1">
                                    <tr>
                                        <td class="pr-3" style="padding: .15rem 0;">Sub Total</td>
                                        <td class="pr-1">:</td>
                                        <td><?= formatRupiah($total) ?></td>
                                    </tr>
                                    <tr>
                                        <td class="pr-3" style="padding: .15rem 0;">Cash</td>
                                        <td class="pr-1">:</td>
                                        <td><?= formatRupiah($_SESSION['nominal']) ?></td>
                                    </tr>                                   
                                    <tr>
                                        <td class="pr-3" style="padding-top: .15rem;">Kembalian</td>
                                        <td class="pr-1">:</td>
                                        <td><?= formatRupiah($change) ?></td>
                                    </tr>
                                </table>
                            </li>
                        </ul>
                    </div>

                    <div class="purchase-button mb-1 mt-4">
                        <a href="<?= base_url(); ?>?page=product-detail&id=<?= $_SESSION['id'] ?>" 
                            class="btn btn-block btn-success p-1">
                            Beli Lagi
                        </a>
                        <a href="<?= base_url(); ?>" class="btn btn-block btn-primary p-1">Halaman Utama</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $(".menu-toggle").remove(); // hapus menu toggle (ketika di layar kecil tablet dan mobile)
    });
</script>