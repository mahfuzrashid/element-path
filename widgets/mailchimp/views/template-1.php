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

printf( '<div class="elmpath-mailchimp-form">%s</div>', do_shortcode( '[mc4wp_form id="'.$form_id.'"]' ) );