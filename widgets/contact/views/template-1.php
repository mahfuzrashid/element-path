<?php
/**
 * Widget Render: Contact Form 7
 *
 * @package widgets/contact/views/template-1.php
 * @copyright Pluginbazar 2020
 */

$unique_id = uniqid();
$form_id   = elmpath()->get_settings_atts( 'contact_form7' );

$elmpath_cf_align = elmpath()->get_settings_atts( 'elmpath_cf_align', 'left' );

printf( '<div class="elmpath-cf7-wrapper elmpath-form-align-%s ">%s</div>', $elmpath_cf_align, do_shortcode( '[contact-form-7 id="' . $form_id . '"]' ) );