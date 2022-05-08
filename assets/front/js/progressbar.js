;(function ($, elementor) {

    'use strict';

    var widgetProgressBar = function ($scope, $) {

        let $progress = $scope.find('.elmpath-progress-bar'),
            $pb_fill_id = $('#' + $progress.attr('id') ).find('.elmpath-progress-fill');

        $pb_fill_id.appear(function () {

            $pb_fill_id.each(function () {

                $(this)
                    .data("origWidth", $(this).attr('aria-valuenow') + '%')
                    .width(0)
                    .animate({
                        width: $(this).data("origWidth")
                    }, 1200);

            });
        });

    };

    jQuery(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/elmpath-progressbar.default', widgetProgressBar);
    });

}(jQuery, window.elementorFrontend));