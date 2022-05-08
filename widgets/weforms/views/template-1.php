<?php
/**
 * Widget Render: weForms
 *
 * @package widgets/weforms/views/template-1.php
 * @copyright Pluginbazar 2020
 */

$unique_id = uniqid();
$form_id   = elmpath()->get_settings_atts( 'form_id' );


printf( '<div class="elmpath-weforms-wrapper">%s</div>', do_shortcode( '[weforms id="' . $form_id . '"]	' ) );