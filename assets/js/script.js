/**
 * Memformat angka menjadi format rupiah 
 *
 * @param {int} angka
 * @param {string} prefix
 */
function formatRupiah(angka, prefix) {
    var number_string = angka.toString().replace(/[^,\d]/g, ''), // 23456789 (Harus digit dan koma aja)
        split         = number_string.split(','), // [23, 456, 789] (Dipisah berdasarkan koma)
        sisa          = split[0].length % 3, // 23|456|789 (Sisa 2)
        rupiah        = split[0].substr(0, sisa), // 23 (Ambil 2 digit pertama, agar bisa dibagi ribuannya)
        ribuan        = split[0].substr(sisa).match(/\d{3}/gi); // [456, 789] (Ambil per 3 digit, lalu dijadikan array)

    if (ribuan) { // jika ribuan ada
        // jika sisa ada, maka tambahkan titik, jika tidak ada, maka kosongkan untuk menghindari angka awal titik .456.789
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.'); // 23 += . + 456.789 => 23.456.789 (Digabungkan)
    }

    if (split[1] != undefined) { // jika ada angka dibelakang koma
        rupiah += ',' + split[1]; // 23.456.789,99
    } else { // jika tidak ada angka dibelakang koma
        rupiah; // 23.456.789
    }

    if (prefix == undefined) { // jika prefix tidak diset
        return rupiah; // 23.456.789
    } else { // jika prefix diset
        if (rupiah == '') { // jika rupiah kosong
            return ''; // kosong
        } else { // jika rupiah tidak kosong
            return 'Rp' + rupiah; // Rp23.456.789
        }
    }
}

/**
 * Mengubah format rupiah menjadi angka
 *
 * @param {string} angka
 */
function rupiahToInt(angka) {
    var rupiah = angka.replace(/[^,\d]/g, ""); // <-- Menghapus karakter selain digit dan koma
    return parseInt(rupiah); // <-- Mengembalikan nilai berupa integer
}

/**
 * Menjalankan fungsi anonim dengan argumen jQuery sebagai $ menggunakan IIFE (Immediately Invoked Function Expression).
 * Fungsi anonim tidak berisi implementasi kode.
 */
