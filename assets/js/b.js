!(function ($) {
    "use strict";

    $("#header").sticky({
        topSpacing: 0,
        zIndex: '50'
    });

    var scrolltoOffset = $('#header').outerHeight() - 20;
    $(document).on('click', '.welcome-text a', function (e) {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            if (target.length) {
                e.preventDefault();

                var scrollto = target.offset().top - scrolltoOffset;

                if ($(this).attr("href") == '#header') {
                    scrollto = 0;
                }

                $('html, body').animate({
                    scrollTop: scrollto
                }, 1500, 'easeInOutExpo');

                return false;
            }
        }
    });

    if ($(".nav-menu").length) { // Jika ada class nav-menu
        var $mobile_nav = $(".nav-menu").clone().prop({ // Buat variabel $mobile_nav, lalu clone class nav-menu
            class: "mobile-nav d-md-none" // Tambahkan class mobile-nav, dan hapus class d-md-none
        });

        $("body").append($mobile_nav); // Append variabel $mobile_nav ke body
        $("body").append('<div class="mobile-nav-overlay"></div>'); // Append div mobile-nav-overlay ke main
        $("body").append(`
            <div class="menu-toggle d-md-none" id="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        `);

        $(document).on('click', '#menu-toggle', function (e) { // Ketika tombol menu-toggle di klik
            $(this).toggleClass("active"); // Tambahkan class active ke tombol menu-toggle
            $("body").toggleClass("mobile-nav-active"); // Tambahkan class mobile-nav-active ke body
            $(".mobile-nav-overlay").toggle(); // Toggle mobile-nav-overlay
        });

        $(document).click(function (e) { // Ketika dokumen di klik
            var container = $(".mobile-nav, .menu-toggle"); // Buat variabel container, dan masukkan class mobile-nav dan menu-toggle
            if (!container.is(e.target) && container.has(e.target).length === 0) { // Jika container tidak di klik
                if ($('body').hasClass('mobile-nav-active')) { // Jika body memiliki class mobile-nav-active
                    $('body').removeClass('mobile-nav-active'); // Hapus class mobile-nav-active dari body
                    $('.mobile-nav-overlay').fadeOut(); // FadeOut mobile-nav-overlay
                    $('.menu-toggle').removeClass('active'); // Hapus class active dari menu-toggle
                }
            }
        });
    } else if ($(".mobile-nav, .menu-toggle").length) { // Jika ada class mobile-nav dan menu-toggle
        $(".mobile-nav, .menu-toggle").hide(); // Sembunyikan class mobile-nav dan menu-toggle
    }

    $(window).resize(function () { // Ketika window di resize
        if ($(window).width() > 768.98) { // Jika lebar window lebih dari 768.98
            if ($('body').hasClass('mobile-nav-active')) {
                $('body').removeClass('mobile-nav-active');
                $('.mobile-nav-overlay').fadeOut();
                $('.menu-toggle').removeClass('active');
            }
        }
    });

    /*--------------------------------------------------------------
    # Change Theme
    --------------------------------------------------------------*/
    const body = document.body;
    const btnTheme = document.getElementById("btn-theme");
    const lightTheme = "light-theme";
    const iconSun = `
    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 302.4 302.4" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M204.8 97.6C191.2 84 172 75.2 151.2 75.2s-40 8.4-53.6 22.4c-13.6 13.6-22.4 32.8-22.4 53.6s8.8 40 22.4 53.6c13.6 13.6 32.8 22.4 53.6 22.4s40-8.4 53.6-22.4c13.6-13.6 22.4-32.8 22.4-53.6s-8.4-40-22.4-53.6zm-14.4 92.8c-10 10-24 16-39.2 16s-29.2-6-39.2-16-16-24-16-39.2 6-29.2 16-39.2 24-16 39.2-16 29.2 6 39.2 16 16 24 16 39.2-6 29.2-16 39.2zM292 140.8h-30.8c-5.6 0-10.4 4.8-10.4 10.4 0 5.6 4.8 10.4 10.4 10.4H292c5.6 0 10.4-4.8 10.4-10.4 0-5.6-4.8-10.4-10.4-10.4zM151.2 250.8c-5.6 0-10.4 4.8-10.4 10.4V292c0 5.6 4.8 10.4 10.4 10.4 5.6 0 10.4-4.8 10.4-10.4v-30.8c0-5.6-4.8-10.4-10.4-10.4zM258 243.6l-22-22c-3.6-4-10.4-4-14.4 0s-4 10.4 0 14.4l22 22c4 4 10.4 4 14.4 0s4-10.4 0-14.4zM151.2 0c-5.6 0-10.4 4.8-10.4 10.4v30.8c0 5.6 4.8 10.4 10.4 10.4 5.6 0 10.4-4.8 10.4-10.4V10.4c0-5.6-4.8-10.4-10.4-10.4zM258.4 44.4c-4-4-10.4-4-14.4 0l-22 22c-4 4-4 10.4 0 14.4 3.6 4 10.4 4 14.4 0l22-22c4-4 4-10.4 0-14.4zM41.2 140.8H10.4c-5.6 0-10.4 4.8-10.4 10.4s4.4 10.4 10.4 10.4h30.8c5.6 0 10.4-4.8 10.4-10.4 0-5.6-4.8-10.4-10.4-10.4zM80.4 221.6c-3.6-4-10.4-4-14.4 0l-22 22c-4 4-4 10.4 0 14.4s10.4 4 14.4 0l22-22c4-4 4-10.4 0-14.4zM80.4 66.4l-22-22c-4-4-10.4-4-14.4 0s-4 10.4 0 14.4l22 22c4 4 10.4 4 14.4 0s4-10.4 0-14.4z" fill="#000000" data-original="#000000"></path></g></svg>
    `;
    const iconMoon = `
    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 511 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M486.828 307.027C450.09 340.347 402.59 358.7 353.09 358.7c-109.887 0-199.29-89.398-199.29-199.289 0-49.5 18.352-96.996 51.673-133.738 10.304-11.363-.746-29.238-15.536-25.047C81.507 31.34.5 131.207.5 251.391.5 395.42 117.059 512 261.11 512c119.906 0 219.972-80.734 250.765-189.438 4.184-14.757-13.656-25.859-25.047-15.535zM261.11 481.34c-126.793 0-229.949-103.156-229.949-229.95 0-85.132 47.5-162.374 120.067-202.027-18.317 33.504-28.086 71.242-28.086 110.047 0 126.793 103.152 229.95 229.949 229.95 38.808 0 76.543-9.77 110.047-28.087C423.484 433.84 346.242 481.34 261.109 481.34zm0 0" fill="#000000" data-original="#000000" class=""></path><path d="m254.363 202.36 36.309 18.156 18.156 36.308a15.33 15.33 0 0 0 27.422 0l18.156-36.308 36.309-18.157a15.335 15.335 0 0 0 0-27.425l-36.309-18.153-18.156-36.308a15.331 15.331 0 0 0-13.71-8.477 15.322 15.322 0 0 0-13.712 8.477l-18.156 36.308-36.309 18.153a15.331 15.331 0 0 0 0 27.426zm54.59-20.442a15.319 15.319 0 0 0 6.856-6.856l6.73-13.457 6.73 13.458a15.319 15.319 0 0 0 6.856 6.855l13.457 6.727-13.46 6.73a15.33 15.33 0 0 0-6.852 6.855l-6.73 13.458-6.731-13.458a15.319 15.319 0 0 0-6.856-6.855l-13.457-6.727zM414.41 82.762h15.328V98.09c0 8.469 6.864 15.332 15.332 15.332 8.465 0 15.328-6.863 15.328-15.332V82.762h15.329c8.468 0 15.332-6.864 15.332-15.332 0-8.465-6.864-15.328-15.332-15.328h-15.329V36.77c0-8.465-6.863-15.329-15.328-15.329-8.468 0-15.332 6.864-15.332 15.329v15.332H414.41c-8.469 0-15.332 6.863-15.332 15.328 0 8.468 6.863 15.332 15.332 15.332zm0 0" fill="#000000" data-original="#000000" class=""></path></g></svg>
    `;
    const selectedTheme = localStorage.getItem('selected-theme');
    const selectedIcon = localStorage.getItem('selected-icon');
    const getCurrentTheme = () => body.classList.contains(lightTheme) ? 'light' : 'dark';

    if (selectedTheme) {
        body.classList[selectedTheme === 'light' ? 'add' : 'remove'](lightTheme);
        btnTheme.innerHTML = selectedIcon === 'iconMoon' ? iconMoon : iconSun;
    }

    btnTheme.addEventListener('click', () => {
        body.classList.toggle(lightTheme);
        localStorage.setItem('selected-theme', getCurrentTheme());

        if (body.classList.contains(lightTheme)) {
            btnTheme.innerHTML = iconMoon;
            localStorage.setItem('selected-icon', 'iconMoon');
        } else {
            btnTheme.innerHTML = iconSun;
            localStorage.setItem('selected-icon', 'iconSun');
        }
    });
})(jQuery);

