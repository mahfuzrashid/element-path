<?php
/**
 * Widget Render: Testimonial
 *
 * @package widgets/testimonial/views/template-1.php
 * @copyright Pluginbazar 2020
 */
$unique_id = uniqid();

$style       = elmpath()->get_settings_atts( 'style', '1' );
$_image      = elmpath()->get_settings_atts( '_image' );
$image_url   = wp_get_attachment_image_url( elmpath()->get_settings_atts( 'id', '', $_image ), 'thumbnail' );
$_name       = elmpath()->get_settings_atts( '_name' );
$designation = elmpath()->get_settings_atts( 'designation' );
$review_text = elmpath()->get_settings_atts( 'review_text' );
$rating      = (float) elmpath()->get_settings_atts( 'rating', 0 );

?>

<div class="elmpath-testimonial elmpath-testimonial-<?php echo esc_attr( $style ); ?>">

    <div class="elmpath-testi-desc">
		<?php
		if ( ! empty( $review_text ) ) {
			printf( '<div class="elmpath-review-text">%s</div>', wpautop( $review_text ) );
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

    <div class="elmpath-testi-footer">
        <div class="elmpath-testi-img">
            <img src="<?php echo esc_url( $image_url ) ?>" alt="<?php echo esc_html( $_name ) ?>">
        </div>

        <div class="elmpath-testi-info">
			<?php
                if ( ! empty( $_name ) ) {
                    printf( '<h3 class="elmpath-testi-name">%s</h3>', esc_html( $_name ) );
                }

                if ( ! empty( $designation ) ) {
                    printf( '<span class="elmpath-testi-designation">%s</span>', esc_html( $designation ) );
                }
			?>
        </div>
    </div>
</div>
