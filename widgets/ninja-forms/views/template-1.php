<?php
/**
 * Widget Render: WeForms
 *
 * @package widgets/weforms/views/template-1.php
 * @copyright Pluginbazar 2020
 */
global $wpdb;

$unique_id = uniqid();
$form_id   = elmpath()->get_settings_atts( 'form_id' );

printf( '<div class="elmpath-ninja-forms">%s</div>', do_shortcode( '[ninja_form id="'.$form_id.'"]' ) );