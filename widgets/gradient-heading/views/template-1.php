<?php
/**
 * Widget Render: Gradient Heading
 *
 * @package widgets/gradient-heading/views/template-1.php
 * @copyright Pluginbazar 2020
 */

$_title = elmpath()->get_settings_atts( '_title' );

?>

<h2 class="elmpath-gradient-heading"><?php echo wp_kses_post( $_title ); ?></h2>