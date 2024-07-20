<footer class="<?= $page == "purchase" ? "d-none" : "" ?>">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3>Tentang</h3>
                    <p><?= $description ?></p>
                </div>
                <div class="col-md-4 footer-menu">
                    <h3>Menu</h3>
                    <ul class="mb-3">
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Hubungi Kami</h3>
                    <ul>
                        <li>
                            <a class="underline" href="javascript:void(0)">
                                <i class="bi bi-telephone"></i>
                                08971231241
                            </a>
                        </li>
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