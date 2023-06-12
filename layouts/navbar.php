<header id="header" class="<?= $page == "purchase" ? "d-none" : "" ?>">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        <div class="logo-header">
            <a href="<?= base_url(); ?>">Productopia</a>
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
                        <a class="underline" href="?page=product">Semua Produk
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </li>
                </ul>
            <?php } ?>
            
        </nav>

        <div class="icon-header">
            <button type="button" class="icon" id="btn-theme">
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