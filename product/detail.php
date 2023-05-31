<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productopia</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/plugins/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.css">
    <link rel="stylesheet" href="../assets/plugins/tinyslider/tiny-slider.css">
    <link rel="stylesheet" href="../assets/css/d.css">
</head>

<body>
    <header id="header">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="logo-header">
                <a href="javascript:void(0)">Productopia</a>
            </div>

            <nav class="nav-menu d-none d-md-block">
                <ul>
                    <li>
                        <a href="javascript:void(0)">Utama</a>
                    </li>
                    <li class="active"><a href="javascript:void(0)">Produk</a></li>
                    <li><a href="javascript:void(0)">Kontak</a></li>
                    <li><a href="javascript:void(0)">Tentang Kami</a></li>
                </ul>
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
                <button type="button" class="icon" id="btn-keranjang">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                        <g>
                            <path d="M19.334 11.664c0 2.104-1.712 3.815-3.815 3.815s-3.815-1.711-3.815-3.815a1 1 0 1 0-2 0 5.821 5.821 0 0 0 5.815 5.815 5.821 5.821 0 0 0 5.815-5.815 1 1 0 1 0-2 0z" fill="#000000" data-original="#000000" class=""></path>
                            <path d="M23.193 6.815h-1.951C20.766 4.085 18.384 2 15.519 2c-2.865 0-5.246 2.084-5.723 4.815H7.844A2.928 2.928 0 0 0 4.95 9.286L2.715 23.424a4.864 4.864 0 0 0 1.111 3.918 4.84 4.84 0 0 0 3.68 1.695h11.73a1 1 0 1 0 0-2H7.506c-.831 0-1.62-.363-2.161-.995a2.868 2.868 0 0 1-.655-2.307l2.234-14.13c.075-.45.47-.79.92-.79h15.35c.45 0 .845.34.918.783l1.599 10.14a1 1 0 0 0 1.977-.312L26.086 9.28a2.927 2.927 0 0 0-2.894-2.464zM15.52 4c1.755 0 3.222 1.198 3.665 2.815h-7.33C12.297 5.198 13.764 4 15.519 4z" fill="#000000" data-original="#000000" class=""></path>
                            <path d="M25.455 30a1 1 0 0 0 1-1v-1.889h1.889a1 1 0 1 0 0-2h-1.889v-1.889a1 1 0 1 0-2 0v1.89h-1.889a1 1 0 1 0 0 2h1.89V29a1 1 0 0 0 1 1z" fill="#000000" data-original="#000000" class=""></path>
                        </g>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <main id="main">
        <section id="product-detail">
            <div class="container">
                <div class="row">
                    <figure class="image col-xl-6 col-lg-6 col-md-6">
                        <img src="https://www.adidas.co.id/media/catalog/product/h/p/hp6396_8_footwear_photography_detail20view201_grey.jpg">
                    </figure>
                    <article class="col-xl-6 col-lg-6 col-md-6">
                        <p class="category">HOT • FASHION</p>

                        <h1 class="name">CAMPUS 00S SHOES</h1>

                        <div class="price">
                            <span class="original">Rp1.500.000</span>
                            <span class="discount">Rp1.000.000</span>
                        </div>

                        <hr>

                        <div class="description">
                            <p>
                                The Campus first made its name in the '80s when it found a high-profile place in the world of hip hop. This version of the iconic shoes is inspired by the '80s original.
                            </p>

                            <p>
                                Its suede upper is reinforced in high-impact areas, and its no-slip tongue ensures a snug fit. Bounce cushioning provides a springy mix of plush comfort and impact absorption.
                            </p>
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
                                            <li><input type="checkbox" name="size" value="M">M</li>
                                            <li><input type="checkbox" name="size" value="L">L</li>
                                            <li><input type="checkbox" name="size" value="XL">XL</li>
                                        </ul>
                                    </div>

                                    <hr>

                                    <div class="form-group">
                                        <input type="number" name="quantity" value="1" min="1" max="999">
                                        <label>Stok: <b>999</b></label>
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

        <section style="padding-top: 20px ">
            <div class="container">
                <div class="section-title">
                    <h2>Produk Terkait</h2>
                    <p>
                        Produk lainnya yang mungkin kamu suka
                    </p>
                </div>

                <div class="product-container">
                    <ul class="product-list">
                        <li class="product-item">
                            <div class="product">
                                <div class="product-image">
                                    <span class="product-tag bg-danger">Hot</span>
                                    <img src="https://www.adidas.co.id/media/catalog/product/cache/3bec5fdb79d91223b1a151be2b21ce8d/h/t/ht9443_2_apparel_photography_front20center20view_grey.jpg">
                                    <ul class="product-action">
                                        <li><a href="javascript:void(0)"><i class="fas fa-external-link-alt"></i></a>
                                        </li>
                                        <li><a href="javascript:void(0)"><i class="fas fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-info">
                                    <span class="category">Fashion</span>
                                    <h3 class="product-name">Terrex Adasdas</h3>
                                    <div class="product-price">
                                        <p class="price">Rp 12.000.000</p>
                                        <p class="discount">Rp 900.000</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product-item">
                            <div class="product">
                                <div class="product-image">
                                    <span class="product-tag bg-danger">Hot</span>
                                    <img src="https://www.adidas.co.id/media/catalog/product/cache/3bec5fdb79d91223b1a151be2b21ce8d/h/t/ht9443_2_apparel_photography_front20center20view_grey.jpg">
                                    <ul class="product-action">
                                        <li><a href="javascript:void(0)"><i class="fas fa-external-link-alt"></i></a>
                                        </li>
                                        <li><a href="javascript:void(0)"><i class="fas fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-info">
                                    <span class="category">Fashion</span>
                                    <h3 class="product-name">Terrex Adasdas</h3>
                                    <div class="product-price">
                                        <p class="price">Rp 12.000.000</p>
                                        <p class="discount">Rp 900.000</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product-item">
                            <div class="product">
                                <div class="product-image">
                                    <span class="product-tag bg-danger">Hot</span>
                                    <img src="https://www.adidas.co.id/media/catalog/product/cache/3bec5fdb79d91223b1a151be2b21ce8d/h/t/ht9443_2_apparel_photography_front20center20view_grey.jpg">
                                    <ul class="product-action">
                                        <li><a href="javascript:void(0)"><i class="fas fa-external-link-alt"></i></a>
                                        </li>
                                        <li><a href="javascript:void(0)"><i class="fas fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-info">
                                    <span class="category">Fashion</span>
                                    <h3 class="product-name">Terrex Adasdas</h3>
                                    <div class="product-price">
                                        <p class="price">Rp 12.000.000</p>
                                        <p class="discount">Rp 900.000</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product-item">
                            <div class="product">
                                <div class="product-image">
                                    <span class="product-tag bg-danger">Hot</span>
                                    <img src="https://www.adidas.co.id/media/catalog/product/cache/3bec5fdb79d91223b1a151be2b21ce8d/h/t/ht9443_2_apparel_photography_front20center20view_grey.jpg">
                                    <ul class="product-action">
                                        <li><a href="javascript:void(0)"><i class="fas fa-external-link-alt"></i></a>
                                        </li>
                                        <li><a href="javascript:void(0)"><i class="fas fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-info">
                                    <span class="category">Fashion</span>
                                    <h3 class="product-name">Terrex Adasdas</h3>
                                    <div class="product-price">
                                        <p class="price">Rp 12.000.000</p>
                                        <p class="discount">Rp 900.000</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product-item">
                            <div class="product">
                                <div class="product-image">
                                    <span class="product-tag bg-danger">Hot</span>
                                    <img src="https://www.adidas.co.id/media/catalog/product/cache/3bec5fdb79d91223b1a151be2b21ce8d/h/t/ht9443_2_apparel_photography_front20center20view_grey.jpg">
                                    <ul class="product-action">
                                        <li><a href="javascript:void(0)"><i class="fas fa-external-link-alt"></i></a>
                                        </li>
                                        <li><a href="javascript:void(0)"><i class="fas fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-info">
                                    <span class="category">Fashion</span>
                                    <h3 class="product-name">Terrex Adasdas</h3>
                                    <div class="product-price">
                                        <p class="price">Rp 12.000.000</p>
                                        <p class="discount">Rp 900.000</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <div class="product-controls">
                        <button class="product-prev"><i class="fas fa-arrow-left"></i></button>
                        <button class="product-next"><i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h3>Tentang</h3>
                        <p>
                            Productopia adalah sebuah website yang menyediakan berbagai
                            macam produk yang dapat dibeli secara online.
                        </p>
                    </div>
                    <div class="col-md-4">
                        <h3>Menu</h3>
                        <ul class="mb-3">
                            <li><a class="underline active" href="javascript:void(0)">Utama</a></li>
                            <li><a class="underline" href="javascript:void(0)">Produk</a></li>
                            <li><a class="underline" href="javascript:void(0)">Pencarian</a></li>
                            <li><a class="underline" href="javascript:void(0)">Tentang Kami</a></li>
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
                <p>&copy; 2021 Productopia. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <script src="../assets/plugins/bootstrap4/bootstrap.bundle.min.js"></script>
    <script src="../assets/plugins/jquery/sticky/jquery.sticky.js"></script>
    <script src="../assets/plugins/jquery/easing/jquery.easing.min.js"></script>
    <script src="../assets/plugins/tinyslider/tiny-slider.js"></script>
    <script src="../assets/js/a.js"></script>

    <script>
        $(document).ready(function() {
            $('ul.selection-input li').click(function() {
                var isActive = $(this).hasClass('active');

                $('ul.selection-input li').removeClass('active');
                $('ul.selection-input li input').removeAttr('checked');

                if (!isActive) {
                    $(this).addClass('active');
                    $(this).find('input').prop('checked', true);
                }
            });
        });
    </script>
</body>