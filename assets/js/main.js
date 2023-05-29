!(function ($) { // deklarasi jQuery
    "use strict"; // Start of use strict

    $("#header").sticky({ // Sticky Header
        topSpacing: 0,
        zIndex: '50'
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

    $(window).resize(function() { // Ketika window di resize
        if ($(window).width() > 768.98) { // Jika lebar window lebih dari 768.98
            if ($('body').hasClass('mobile-nav-active')) {
                $('body').removeClass('mobile-nav-active');
                $('.mobile-nav-overlay').fadeOut();
                $('.menu-toggle').removeClass('active');
            }
        }
    });

    // Switch light/dark theme
    const body = document.body;
    const btnTheme = document.getElementById("btn-theme");
    const btnThemeIcon = document.getElementById("btn-theme-icon");
    const lightTheme = "light-theme";
    const iconTheme = "fa-sun";
    const selectedTheme = localStorage.getItem("selected-theme");
    const selectedIcon = localStorage.getItem("selected-icon");

    const getCurrentTheme = () => body.classList.contains(lightTheme) ? "light" : "dark";
    const getCurrentIcon = () => btnThemeIcon.classList.contains(iconTheme) ? "fa-sun" : "fa-moon";

    if (selectedTheme) {
        body.classList[selectedTheme === "light" ? "add" : "remove"](lightTheme);
        btnThemeIcon.classList[selectedIcon === "fa-sun" ? "add" : "remove"](iconTheme);
    }

    btnTheme.addEventListener('click', () => {
        body.classList.toggle(lightTheme);
        btnThemeIcon.classList.toggle(iconTheme);

        localStorage.setItem("selected-theme", getCurrentTheme());
        localStorage.setItem("selected-icon", getCurrentIcon());
    });
})(jQuery);