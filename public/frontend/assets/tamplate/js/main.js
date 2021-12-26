"use strict";
$(document).ready(function() {

    /*----------------------------------------
    ----------------- Index ------------------

     00. loading script
     01. mobile nav call script
     02. main banner
     03. main banner (home-02)
     04. testimonials slider
     05. agent carousel
     06. service slider
     07. counter
     08. sticky nav

    ------------------------------------------
    ----------------------------------------*/


    /*----------------------------------------
    ========= 00. loading script =============
    ----------------------------------------*/
    // show page content after 2.5s

    /*----------------------------------------
    ====== 01. mobile nav call script =======
    ----------------------------------------*/
    $('#menu2').slicknav({
        prependTo: ".responsive-menu-wrap"
    });

    /*----------------------------------------
    =========== 02. main banner ==============
    ----------------------------------------*/
    if($('.owl-one').length>0){

        $('.owl-one .owl-carousel').owlCarousel({
            loop:true,
            margin:0,
            nav:true,
            autoplayTimeout: 15000,
            smartSpeed: 2000,
            animateOut: 'fadeOut',
            autoplay: true,
            navText: ['<i class="fa fa-long-arrow-left"></i>',
            '<i class="fa fa-long-arrow-right""></i>'],
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                400:{
                    items:1
                },

                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        }).on('changed.owl.carousel', function(event) {
            var idx = event.item.index;
            $('.owl-item').find('.text-animation').removeClass('slide-animation');
            $('.owl-item').eq(idx).find('.text-animation').addClass('slide-animation');
        });

    }

    /*----------------------------------------
    ====== 03. main banner (home-02) =========
    ----------------------------------------*/
    if($('.owl-two').length>0){

        $('.owl-two .owl-carousel').owlCarousel({
            loop:true,
            margin:0,
            nav:true,
            autoplayTimeout: 15000,
            smartSpeed: 2000,
            animateOut: 'fadeOut',
            autoplay: true,
            navText: ['<i class="fa fa-long-arrow-left"></i>',
            '<i class="fa fa-long-arrow-right""></i>'],
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                400:{
                    items:1
                },

                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        }).on('changed.owl.carousel', function(event) {
            var idx = event.item.index;
            $('.owl-item').find('.text-animation').removeClass('slide-animation');
            $('.owl-item').eq(idx).find('.text-animation').addClass('slide-animation');
        });

    }

    /*----------------------------------------
    ======== 04. testimonials slider =========
    ----------------------------------------*/
    if($('.owl-three').length>0){

        $('.owl-three .owl-carousel').owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            autoplayTimeout: 10000,
            smartSpeed: 2000,
            autoplay: true,
            dots: true,
            responsive:{
                0:{
                    items:1
                },
                400:{
                    items:1
                },

                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });

    }

    /*----------------------------------------
    ========== 05. agent carousel ============
    ----------------------------------------*/
    if($('.owl-four').length>0){

        $('.owl-four .owl-carousel').owlCarousel({
        loop: true,
        margin: 15,
        nav: true,
        autoplayTimeout: 7000,
        smartSpeed: 2000,
        autoplay: true,
        navText: ['<i class="fa fa-long-arrow-left"></i>',
        '<i class="fa fa-long-arrow-right""></i>'],
        dots: false,
        responsive:{
            0:{
                items:1
            },
            400:{
                items:1
            },

            600:{
                items:1
            },
            991: {
                items:2
            },
            1000:{
                items:3
            }
        }
    });

    }

    /*----------------------------------------
    ========= 06. service slider ============
    ----------------------------------------*/
    if($('.owl-four-2').length>0){

        $('.owl-four-2 .owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        autoplayTimeout: 7000,
        smartSpeed: 2000,
        autoplay: true,
        navText: ['<i class="fa fa-long-arrow-left"></i>',
        '<i class="fa fa-long-arrow-right""></i>'],
        dots: false,
        responsive:{
            0:{
                items:1
            },
            400:{
                items:2
            },

            600:{
                items:3
            },
            991: {
                items:4
            },
            1000:{
                items:6
            }
        }
    });

    }

    /*----------------------------------------
    ============= 07. counter ================
    ----------------------------------------*/
    if($('.counter').length>0){

        $('.counter').counterUp({
            delay: 50,
            time: 1000
        });

    }

    /*----------------------------------------
    ============ 08. sticky nav ==============
    ----------------------------------------*/
    $(window).on('scroll', function() {
        if ($(window).scrollTop() >= 150) {
            $('.main-nav, .mobilenav-wrapper').addClass('sticky-nav');
        } else {
            $('.main-nav, .mobilenav-wrapper').removeClass('sticky-nav');
        }
    });

});
