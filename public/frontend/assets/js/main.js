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
    ======== 00. mCustomScrollbar ============
    ----------------------------------------*/
    //show page content after 2.5s
    $(window).on("load",function(){
        $('.mCustomScrollbar').mCustomScrollbar({
            theme:"dark-3"
        });
    });

    /*----------------------------------------
    ============ 08. sticky nav ==============
    ----------------------------------------*/
    $(window).on('scroll', function() {
        if ($(window).scrollTop() >= 80) {
            $('.main-nav').addClass('sticky-nav');
        } else {
            $('.main-nav').removeClass('sticky-nav');
        }
    });

    /*----------------------------------------
    =========== 08. main side nav ============
    ----------------------------------------*/
    $('.button').on('click', function() {
        $('.main-sidenav').toggleClass('showbar');
        $('.overlay').toggleClass('overlay-active');
    });
    $('.overlay').on('click', function(){
        $('.main-sidenav').removeClass('showbar');
        $('.overlay').toggleClass('overlay-active');

    });

    /*----------------------------------------
    ========== 04. sidebar Menu ==============
    ----------------------------------------*/

    $.sidebarMenu = function(menu) {
        var animationSpeed = 300;

        $(menu).on('click', 'li a', function(e) {
            var $this = $(this);
            var checkElement = $this.next();

            if (checkElement.is('.treeview-menu') && checkElement.is(':visible')) {
                checkElement.slideUp(animationSpeed, function() {
                    checkElement.removeClass('menu-open');
                });
                checkElement.parent("li").removeClass("active");
            }

            //If the menu is not visible
            else if ((checkElement.is('.treeview-menu')) && (!checkElement.is(':visible'))) {
                //Get the parent menu
                var parent = $this.parents('ul').first();
                //Close all open menus within the parent
                var ul = parent.find('ul:visible').slideUp(animationSpeed);
                //Remove the menu-open class from the parent
                ul.removeClass('menu-open');
                //Get the parent li
                var parent_li = $this.parent("li");

                //Open the target menu and add the menu-open class
                checkElement.slideDown(animationSpeed, function() {
                    //Add the class active to the parent li
                    checkElement.addClass('menu-open');
                    parent.find('li.active').removeClass('active');
                    parent_li.addClass('active');
                });
            }
            //if this isn't a link, prevent the page from being redirected
            if (checkElement.is('.treeview-menu')) {
                e.preventDefault();
            }
        });
    }

    $.sidebarMenu($('.main-sidenav'))

    /*----------------------------------------
    =========== 04. Search ==============
    ----------------------------------------*/
    var search = document.getElementById('search');
    var button = document.getElementById('button');
    var input = document.getElementById('input');

    function loading() {
        search.classList.add('loading');

        setTimeout(function() {
            search.classList.remove('loading');
        }, 1500);
    }

    button.addEventListener('click', loading);

    input.addEventListener('keydown', function() {
        if(event.keyCode == 13) loading();
    });

    // Bid input field

    (function() {

        window.inputNumber = function(el) {

            var min = el.attr('min') || false;
            var max = el.attr('max') || false;

            var els = {};

            els.dec = el.prev();
            els.inc = el.next();

            el.each(function() {
                init($(this));
            });

            function init(el) {

                els.dec.on('click', decrement);
                els.inc.on('click', increment);

                function decrement() {
                    var value = el[0].value;
                    value--;
                    if(!min || value >= min) {
                        el[0].value = value;
                    }
                }

                function increment() {
                    var value = el[0].value;
                    value++;
                    if(!max || value <= max) {
                        el[0].value = value++;
                    }
                }
            }
        }
    })();

    inputNumber($('.input-number'));

    $(".spinner-box").fadeOut("slow");
});
