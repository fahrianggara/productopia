<section class="mainpage" id="about">
    <div class="container">
        <div class="row flex-row-reverse align-items-center">
            <div class="about-banner col-xl-6 col-lg-6 col-md-6">
                <picture class="about-banner-inner">
                    <img src="assets/images/banner.svg">
                </picture>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="about-text">
                    <h1>Selamat Datang di <u>Productopia</u></h1>
                    <p>
                        Productopia adalah sebuah website yang menyediakan berbagai macam produk seperti produk fashion, elektronik dan olahraga yang dapat
                        dibeli secara online.
                    </p>
                    <a href="#produk" class="btn about-btn">Lihat Produk</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Product Section -->
<section class="section-bg mainpage" id="produk">
    <div class="container">
        <div class="section-title">
            <h2>Produk</h2>
            <p>
                Berikut adalah beberapa produk yang tersedia di Productopia. Jika ingin melihat semua produk, silahkan link ini
                <a class="underline" href="?page=product">
                    Lihat semua produk

                    <i class="fas fa-arrow-right"></i>
                </a>

            </p>
        </div>

        <div class="product-container">
            <ul class="slider product-list">
                <?php if (!empty($product)) {
                    $groupedData = []; // menyimpan data yang dikelompokkan berdasarkan grup
                    
                    foreach ($product as $row) {
                        $group = $row['category']; // Mendapatkan kategori (grup) dari produk

                        if (!isset($groupedData[$group])) { // Jika grup belum ada
                            $groupedData[$group] = []; // Membuat array kosong untuk grup jika belum ada
                        }

                        $groupedData[$group][] = $row; // Menambahkan produk ke dalam array grup yang sesuai
                    }

                    foreach ($groupedData as $group => $data) { // Menampilkan data per grup
                        $count = 0; // Menghitung jumlah data yang sudah ditampilkan dalam satu grup
                
                        foreach ($data as $row) {
                            echo itemProduct($row); // Menampilkan item produk
                            $count++; // Meningkatkan nilai variabel $count setelah setiap data ditampilkan.
                
                            if ($count == 3) {
                                break; // Menghentikan perulangan setelah tiga data ditampilkan
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

<!-- Team Section -->
<section class="mainpage" id="team">
    <div class="container">
        <div class="section-title" style="padding-bottom: 25px;">
            <h2>Our Team</h2>
            <p>
                Tim yang bekerja dibalik layar untuk membuat website productopia.
            </p>
        </div>

        <div class="team-container">
            <ul id="team-list">
                <?php
                if (!empty($teams)) {
                    foreach ($teams as $row) {
                ?>
                        <li class="team-list">
                            <div class="team-inner">
                                <div class="team-avatar">
                                    <img src="<?= $row['image'] ?>" alt="team">

                                    <div class="team-info">
                                        <div class="inner">
                                            <h4 class="team-name"><?= $row['name'] ?></h4>
                                            <span class="team-job"><?= $row['job'] ?></span>
                                        </div>
                                        <div class="social">
                                            <a target="_blank" href="<?= $row['github'] ?>"><i class="fab fa-github"></i></a>
                                            <a target="_blank" href="<?= $row['instagram'] ?>"><i class="fab fa-instagram"></i></a>
                                            <a target="_blank" href="<?= $row['linkdn'] ?>"><i class="fab fa-linkedin"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                <?php
                    }
                }
                ?>
            </ul>

            <div class="team-controls">
                <button class="team-prev"><i class="fas fa-arrow-left"></i></button>
                <button class="team-next"><i class="fas fa-arrow-right"></i></button>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="section-bg mainpage" id="contact">
    <div class="container">
        <div class="section-title">
            <h2>Kontak Kami</h2>
            <p>
                Jika ada pertanyaan, silahkan masukkan pesan pada form dibawah ini. Kami akan segera merespon pesan kamu.
            </p>
        </div>

        <div class="row align-items-center">
            <div class="contact-image col-xl-6 col-lg-6 col-md-12">
                <figure class="contact-image-inner">
                    <img src="assets/images/contact.svg" alt="contact">
                </figure>
            </div>

            <div class="card section-bg  card-body col-xl-6 col-lg-6 col-md-12">
                <!-- <div class=""> -->
                <!-- <div class="card-body"> -->
                <form action="#" autocomplete="off" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama kamu" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" autocomplete="off" name="email" id="email" class="form-control" placeholder="Masukkan email kamu" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="subject">Subjek</label>
                        <input name="subject" id="subject" class="form-control" placeholder="Masukkan subjek pesan" required></input>
                    </div>
                    <div class="form-group">
                        <label for="message">Pesan</label>
                        <textarea name="message" id="message" class="form-control" rows="4" placeholder="Masukkan pesan kamu" required></textarea>
                    </div>
                    <div class="form-group m-0">
                        <button type="submit" class="btn btn-primary">
                            Kirim <i class="fas fa-paper-plane ml-1"></i>
                        </button>
                    </div>
                </form>
                <!-- </div> -->
                <!-- </div> -->
            </div>
        </div>
    </div>
</section>