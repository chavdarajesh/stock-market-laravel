(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 200);
    };
    $(window).on('load', function () { spinner(); });


    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.sticky-top').addClass('shadow-sm').css('top', '0px');
        } else {
            $('.sticky-top').removeClass('shadow-sm').css('top', '-100px');
        }
    });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
        return false;
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Portfolio isotope and filter
    var portfolioIsotope = $('.portfolio-container').isotope({
        itemSelector: '.portfolio-item',
        filter: ':not(.arvr):not(.animation)'
        // columnWidth: 2,
        // layoutMode: 'fitRows'
    });
    $('#isotope-project-flters a.isotope-project-home').on('click', function () {


        $("#isotope-project-flters a.isotope-project-home").removeClass('active');
        var Id = $(this).attr('id');
        $('.' + Id + '-isotope-project-home-class').addClass('active');
        if ($('.navbar-toggler').length > 0 && $('#navbarCollapse').hasClass('show')) {
            $('.navbar-toggler').trigger('click');
        } else {
            $('html, body').animate({
                scrollTop: $("#home-projects-isotope-div").offset().top - 50
            }, 100);
        }
        portfolioIsotope.isotope({ filter: $(this).data('filter') });
    });

    $(window).on('load', function () {
        var hash = window.location.hash.substring(1);
        history.replaceState(null, null, ' ');
        if (hash && hash != '' && hash != null) {
            $('.' + hash + '-isotope-project-home-class').addClass('active');
            $('html, body').animate({
                scrollTop: $("#home-projects-isotope-div").offset().top - 50
            }, 100);

            portfolioIsotope.isotope({ filter: '.' + hash });
        }
    })

    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        items: 1,
        dots: false,
        loop: true,
        nav: true,
        navText: [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ]
    });


})(jQuery);

