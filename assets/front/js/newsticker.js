;(function ($, elementor) {

    'use strict';

    var widgetNewsTicker = function ($scope, $) {

        let $newsticker = $scope.find('.elmpath-newsticker'),
            $rtl_class = !!$('body').hasClass('rtl'),
            $newsticker_id = $('#' + $newsticker.attr('id')).find('.owl-carousel');


        if (!$newsticker.length) {
            return;
        }

        $newsticker_id.owlCarousel({
            animateOut: 'fadeOut',
            animateIn: 'fadeInUp',
            rtl: $rtl_class,
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            items: 1,
            smartSpeed: 1000,
        });

    };

    jQuery(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/elmpath-newsticker.default', widgetNewsTicker);
    });

}(jQuery, window.elementorFrontend));