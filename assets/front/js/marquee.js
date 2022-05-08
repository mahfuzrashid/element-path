;(function ($, elementor) {

    'use strict';

    var widgetMarquee = function ($scope, $) {

        let $marquee = $scope.find('.elmpath-marquee'),
            $marquee_id = $('#' + $marquee.attr('id') );

        if (!$marquee.length) {
            return;
        }

        $marquee_id.jConveyorTicker({reverse_elm: true});

    };

    jQuery(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/elmpath-marquee.default', widgetMarquee);
    });

}(jQuery, window.elementorFrontend));