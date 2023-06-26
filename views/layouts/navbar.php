<header id="header" class="<?= $page == "purchase" ? "d-none" : "" ?>">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        <div class="logo-header">
            <a href="<?= base_url(); ?>"><?= $project_name ?></a>
        </div>

        <nav class="nav-menu d-none d-md-block">
            <?php if ($page != '') { ?>
                <ul>
                    <li class="<?= setActive($param, ['product', 'product-detail', 'checkout']) ?>">
                        <a href="?page=product">Produk</a>
                    </li>
                    <li><a href="<?= base_url(); ?>">Utama</a></li>
                    <li><a href="<?= base_url(); ?>#team">Team</a></li>
                    <li><a href="<?= base_url(); ?>#contact">Kontak</a></li>
                </ul>
            <?php } else { ?>
                <ul class="mainpage">
                    <li class="active"><a href="#about">Tentang</a></li>
                    <li><a href="#produk">Produk</a></li>
                    <li><a href="#team">Team</a></li>
                    <li><a href="#contact">Kontak</a></li>
                    <li>
                        <a class="underline" href="<?= base_url(); ?>?page=product">
                            Semua Produk
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </li>
                </ul>
            <?php } ?>
        </nav>

        <div class="icon-header">
            <button type="button" class="icon" id="btn-paymentinfo" data-toggle="tooltip" title="Cara Pembayaran">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                    <g>
                        <path d="M366.649 364.636h30v76.799h-30zM381.615 344.712c7.846 0 15.363-6.899 15-15-.364-8.127-6.591-15-15-15-7.846 0-15.363 6.899-15 15 .364 8.127 6.591 15 15 15z" fill="#000000" data-original="#000000" class=""></path>
                        <path d="M408.097 255.16V0H65.925C29.574 0 0 28.704 0 65.055v382.96h.317C3.649 483.85 33.875 512 70.565 512H381.81C453.597 512 512 454.467 512 382.681c0-62.784-44.674-115.329-103.903-127.521zm-30.047-2.61c-66.099 1.885-120.009 53.278-125.887 118.319H120.646V29.177H378.05zM65.925 29.177h24.673v341.692H70.565c-15.071 0-29.042 4.765-40.518 12.845V65.055c0-19.784 16.095-35.878 35.878-35.878zm4.64 452.776c-22.342 0-40.518-18.177-40.518-40.518 0-22.342 18.176-40.518 40.518-40.518h182.339a129.087 129.087 0 0 0 6.347 25.68H76.142v30.047h198.593a131.261 131.261 0 0 0 22.951 25.31H70.565zm311.246.87c-55.219 0-100.142-44.924-100.142-100.142s44.923-100.142 100.142-100.142 100.142 44.924 100.142 100.142-44.924 100.142-100.142 100.142z" fill="#000000" data-original="#000000" class=""></path>
                        <path d="M200.796 87.6h100.561v30.047H200.796zM166.828 152.831h168.497v30.047H166.828z" fill="#000000" data-original="#000000" class=""></path>
                    </g>
                </svg>
            </button>
            <button type="button" class="icon" id="btn-theme" data-toggle="tooltip">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 511 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                    <g>
                        <path d="M486.828 307.027C450.09 340.347 402.59 358.7 353.09 358.7c-109.887 0-199.29-89.398-199.29-199.289 0-49.5 18.352-96.996 51.673-133.738 10.304-11.363-.746-29.238-15.536-25.047C81.507 31.34.5 131.207.5 251.391.5 395.42 117.059 512 261.11 512c119.906 0 219.972-80.734 250.765-189.438 4.184-14.757-13.656-25.859-25.047-15.535zM261.11 481.34c-126.793 0-229.949-103.156-229.949-229.95 0-85.132 47.5-162.374 120.067-202.027-18.317 33.504-28.086 71.242-28.086 110.047 0 126.793 103.152 229.95 229.949 229.95 38.808 0 76.543-9.77 110.047-28.087C423.484 433.84 346.242 481.34 261.109 481.34zm0 0" fill="#000000" data-original="#000000" class=""></path>
                        <path d="m254.363 202.36 36.309 18.156 18.156 36.308a15.33 15.33 0 0 0 27.422 0l18.156-36.308 36.309-18.157a15.335 15.335 0 0 0 0-27.425l-36.309-18.153-18.156-36.308a15.331 15.331 0 0 0-13.71-8.477 15.322 15.322 0 0 0-13.712 8.477l-18.156 36.308-36.309 18.153a15.331 15.331 0 0 0 0 27.426zm54.59-20.442a15.319 15.319 0 0 0 6.856-6.856l6.73-13.457 6.73 13.458a15.319 15.319 0 0 0 6.856 6.855l13.457 6.727-13.46 6.73a15.33 15.33 0 0 0-6.852 6.855l-6.73 13.458-6.731-13.458a15.319 15.319 0 0 0-6.856-6.855l-13.457-6.727zM414.41 82.762h15.328V98.09c0 8.469 6.864 15.332 15.332 15.332 8.465 0 15.328-6.863 15.328-15.332V82.762h15.329c8.468 0 15.332-6.864 15.332-15.332 0-8.465-6.864-15.328-15.332-15.328h-15.329V36.77c0-8.465-6.863-15.329-15.328-15.329-8.468 0-15.332 6.864-15.332 15.329v15.332H414.41c-8.469 0-15.332 6.863-15.332 15.328 0 8.468 6.863 15.332 15.332 15.332zm0 0" fill="#000000" data-original="#000000" class=""></path>
                    </g>
                </svg>
            </button>
        </div>
    </div>
</header>