<?php
/**
 * Widget Render: Gallery Justified
 *
 * @package widgets/gallery-justified/views/template-1.php
 * @copyright Pluginbazar 2020
 */

$unique_id = uniqid();
$style     = elmpath()->get_settings_atts( 'style' );
$gallery     = elmpath()->get_settings_atts( 'gallery' );

if ( ! $args instanceof ELMPATH_Widget_base ) {
	return;
}

$settings = $args->get_settings_for_display();



$args->add_render_attribute(
	[
		'gallery-justified' => [
			'id'            => 'elmpath-gallery' . $unique_id,
			'class'         => [ 'elmpath-gallery-justified' ],
			'data-settings' => [
				wp_json_encode( array_filter( [
						'rowHeight' => elmpath()->get_settings_atts( 'img_height', 220 ),
						'lastRow'   => elmpath()->get_settings_atts( 'last_row', 'nojustify' ),
						'captions'  => elmpath()->get_settings_atts( 'captions' ),
						'margins'   => elmpath()->get_settings_atts( 'margins', 0 ),
					] )
				),
			],
		],
	]
);


?>

<div <?php echo wp_kses_post( $args->get_render_attribute_string( 'gallery-justified' ) ); ?>>
	<?php foreach ( $gallery as $gallery_item ) :


		$img_url = elmpath()->get_settings_atts( 'url', '', elmpath()->get_settings_atts( 'img_id', '', $gallery_item ) );

		$title = elmpath()->get_settings_atts( 'title', 'Gallery Image', $gallery_item );

		if ( empty( $img_url ) ) {
			continue;
		}

		?>
        <div>
            <a href="<?php echo esc_url( $img_url ); ?>" class="gallery-zoom">
                <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $title ); ?>">
            </a>
        </div>

	<?php endforeach; ?>

</div>

