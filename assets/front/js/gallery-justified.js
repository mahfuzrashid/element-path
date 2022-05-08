;(function ($, elementor) {

    'use strict';

    var widgetJustifiedGallery = function ($scope, $) {

        let $gallery_justified = $scope.find('.elmpath-gallery-justified'),
            $gallery_justified_id = $('#' + $gallery_justified.attr('id'));
        if (!$gallery_justified.length) {
            return;
        }

        let $settings = $gallery_justified.data('settings');


        $gallery_justified_id.each(function (i, el) {

            $(el).justifiedGallery({
                rel: 'gal' + i,
                rowHeight: $settings.rowHeight,
                lastRow: $settings.lastRow,
                captions: $settings.captions !== undefined,
                margins: $settings.margins,
            })
        });


    };

    jQuery(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/elmpath-gallery-justified.default', widgetJustifiedGallery);
    });

}(jQuery, window.elementorFrontend));