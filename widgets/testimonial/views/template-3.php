<?php
/**
 * Widget Render: Testimonial
 *
 * @package widgets/testimonial/views/template-3.php
 * @copyright Pluginbazar 2020
 */
$unique_id = uniqid();

$style           = elmpath()->get_settings_atts( 'style', '1' );
$_image          = elmpath()->get_settings_atts( '_image' );
$image_url       = wp_get_attachment_image_url( elmpath()->get_settings_atts( 'id', '', $_image ), 'thumbnail' );
$_name           = elmpath()->get_settings_atts( '_name' );
$designation     = elmpath()->get_settings_atts( 'designation' );
$review_text     = elmpath()->get_settings_atts( 'review_text' );
$rating          = (float) elmpath()->get_settings_atts( 'rating', 0 );
$primary_color   = elmpath()->get_settings_atts( 'primary_color', '#E91E63' );
$secondary_color = elmpath()->get_settings_atts( 'secondary_color', '#5828bb' );

?>

<div class="elmpath-testimonial elmpath-testimonial-<?php echo esc_attr( $style ); ?>">

    <div class="elmpath-testi-img">
        <img src="<?php echo esc_url( $image_url ) ?>" alt="<?php echo esc_html( $_name ) ?>">
    </div>
	<?php
	if ( ! empty( $review_text ) ) {
		printf( '<div class="elmpath-testi-desc">%s%s</div>', $style == 4 ? '<i class="fa fa-quote-right elmpath-quote"></i>' : '' ,wpautop( $review_text ) );
	}
	?>

    <div class="elmpath-testi-info">
		<?php
		if ( ! empty( $_name ) ) {
			printf( '<h3 class="elmpath-testi-name">%s</h3>', esc_html( $_name ) );
		}

		if ( ! empty( $designation ) ) {
			printf( '<span class="elmpath-testi-designation">%s</span>', esc_html( $designation ) );
		}
		?>

        <div class="elmpath-testi-rating">
			<?php
			for ( $index = 1; $index <= 5; $index ++ ) {
				if ( $rating != 0 && $index <= $rating ) {
					echo wp_kses_post( '<i class="elmpath-icofont-star-full"></i>' );
				} else if ( abs( $rating - $index ) === 0.5 ) {
					echo wp_kses_post( '<i class="elmpath-icofont-star-half"></i>' );
				} else {
					echo wp_kses_post( '<i class="elmpath-icofont-star-empty"></i>' );
				}
			}
			?>
        </div>
    </div>

	<?php if ( $style == '3' ) : ?>

        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="184"
             height="89" viewBox="0 0 184 89">
            <defs>
                <linearGradient id="lg1-<?php echo esc_attr( $unique_id ); ?>" x1="0.5" x2="0.5" y2="1"
                                gradientUnits="objectBoundingBox">
                    <stop offset="0"
                          stop-color="<?php echo esc_attr( $primary_color ); ?>"></stop>
                    <stop offset="1"
                          stop-color="<?php echo esc_attr( $secondary_color ); ?>"></stop>
                </linearGradient>
                <linearGradient id="lg2-<?php echo esc_attr( $unique_id ); ?>" x1="0.5" x2="0.5" y2="1"
                                gradientUnits="objectBoundingBox">
                    <stop offset="0"
                          stop-color="<?php echo esc_attr( $secondary_color ); ?>"></stop>
                    <stop offset="1"
                          stop-color="<?php echo esc_attr( $primary_color ); ?>"></stop>
                </linearGradient>
            </defs>
            <g transform="translate(-711 -860)">
                <path d="M131.091-5.321C81.815-26.421,32.026-14.712.085,2.487s-46.036,39.888,3.24,60.987,76.42.111,108.361-17.088S180.367,15.778,131.091-5.321Z"
                      transform="translate(739.886 876.661)" opacity="0.9"
                      fill="url(#lg1-<?php echo esc_attr( $unique_id ); ?>)"></path>
                <path d="M-4.863-5.321c49.276-21.1,99.064-9.391,131.006,7.808s46.036,39.888-3.24,60.987-76.42.111-108.361-17.088S-54.139,15.778-4.863-5.321Z"
                      transform="translate(739.886 876.661)" opacity="0.8"
                      fill="url(#lg2-<?php echo esc_attr( $unique_id ); ?>)"></path>
            </g>
        </svg>

	<?php endif; ?>
</div>