// for this navbar
var prevScrollpos = window.pageYOffset;
window.onscroll = function () {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("header").style.top = "0";
    } else {
        document.getElementById("header").style.top = "-80px";
    }
    prevScrollpos = currentScrollPos;
}

// for crausel  
$('#recipeCarousel').carousel({
    interval: 10000
})

$('.carousel .carousel-item').each(function () {
    var minPerSlide = 3;
    var next = $(this).next();
    if (!next.length) {
        next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    for (var i = 0; i < minPerSlide; i++) {
        next = next.next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }

        next.children(':first-child').clone().appendTo($(this));
    }
});

/*--------------------------------------------------------------
# Slider product
--------------------------------------------------------------*/
var productList = document.querySelectorAll('.slider.product-list');
var productControls = document.querySelectorAll('.product-controls');

if (productList.length > 0 && productControls.length > 0) {
    productList.forEach(function (element, index) {
        var productListSlider = tns({
            container: element,
            controlsContainer: productControls[index],
            items: 2,
            speed: 400,
            autoplay: true,
            autoplayButtonOutput: false,
            autoplayTimeout: 5000,
            rewind: true,
            gutter: 5,
            responsive: {
                200: {
                    items: 1,
                    // fixedWidth: 240,
                },
                320: {
                    items: 2,
                },
                425: {
                    items: 2,
                    // fixedWidth: 220,
                },
                768: {
                    items: 3,
                    fixedWidth: false,
                },
                992: {
                    items: 4,
                    fixedWidth: false,
                },
            },
        });
    });
}