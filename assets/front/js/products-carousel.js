(function ($, elementor) {

    'use strict';

    var widgetProductsCarousel = function ($scope, $) {
        $(document).ready(function () {
            var $slider = $scope.find('.elmpath-products-carousel');

            if (!$slider.length) {
                return;
            }

            var $sliderContainer = $slider.find('.swiper-container'),
                $settings = $slider.data('settings');

            var swiper = new Swiper($sliderContainer, $settings);


            if ($settings.pauseOnHover) {
                $($sliderContainer).hover(function () {
                    (this).swiper.autoplay.stop();
                }, function () {
                    (this).swiper.autoplay.start();
                });
            }
        });

    };

    jQuery(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/elmpath-products-carousel.default', widgetProductsCarousel);
    });

}(jQuery, window.elementorFrontend));