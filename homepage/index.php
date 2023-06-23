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
                    <h1>Selamat Datang di <u><?= $title ?></u></h1>
                    <p><?= $description ?></p>
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
                Berikut adalah beberapa produk yang tersedia di <?= $title ?>. Jika ingin melihat semua produk, silahkan link ini
                <a class="underline" href="?page=product">
                    Lihat semua produk

                    <i class="fas fa-arrow-right"></i>
                </a>

            </p>
        </div>

        <div class="product-container">
            <ul class="slider product-list">
                <?php if (!empty($products)) {
                    echo groupAndDisplayData($products);
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
                Tim yang bekerja dibalik layar untuk membuat website <?= $title ?>.
            </p>
        </div>

        <div class="team-container">
            <ul id="team-list">
                <?php if (!empty($teams)) { ?>
                    <?php foreach ($teams as $row) { ?>
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
                                            <a <?= ($row['github'] != null) ? "target='_blank' href='{$row['github']}'" : "href='javascript:void(0)'" ?>>
                                                <i class="fab fa-github"></i>
                                            </a>
                                            <a <?= ($row['instagram'] != null) ? "target='_blank' href='{$row['instagram']}'" : "href='javascript:void(0)'" ?>>
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                            <a <?= ($row['linkdn'] != null) ? "target='_blank' href='{$row['linkdn']}'" : "href='javascript:void(0)'" ?>>
                                                <i class="fab fa-linkedin"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                <?php } ?>
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
                <form id="formContact" action="#" autocomplete="off" method="POST">
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
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        var formContact = $('#formContact');
        var submit = formContact.find('button[type="submit"]');

        // ketika formContact di submit
        formContact.on("submit", function(e) { 
            e.preventDefault(); // <== menonaktifkan fungsi default dari form

            submit.html("Mengirim...");
            submit.attr("disabled", true);

            setTimeout(function() {
                submit.html("Kirim <i class='fas fa-paper-plane ml-1'></i>");
                submit.attr("disabled", false);

                alertify.log("Pesan kamu berhasil dikirim");

                formContact[0].reset();
            }, 1000);
        });
    });
</script>