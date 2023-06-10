<?php
    $file = 'data/purchase.json';
    // Mendapatkan file json
    $purchase = file_get_contents($file);
    // Mendecode anggota.json
    $data = json_decode($purchase, true); 
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $orderId = $_POST['orderId'];
        $firstname = $_POST['firstname'];
        $date = $_POST['date'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $wilayah = $_POST['wilayah'];
        $address = $_POST['address'];
        $tax = $_POST['tax'];
        $quantity = $_POST['quantity'];
        $shipping = $_POST['shipping'];
        $total = $_POST['total'];
        $nominal = $_POST['nominal'];
    
        // Menambahkan data baru ke dalam array
        $newData = array(
            'orderId' => $orderId,
            'date' => $date,
            'name' => $name,
            'price' => $price,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'wilayah' => $wilayah,
            'address' => $address,
            'tax' => $tax,
            'quantity' => $quantity,
            'shipping' => $shipping,
            'total' => $total,
            'nominal' => $nominal
        );
        $data[] = $newData;
    }
    $jsonfile = json_encode($data, JSON_PRETTY_PRINT);

    $purchase = file_put_contents($file, $jsonfile);
    
?>
<section id="purchase">
    <div class="container">
        <?php 
            if (!$data) {
                $data = array();
            }

            $orderId = $_POST['orderId'];

            foreach($data as $row){
                if ($row['orderId'] == $orderId) {
                    $showData = $row;
                    break;
                }
            }
            

            if ($row) {
                $nominal = $row['nominal'];
                $price = $row['price'];
                $cleanNominal = str_replace(array("Rp", "."), "", $nominal);
                $cleanPrice = str_replace(array("Rp", "."), "", $price);
                $qtyAndPrice = (int)$cleanPrice * (int)$row['quantity'];
                $kembali = (int)$cleanNominal - (int)$row['total'];
        ?>
        <div class="purchase-row row">
            <div class="col-lg-6 col-md-8">
                <div class="purchase-container">
                    <div class="purchase-title">
                        <h3>Halo, <?=$row['firstname']?>  <?=$row['lastname']?>👋</h3>
                        <p>Terimakasih telah berbelanja di Productopia!</p>
                    </div>

                    <hr>

                    <div class="purchase-info">
                        <div class="row">
                            <div class="col-8">
                                <p class="heading">Tanggal Pembelian</p>
                                <p class="detail"><?=$row['date']?></p>
                            </div>
                            <div class="col-4">
                                <p class="heading">Order ID</p>
                                <p class="detail"><?=$row['orderId']?></p> <!-- 7string dirandom di checkout -->
                            </div>
                        </div>
                        <div class="row" style="margin-top: .8rem;">
                            <div class="col-12">
                                <p class="heading">Alamat Pengiriman</p>
                                <p class="detail"><?=$_POST['address']?></p>
                            </div>
                        </div>
                    </div>

                    <div class="purchase-pricing">
                        <h3>Informasi pembayaran</h3>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <span><?=$row['name']?> (<?=$row['quantity']?>x)</span>
                                    <span><?= formatRupiah((int)$qtyAndPrice)?></span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <span>Pajak</span>
                                    <span><?= formatRupiah($row['tax'])?></span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <span>Pengiriman</span>
                                    <span><?= formatRupiah($row['shipping'])?></span>
                                </div>
                            </li>
                            <li class="list-group-item border-0 pb-0">
                                <table class="float-right mt-1">
                                    <tr>
                                        <td class="px-3" style="padding: .15rem 0;">Subtotal</td>
                                        <td class="pr-1">:</td>
                                        <td><?=formatRupiah($row['total'])?></td>
                                    </tr>
                                    <tr>
                                        <td class="px-3" style="padding: .15rem 0;">Cash</td>
                                        <td class="pr-1">:</td>
                                        <td><?=formatRupiah((int)$cleanNominal)?></td>
                                    </tr>
                                    <tr>
                                        <td class="px-3" style="padding-top: .15rem;">Kembalian</td>
                                        <td class="pr-1">:</td>
                                        <td><?=formatRupiah($kembali)?></td>
                                    </tr>
                                </table>
                            </li>
                        </ul>
                    </div>

                    <div class="purchase-button mb-1 mt-4">
                        <a href="<?= base_url(); ?>?page=product-detail&id=<?=$_POST['id']?>" class="btn btn-block btn-success p-1">Beli Lagi</a>
                        <a href="<?= base_url(); ?>" class="btn btn-block btn-primary p-1">Halaman Utama</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        }else{
            echo "<h1>404 Not Found</h1>";
        }
    ?>
</section>

<script>
    $(document).ready(function() {
        $("body").css("overflow", "hidden");
        $("#header").remove();
        $("footer").remove();
        $(".menu-toggle").remove();
    });
</script>