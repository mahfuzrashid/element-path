;(function ($, elementor) {

    'use strict';

    var widgetTimeline = function ($scope, $) {

        let $timeline = $scope.find('.timeline'),
            $timeline_id = $('#' + $timeline.attr('id'));

        let $timeline_items_count = $timeline_id.find('.timeline__item').length;

        console.log($timeline_id)


        $timeline_id.timeline({

            forceVerticalMode: 991,
            mode: ($timeline_items_count < 3 && !($timeline_items_count === '')) ? 'vertical' : 'horizontal',
            visibleItems: 4,
        });

    };

    jQuery(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/elmpath-timeline-slider.default', widgetTimeline);
    });

}(jQuery, window.elementorFrontend));