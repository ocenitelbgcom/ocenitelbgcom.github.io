/*jslint browser: true*/
/*global $, GMaps*/

$(document).ready(function () {
    "use strict";

    // Sticky navigation
    $('.js--section-services').waypoint(function (direction) {
        if (direction === "down") {
            $('nav').addClass('sticky');
        } else {
            $('nav').removeClass('sticky');
        }
    }, {
        offset: '60px;'
    });

    // Scroll buttons
    $('.js--scroll-to-plans').click(function () {
        $('html, body').animate({ scrollTop: $('.js--section-plans').offset().top }, 1000);
    });

    // Snippet - smooth scrolling to an ancor on the same page
    // https://css-tricks.com/snippets/jquery/smooth-scrolling/
    $(function () {
        $('a[href*=#]:not([href=#])').click(function () {
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({ scrollTop: target.offset().top }, 1000);
                    return false;
                }
            }
        });
    });

    // Animations on scroll
    $('.js--wp-1').waypoint(function (direction) {
        $('.js--wp-1').addClass('animated fadeIn');
    }, {
        offset: '50%'
    });
    $('.js--wp-2').waypoint(function (direction) {
        $('.js--wp-2').addClass('animated fadeInUp');
    }, {
        offset: '50%'
    });
    $('.js--wp-3').waypoint(function (direction) {
        $('.js--wp-3').addClass('animated fadeIn');
    }, {
        offset: '50%'
    });
    $('.js--wp-4').waypoint(function (direction) {
        $('.js--wp-4').addClass('animated pulse');
    }, {
        offset: '50%'
    });

    /* Mobile navigation */

    $('.js--nav-icon').click(function () {
        var nav = $('.js--main-nav'),
            icon = $('.js--nav-icon i');

        nav.slideToggle(200);

        if (icon.hasClass('ion-navicon-round')) {
            icon.addClass('ion-close-round');
            icon.removeClass('ion-navicon-round');
        } else {
            icon.addClass('ion-navicon-round');
            icon.removeClass('ion-close-round');
        }
    });

    /* Google maps */
    var map = new GMaps({
        div: '.map',
        lat: 42.433536,
        lng: 25.631791,
        zoom: 15
    });

    map.addMarker({
        lat: 42.433536,
        lng: 25.631791,
        title: 'ocenitelbg.com',
        infoWindow: {
            content: '<p>Нашия офис в Стара Загора</p>'
        }
    });
});
