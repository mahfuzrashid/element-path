<?php
/**
 * Widget Render: Progresspie
 *
 * @package widgets/progresspie/views/template-1.php
 * @copyright Pluginbazar 2020
 */

$unique_id   = uniqid();
$style       = elmpath()->get_settings_atts( 'style' );
$label       = elmpath()->get_settings_atts( '_label' );
$value       = elmpath()->get_settings_atts( 'size', '50', elmpath()->get_settings_atts( '_value' ) );
$bar_size    = elmpath()->get_settings_atts( 'size', '10', elmpath()->get_settings_atts( 'bar_size' ) );
$speed       = elmpath()->get_settings_atts( 'speed', '30' );
$delay       = elmpath()->get_settings_atts( 'delay', '1000' );
$track_color = elmpath()->get_settings_atts( 'track_color', '#e5e5e5' );
$fill_color  = elmpath()->get_settings_atts( 'fill_color', '#ffffff' );
$bar_color   = elmpath()->get_settings_atts( 'bar_color', '#e91e63' );

?>

<div id="elmpath-pie-<?php echo esc_attr( $unique_id ) ?>"
     class="elmpath-progress-pie <?php echo esc_attr( empty( $label ) ? 'no-pie-label' : '' ); ?>" role="progressbar"
     data-speed="<?php echo esc_attr( $speed ); ?>"
     data-delay="<?php echo esc_attr( $delay ); ?>" data-goal="<?php echo esc_attr( $value ); ?>"
     data-trackcolor="<?php echo esc_attr( $track_color ); ?>"
     data-fillcolor="<?php echo esc_attr( $fill_color ); ?>"
     data-barcolor="<?php echo esc_attr( $bar_color ); ?>"
     data-barsize="<?php echo esc_attr( $bar_size ); ?>" aria-valuemin="0"
     aria-valuemax="100">
    <h3 class="elmpath-progress-pie-number"></h3>
	<?php if ( ! empty( $label ) ) : ?>
        <p class="elmpath-progress-pie-label"><?php echo esc_html( $label ); ?></p>
	<?php endif; ?>
</div>

