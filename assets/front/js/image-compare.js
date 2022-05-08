(function ($, elementor) {

    'use strict';

    var widgetImageCompare = function ($scope, $) {
        var $image_compare = $scope.find('.image-compare');
        if (!$image_compare.length) {
            return;
        }

        var $settings = $image_compare.data('settings');

        var viewers = document.querySelectorAll('#' + $settings.id);

        var options = {

            // UI Theme Defaults
            controlColor: $settings.bar_color,
            controlShadow: $settings.add_circle_shadow,
            addCircle: $settings.add_circle,
            addCircleBlur: $settings.add_circle_blur,

            // Label Defaults
            showLabels: $settings.no_overlay,
            labelOptions: {
                before: $settings.before_label,
                after: $settings.after_label,
                onHover: $settings.on_hover
            },

            // Smoothing
            smoothing: $settings.smoothing,
            smoothingAmount: $settings.smoothing_amount,

            // Other options
            hoverStart: $settings.move_slider_on_hover,
            verticalMode: $settings.orientation,
            startingPoint: $settings.default_offset_pct,
            fluidMode: false
        };

        viewers.forEach(function (element) {
            var view = new ImageCompare(element, options).mount();
        });

    };

    jQuery(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/elmpath-image-compare.default', widgetImageCompare);
    });

}(jQuery, window.elementorFrontend));