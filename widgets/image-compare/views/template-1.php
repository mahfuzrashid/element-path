<?php
/**
 * Widget Render: Image Compare
 *
 * @package widgets/image-compare/views/template-1.php
 * @copyright Pluginbazar 2020
 */

$unique_id = uniqid();

$before_image = elmpath()->get_settings_atts( 'before_image' );
$after_image  = elmpath()->get_settings_atts( 'after_image' );


if ( ! $args instanceof ELMPATH_Widget_base ) {
	return;
}

$settings = $args->get_settings_for_display();

if ( $settings['default_offset_pct']['size'] < 1 ) {
	$settings['default_offset_pct']['size'] = $settings['default_offset_pct']['size'] * 100;
}

$args->add_render_attribute(
	[
		'image-compare' => [
			'id'            => 'image-compare-' . $args->get_id(),
			'class'         => [ 'image-compare' ],
			'data-settings' => [
				wp_json_encode( array_filter( [
						'id'                   => 'image-compare-' . $args->get_id(),
						'default_offset_pct'   => $settings['default_offset_pct']['size'],
						'orientation'          => ( $settings['orientation'] == 'horizontal' ) ? false : true,
						'before_label'         => elmpath()->get_settings_atts( 'before_label', 'Before' ),
						'after_label'          => elmpath()->get_settings_atts( 'after_label', 'Before' ),
						'no_overlay'           => ( 'yes' == $settings['no_overlay'] ) ? true : false,
						'on_hover'             => ( 'yes' == $settings['on_hover'] ) ? true : false,
						'move_slider_on_hover' => ( 'yes' == $settings['move_slider_on_hover'] ) ? true : false,
						'add_circle'           => ( 'yes' == $settings['add_circle'] ) ? true : false,
						'add_circle_blur'      => ( 'yes' == $settings['add_circle_blur'] ) ? true : false,
						'add_circle_shadow'    => ( 'yes' == $settings['add_circle_shadow'] ) ? true : false,
						'smoothing'            => ( 'yes' == $settings['smoothing'] ) ? true : false,
						'smoothing_amount'     => $settings['smoothing_amount']['size'],
						'bar_color'            => $settings['bar_color'],
					] )
				),
			],
		],
	]
);

if ( 'yes' == $settings['no_overlay'] ) {
	$args->add_render_attribute( 'image-compare', 'class', 'elmpath-image-compare-overlay' );
}

?>

<div class="elmpath-image-compare">
    <div <?php echo wp_kses_post( $args->get_render_attribute_string( 'image-compare' ) ); ?>>
        <img src="<?php echo esc_url( $before_image['url'] ); ?>"
             alt="<?php esc_attr_e( 'Before Image', 'element-path' ); ?>">
        <img src="<?php echo esc_url( $after_image['url'] ); ?>"
             alt="<?php esc_attr_e( 'After Image', 'element-path' ); ?>">
    </div>
</div>