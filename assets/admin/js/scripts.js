/**
 * Admin Scripts
 */

;(function ($, window, doccument, pluginObject) {
    'use strict';

    $(doccument).on('ready', function () {
        $('.elmpath-team-profiles .elmpath-social-items').sortable({
            handle: '.dashicons-move',
            revert: false,
            axis: "y",
        });
    });


    $(doccument).on('click', '.elmpath-team-profiles .elmpath-social-single .dashicons-trash', function () {

        if (confirm(pluginObject.confirmRemoveText)) {
            $(this).parent().parent().fadeOut().remove();
        }
    });


    /**
     * Add new social icon in team meta box
     */
    $(doccument).on('click', '.elmpath-team-profiles .button-primary', function () {
        $.ajax({
            type: 'POST',
            url: pluginObject.ajaxurl,
            context: this,
            data: {
                'action': 'add_social_item',
            },
            success: function (response) {
                if (response.success) {
                    $('.elmpath-team-profiles .elmpath-social-items').append(response.data);
                }
            }
        });
    });


    /**
     * Finally import element
     */
    $(doccument).on('click', '.elmpath-import-window .elmpath-import-button', function () {

        let importButton = $(this),
            localPageID = $('.local-page-id').val(),
            importingPageId = importButton.data('page-id'),
            buttonContent = importButton.html();

        importButton.html(pluginObject.importingText);

        $.ajax({
            type: 'POST',
            url: pluginObject.ajaxurl,
            context: this,
            data: {
                'action': 'import_element',
                'page_id': importingPageId,
                'local_page_id': localPageID,
            },
            success: function (response) {
                if (response.success) {
                    importButton.parent().prepend('<p class="notice notice-success">' + response.data + '</p>');
                } else {
                    importButton.parent().prepend('<p class="notice notice-error">' + response.data + '</p>');
                }
                importButton.html(buttonContent).fadeOut().hide();
            }
        });
    });


    /**
     * Open importer window
     */
    $(doccument).on('click', '.elmpath-template-page .elmpath-import', function () {

        let importWindow = $('.elmpath-import-window');

        $.ajax({
            type: 'POST',
            url: pluginObject.ajaxurl,
            context: this,
            data: {
                'action': 'populate_import_popup',
                'template_id': $(this).data('template'),
                'template_group': $(this).data('template-group'),
            },
            success: function (response) {
                if (response.success) {
                    importWindow.find('.elmpath-import').html(response.data).parent().fadeIn(200)
                }
            }
        });
    });


    /**
     * Close importer window
     */
    $(doccument).on('click', '.elmpath-import-window .import-close', function () {
        $(this).parent().parent().fadeOut();
    });


    /**
     * Elements Toggler
     */
    $(doccument).on('click', 'button.btn-style-one', function () {

        let thisButton = $(this),
            controlElements = thisButton.data('control'),
            checkboxes = $('.single-element-column.' + controlElements).find('input[type="checkbox"]');

        if (thisButton.hasClass('enable-btn')) {
            checkboxes.prop('checked', true);
        }

        if (thisButton.hasClass('disable-btn')) {
            checkboxes.prop('checked', false);
        }
    });


    /**
     * Elements Search
     */
    $(doccument).on('keyup', '.template-search > input', function (e) {

        if (e.keyCode === 27) {
            $(this).val('');
        }

        let searchValue = $(this).val(),
            allTemplates = $('.elmpath-template');

        if (searchValue !== '') {
            allTemplates.addClass('hidden');
            $('.elmpath-template[data-filter-tags*="' + searchValue.toLowerCase() + '"]').removeClass('hidden');
        } else {
            allTemplates.removeClass('hidden');
        }
    });

}(jQuery, window, document, elmpath));