!(function ($) {
    "use strict"; // <-- Mengaktifkan mode strict pada JavaScript untuk mencegah penggunaan variabel yang belum dideklarasikan.

    $("#header").sticky({ // <-- Membuat header menjadi sticky(terpaku) pada posisi atas layar.
        topSpacing: 0,
        zIndex: '50'
    });

    /**
     * Membuat efek transisi pada header ketika di-scroll.
     */
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();

        if (scroll >= 1) { // <-- Jika posisi scroll lebih dari atau sama dengan 1px maka akan menambahkan class on-scroll pada elemen header.
            $("#header").addClass("on-scroll");
        } else {
            $("#header").removeClass("on-scroll");
        }

        if (scroll > 100) {  // <-- Membuat tombol "to-the-top" muncul ketika posisi scroll lebih dari 100px.
            $(".to-the-top").show('fade');
        } else {
            $(".to-the-top").hide('fade');
        }
    });

    /**
     * Membuat animasi scroll ke atas ketika tombol "to-the-top" diklik.
     */
    $(".to-the-top").click(function () {

        $('html, body').animate({ // <-- Membuat animasi scroll ke atas.
            scrollTop: 0
        }, 1300, 'easeInOutExpo');

        return false; // <-- Menghentikan aksi default dari elemen yang diklik.
    });

    /**
     * Membuat fungsi untuk menyembunyikan menu mobile.
     */
    function hideMobile() {
        if ($('body').hasClass('mobile-nav-active')) { // <-- Mengecek apakah body memiliki class mobile-nav-active?
            $('body').removeClass('mobile-nav-active');
            $('.mobile-nav-overlay').fadeOut();
            $('.menu-toggle').removeClass('active');
        }
    }

    /**
     * Membuat animasi scroll ke elemen yang dituju ketika elemen yang memiliki class 
     * mainpage a, mobile-nav a, footer-menu a, about-text a diklik.
     */
    var scrolltoOffset = $('#header').outerHeight(); // <-- Mengambil tinggi elemen header.
    $(document).on('click', '.nav-menu .mainpage a, .mobile-nav a, .footer-menu a, .about-text a', function (e) {
        var clickedPathname = this.pathname.replace(/^\//, ''); // <-- Mengambil pathname dari elemen yang diklik.
        var currentPathname = location.pathname.replace(/^\//, ''); // <-- Mengambil pathname dari halaman saat ini.
        var clickedHostname = this.hostname; // <-- Mengambil hostname dari elemen yang diklik.
        var currentHostname = location.hostname; // <-- Mengambil hostname dari halaman saat ini.

        /* Mengecek apakah pathname dan hostname dari elemen yang diklik sama dengan pathname 
        dan hostname dari halaman saat ini? */
        if (clickedPathname === currentPathname && clickedHostname === currentHostname) {
            var target = $(this.hash); // <-- Membuat variabel target yang berisi elemen yang dituju.

            if (target.length) { // <-- Mengecek apakah elemen yang dituju ada?
                e.preventDefault(); // <-- Menghentikan aksi default dari elemen yang diklik.

                var scrollto = target.offset().top - scrolltoOffset; // <-- Mengambil posisi elemen yang dituju.

                if ($(this).attr("href") == '#header') { // <-- Mengecek apakah elemen yang dituju adalah header?
                    scrollto = 0; // <-- Maka posisi elemen yang dituju adalah 0.
                }

                $('html, body').animate({ // <-- Membuat animasi scroll ke elemen yang dituju.
                    scrollTop: scrollto
                }, 1500, 'easeInOutExpo');

                if ($(this).parents('.nav-menu, .mobile-nav').length) { // <-- Mengecek apakah elemen yang diklik memiliki parent dengan class nav-menu atau mobile-nav?
                    $('.nav-menu .active, .mobile-nav .active').removeClass('active'); // <-- Menghapus class active dari elemen yang memiliki class nav-menu atau mobile-nav.
                    $(this).closest('li').addClass('active'); // <-- Menambahkan class active pada elemen yang memiliki parent dengan class nav-menu atau mobile-nav.
                }

                hideMobile(); // <-- Menjalankan fungsi hideMobile().

                return false; // <-- Menghentikan aksi default dari elemen yang diklik.
            }
        }
    });

    /**
     * Membuat mobile navigation.
     */
    if ($(".nav-menu").length) { // <-- Mengecek apakah elemen dengan class nav-menu ada?
        var $footer_menu = $(".nav-menu ul li").clone(); // <-- Membuat variabel $footer_menu yang berisi elemen dengan class nav-menu ul li.
        var $mobile_nav = $(".nav-menu").clone().prop({ // <-- Membuat variabel $mobile_nav yang berisi elemen dengan class nav-menu.
            class: "mobile-nav d-md-none", // <-- Menambahkan class mobile-nav dan d-md-none pada elemen yang berisi class nav-menu.
        });

        $(".footer-menu ul").append($footer_menu); // <-- Menambahkan elemen $footer_menu pada elemen dengan class footer-menu ul.
        $(".footer-menu ul li a").addClass("underline"); // <-- Menambahkan class underline pada elemen footer-menu ul li a.

        $("body").append($mobile_nav); // <-- Menambahkan elemen $mobile_nav pada body.
        $("body").append('<div class="mobile-nav-overlay"></div>'); // <-- Menambahkan elemen div dengan class mobile-nav-overlay pada body.
        $("body").append(`
            <div class="menu-toggle d-md-none" id="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        `); // <-- Menambahkan elemen div dengan class menu-toggle pada body.

        $(document).on('click', '#menu-toggle', function (e) { // <-- Membuat fungsi untuk menampilkan menu mobile.
            $(this).toggleClass("active");
            $('body').toggleClass('mobile-nav-active');
            $('.mobile-nav-overlay').toggle();
        });

        $(document).click(function (e) { // <-- Membuat fungsi untuk menyembunyikan menu mobile.
            var container = $(".mobile-nav, .menu-toggle");
            if (!container.is(e.target) && container.has(e.target).length === 0) { // <-- Mengecek apakah elemen yang diklik bukan elemen dengan class mobile-nav atau menu-toggle?
                hideMobile();
            }
        });
    } else if ($(".mobile-nav, .menu-toggle").length) { // <-- Mengecek apakah elemen dengan class mobile-nav atau menu-toggle ada?
        $(".mobile-nav, .menu-toggle").hide(); // <-- Menyembunyikan elemen dengan class mobile-nav atau menu-toggle.
    }

    /**
     * Membuat fungsi untuk menambahkan class active pada menu 
     * jika posisi scroll berada di elemen dengan class mainpage.
     */
    $(document).ready(function () {
        var nav_section = $('section.mainpage');
        var main_nav = $('.nav-menu, .mobile-nav');

        $(window).on('scroll', function () { // <-- Membuat fungsi untuk menambahkan class active pada menu saat di scroll.
            var cur_pos = $(this).scrollTop() + 100; // <-- Mengambil posisi scroll saat ini.

            nav_section.each(function () { // <-- Membuat perulangan untuk setiap elemen dengan class mainpage.
                var top = $(this).offset().top; // <-- Mengambil posisi elemen saat ini.
                var bottom = top + $(this).outerHeight(); // <-- Mengambil posisi elemen saat ini ditambah tinggi elemen saat ini.

                if (cur_pos >= top && cur_pos <= bottom) { // <-- Jika cur_pos berada di antara top dan bottom
                    if (cur_pos <= bottom) { // <-- Jika cur_pos (variabel yang tidak didefinisikan sebelumnya) lebih kecil dari atau sama dengan bottom
                        main_nav.find('li').removeClass('active');
                    }

                    main_nav.find('a[href="#' + $(this).attr('id') + '"]').parent('li').addClass('active'); // <-- Menambahkan class active pada elemen yang memiliki href yang sama dengan id elemen saat ini.
                }

                if (cur_pos < 300) { // <-- Mengecek apakah posisi scroll saat ini lebih kecil dari 300?
                    $(".nav-menu ul:first li:first").addClass('active'); // <-- Menambahkan class active pada elemen pertama dari elemen yang memiliki class nav-menu.
                }
            });
        });
    });

    /**
     * Membuat fungsi untuk menambahkan class active pada menu jika 
     * posisi scroll berada di elemen dengan class mainpage.
     */
    $(document).ready(function () {
        if (window.location.hash) { // <-- Mengecek apakah terdapat hash pada url?
            var initial_nav = window.location.hash; // <-- Mengambil hash pada url.

            if ($(initial_nav).length) { // <-- Mengecek apakah elemen dengan id yang sama dengan hash ada?
                var scrollto = $(initial_nav).offset().top - scrolltoOffset; // <-- Mengambil posisi elemen yang dituju.

                $('html, body').animate({ // <-- Membuat animasi scroll ke elemen yang dituju.
                    scrollTop: scrollto
                }, 1500, 'easeInOutExpo');
            }
        }
    });

    /**
     * Membuat fungsi untuk menyembunyikan menu mobile saat ukuran layar lebih besar dari 768.98px.
     */
    $(window).resize(function () {
        if ($(window).width() > 768.98) {
            hideMobile();
        }
    });

    /**
     * Membuat fungsi untuk menambahkan class active pada elemen yang memiliki class selection-input.
     */
    $(document).ready(function () {
        $('.selection-input li').click(function () {
            $(this).find('input[type="radio"]').prop('checked', true);
            $(this).addClass('active').siblings().removeClass('active');
        });

        $('input[type="radio"]').change(function () {
            if ($(this).is(':checked')) {
                $(this).closest('li').addClass('active').siblings().removeClass('active');
            }
        });
    });

    /**
     * Membuat ganti tema pada website. (dark mode & light mode)
     */
    const body = document.body;
    const btnTheme = document.getElementById("btn-theme");
    const lightTheme = "light-theme";
    const iconSun = `<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 302.4 302.4" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M204.8 97.6C191.2 84 172 75.2 151.2 75.2s-40 8.4-53.6 22.4c-13.6 13.6-22.4 32.8-22.4 53.6s8.8 40 22.4 53.6c13.6 13.6 32.8 22.4 53.6 22.4s40-8.4 53.6-22.4c13.6-13.6 22.4-32.8 22.4-53.6s-8.4-40-22.4-53.6zm-14.4 92.8c-10 10-24 16-39.2 16s-29.2-6-39.2-16-16-24-16-39.2 6-29.2 16-39.2 24-16 39.2-16 29.2 6 39.2 16 16 24 16 39.2-6 29.2-16 39.2zM292 140.8h-30.8c-5.6 0-10.4 4.8-10.4 10.4 0 5.6 4.8 10.4 10.4 10.4H292c5.6 0 10.4-4.8 10.4-10.4 0-5.6-4.8-10.4-10.4-10.4zM151.2 250.8c-5.6 0-10.4 4.8-10.4 10.4V292c0 5.6 4.8 10.4 10.4 10.4 5.6 0 10.4-4.8 10.4-10.4v-30.8c0-5.6-4.8-10.4-10.4-10.4zM258 243.6l-22-22c-3.6-4-10.4-4-14.4 0s-4 10.4 0 14.4l22 22c4 4 10.4 4 14.4 0s4-10.4 0-14.4zM151.2 0c-5.6 0-10.4 4.8-10.4 10.4v30.8c0 5.6 4.8 10.4 10.4 10.4 5.6 0 10.4-4.8 10.4-10.4V10.4c0-5.6-4.8-10.4-10.4-10.4zM258.4 44.4c-4-4-10.4-4-14.4 0l-22 22c-4 4-4 10.4 0 14.4 3.6 4 10.4 4 14.4 0l22-22c4-4 4-10.4 0-14.4zM41.2 140.8H10.4c-5.6 0-10.4 4.8-10.4 10.4s4.4 10.4 10.4 10.4h30.8c5.6 0 10.4-4.8 10.4-10.4 0-5.6-4.8-10.4-10.4-10.4zM80.4 221.6c-3.6-4-10.4-4-14.4 0l-22 22c-4 4-4 10.4 0 14.4s10.4 4 14.4 0l22-22c4-4 4-10.4 0-14.4zM80.4 66.4l-22-22c-4-4-10.4-4-14.4 0s-4 10.4 0 14.4l22 22c4 4 10.4 4 14.4 0s4-10.4 0-14.4z" fill="#000000" data-original="#000000"></path></g></svg>`;
    const iconMoon = `<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 511 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M486.828 307.027C450.09 340.347 402.59 358.7 353.09 358.7c-109.887 0-199.29-89.398-199.29-199.289 0-49.5 18.352-96.996 51.673-133.738 10.304-11.363-.746-29.238-15.536-25.047C81.507 31.34.5 131.207.5 251.391.5 395.42 117.059 512 261.11 512c119.906 0 219.972-80.734 250.765-189.438 4.184-14.757-13.656-25.859-25.047-15.535zM261.11 481.34c-126.793 0-229.949-103.156-229.949-229.95 0-85.132 47.5-162.374 120.067-202.027-18.317 33.504-28.086 71.242-28.086 110.047 0 126.793 103.152 229.95 229.949 229.95 38.808 0 76.543-9.77 110.047-28.087C423.484 433.84 346.242 481.34 261.109 481.34zm0 0" fill="#000000" data-original="#000000" class=""></path><path d="m254.363 202.36 36.309 18.156 18.156 36.308a15.33 15.33 0 0 0 27.422 0l18.156-36.308 36.309-18.157a15.335 15.335 0 0 0 0-27.425l-36.309-18.153-18.156-36.308a15.331 15.331 0 0 0-13.71-8.477 15.322 15.322 0 0 0-13.712 8.477l-18.156 36.308-36.309 18.153a15.331 15.331 0 0 0 0 27.426zm54.59-20.442a15.319 15.319 0 0 0 6.856-6.856l6.73-13.457 6.73 13.458a15.319 15.319 0 0 0 6.856 6.855l13.457 6.727-13.46 6.73a15.33 15.33 0 0 0-6.852 6.855l-6.73 13.458-6.731-13.458a15.319 15.319 0 0 0-6.856-6.855l-13.457-6.727zM414.41 82.762h15.328V98.09c0 8.469 6.864 15.332 15.332 15.332 8.465 0 15.328-6.863 15.328-15.332V82.762h15.329c8.468 0 15.332-6.864 15.332-15.332 0-8.465-6.864-15.328-15.332-15.328h-15.329V36.77c0-8.465-6.863-15.329-15.328-15.329-8.468 0-15.332 6.864-15.332 15.329v15.332H414.41c-8.469 0-15.332 6.863-15.332 15.328 0 8.468 6.863 15.332 15.332 15.332zm0 0" fill="#000000" data-original="#000000" class=""></path></g></svg>`;
    const selectedTheme = localStorage.getItem('selected-theme');
    const getCurrentTheme = () => body.classList.contains(lightTheme) ? 'light' : 'dark';
    
    if (selectedTheme) { // <-- jika ada selectedTheme di localstorage
        if (selectedTheme === 'light') {
            body.classList.add(lightTheme);
            btnTheme.innerHTML = iconMoon;
            btnTheme.setAttribute('data-original-title', 'Mode Gelap');
        } else {
            body.classList.remove(lightTheme);
            btnTheme.innerHTML = iconSun;
            btnTheme.setAttribute('data-original-title', 'Mode Terang');
        }
    }

    btnTheme.addEventListener('click', () => { // <-- ketika tombol btnTheme di klik
        body.classList.toggle(lightTheme); // <-- toggle class lightTheme pada body
        localStorage.setItem('selected-theme', getCurrentTheme()); // <-- simpan selectedTheme ke localstorage
        
        if (body.classList.contains(lightTheme)) {
            btnTheme.innerHTML = iconMoon;
            btnTheme.setAttribute('data-original-title', 'Mode Gelap');
        } else {
            btnTheme.innerHTML = iconSun;
            btnTheme.setAttribute('data-original-title', 'Mode Terang');
        }
    });

    /**
     * Remove Hash(#) jika sudah 1 detik
     */
    setTimeout(() => {
        history.replaceState('', document.title, window.location.origin + window
            .location.pathname + window
                .location.search);
    }, 1000);

    /**
    * Membuat slider pada item menggunakan tiny slider js
    */
    var productList = document.querySelectorAll('.slider.product-list');
    var productControls = document.querySelectorAll('.product-controls');

    if (productList.length > 0 && productControls.length > 0) { // <-- jika ada slider product
        productList.forEach(function (element, index) { // <-- lakukan perulangan pada class slider product-list
            tns({
                container: element, // <-- ambil element slider sesuai index
                controlsContainer: productControls[index], // <-- ambil element controlsContainer sesuai index
                items: 2,
                speed: 400,
                autoplay: true,
                autoplayButtonOutput: false,
                rewind: true,
                gutter: 15,
                responsive: {
                    200: { items: 1 },
                    320: { items: 1, fixedWidth: 200 },
                    425: { items: 2, fixedWidth: false },
                    768: { items: 3, fixedWidth: false },
                    992: { items: 4, fixedWidth: false },
                },
            });
        });
    }

    if ($('#team-list').length > 0) { // <-- jika ada slider team
        tns({
            container: '#team-list',
            controlsContainer: ".team-controls",
            items: 2,
            speed: 400,
            autoplay: false,
            autoplayButtonOutput: false,
            rewind: true,
            gutter: 20,
            responsive: {
                200: { items: 1 },
                426: { items: 1, fixedWidth: false },
                450: { items: 2, fixedWidth: false },
                768: { items: 3, fixedWidth: false },
                992: { items: 4, fixedWidth: false },
            },
        });
    }

})(jQuery);
