;(function ($, elementor) {

    'use strict';

    var widgetProgressPie = function ($scope, $) {

        let $progress = $scope.find('.elmpath-progress-pie'),
            $progress_id = '#' + $progress.attr('id');

        if (!$progress.length) {
            return;
        }

        $($progress).appear(function () {

            $($progress_id).asPieProgress({
                namespace: "pieProgress",
                classes: {
                    svg: "elmpath-progress-pie-svg",
                    number: "elmpath-progress-pie-number"
                }
            });

            $($progress_id).asPieProgress("start");

        });
    };

    jQuery(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/elmpath-progresspie.default', widgetProgressPie);
    });

}(jQuery, window.elementorFrontend));