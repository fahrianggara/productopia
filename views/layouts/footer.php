<footer class="<?= $page == "purchase" ? "d-none" : "" ?>">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3>Tentang</h3>
                    <p><?= $project_name ?> adalah sebuah website yang menyediakan berbagai macam produk seperti produk fashion, elektronik dan lain lain yang dapat dibeli secara online.</p>
                </div>
                <div class="col-md-4 footer-menu">
                    <h3>Menu</h3>
                    <ul class="mb-3">
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Hubungi Kami</h3>
                    <ul>
                        <li><a class="underline" href="javascript:void(0)">Facebook</a></li>
                        <li><a class="underline" href="javascript:void(0)">Instagram</a></li>
                        <li><a class="underline" href="javascript:void(0)">Twitter</a></li>
                        <li><a class="underline" href="javascript:void(0)">WhatsApp</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <p>&copy; <?= date('Y') ?> <?= $project_name ?>.</p>
        </div>
    </div>
</footer>