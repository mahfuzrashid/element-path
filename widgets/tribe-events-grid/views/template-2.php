<?php
/**
 * Widget Render: Tribe Events Grid
 *
 * @package widgets/tribe-events-grid/views/template-2.php
 * @copyright Pluginbazar 2020
 */

global $event;

$unique_id = uniqid();

$style          = elmpath()->get_settings_atts( 'style', '3' );
$items_per_row  = elmpath()->get_settings_atts( 'items_per_row', '3' );
$excerpt_length = elmpath()->get_settings_atts( 'excerpt_length', '14' );
$content_type   = elmpath()->get_settings_atts( 'content_type', 'by_latest_events' );

$show_thumbs  = elmpath()->get_settings_atts( 'show_thumbs' );
$show_date    = elmpath()->get_settings_atts( 'show_date' );
$show_title   = elmpath()->get_settings_atts( 'show_title' );
$show_desc    = elmpath()->get_settings_atts( 'show_desc' );
$show_cost    = elmpath()->get_settings_atts( 'show_cost' );
$show_website = elmpath()->get_settings_atts( 'show_website' );
$show_address = elmpath()->get_settings_atts( 'show_address' );

if ( $content_type == 'by_events_category' ) {
	$event_ids = get_posts( array(
		'posts_per_page' => - 1,
		'offset'         => 0,
		'orderby'        => 'post_date',
		'fields'         => 'ids',
		'order'          => 'DESC',
		'post_type'      => 'tribe_events',
		'post_status'    => 'publish',
		'tax_query'      => array(
			array(
				'taxonomy' => 'tribe_events_cat',
				'field'    => 'term_id',
				'terms'    => elmpath()->get_settings_atts( '_category' ),
			),
		)
	) );
} elseif ( $content_type == 'by_events_tags' ) {
	$event_ids = get_posts( array(
		'post_type'      => 'tribe_events',
		'posts_per_page' => - 1,
		'fields'         => 'ids',
		'tax_query'      => array(
			array(
				'taxonomy' => 'post_tag',
				'field'    => 'term_id',
				'terms'    => elmpath()->get_settings_atts( 'tag_ids' ),
			),
		)
	) );
} elseif ( $content_type == 'by_events' ) {
	$event_ids = elmpath()->get_settings_atts( 'product_ids' );
} elseif ( $content_type == 'by_custom' ) {
	$event_ids = explode( ',', elmpath()->get_settings_atts( 'custom_product_ids' ) );
} else {
	$event_ids = get_posts( array(
		'posts_per_page' => - 1,
		'offset'         => 0,
		'orderby'        => 'post_date',
		'fields'         => 'ids',
		'order'          => 'DESC',
		'post_type'      => 'tribe_events',
		'post_status'    => 'publish'
	) );

}

$event_ids = array_unique( $event_ids );
$length    = elmpath()->get_settings_atts( 'posts_per_page', count( $event_ids ) );
$event_ids = array_slice( $event_ids, 0, $length );

?>

<div class="elmpath-tribe-events elmpath-tribe-events-<?php echo esc_attr( $style ); ?>">

    <div class="pb-row">
		<?php foreach ( $event_ids as $index => $post_id ) :

			global $post;

			$post = tribe_get_event( $post_id );

			setup_postdata( $post );

			$has_thumb_class = ! has_post_thumbnail() || empty( $show_thumbs ) ? 'no-event-thumb' : '';

			?>

            <div class="pb-col-lg-<?php echo esc_attr( $items_per_row ); ?> pb-col-md-6">
                <div class="elmpath-event-item <?php echo esc_attr( $has_thumb_class ); ?>">

					<?php if ( has_post_thumbnail() && ! empty( $show_thumbs ) ) : ?>
                        <div class="elmpath-event-image">
                            <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                                <img src="<?php echo esc_url( get_the_post_thumbnail_url( $post_id ) ); ?>"
                                     alt="<?php echo esc_attr( get_the_title() ); ?>">
                            </a>
                        </div>
					<?php endif; ?>

                    <div class="elmpath-event-body">

						<?php if ( ! empty( $show_date ) ) : ?>
                            <div class="elmpath-event-date pb-tooltip"
                                 data-title="<?php esc_attr_e( 'Start Date: ', 'element-path' );
							     echo esc_attr( tribe_get_start_date() ); ?>  - <?php esc_attr_e( 'End Date: ', 'element-path' );
							     echo esc_attr( tribe_get_end_date() ); ?>">
								<?php echo esc_html( str_pad( tribe_get_start_date( null, false, 'M j, Y' ), 2, '0', STR_PAD_LEFT ) ); ?>
                            </div>
						<?php endif; ?>

	                    <?php if ( ! empty( $show_title ) ) : ?>
                            <h3 class="elmpath-event-title">
                                <a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
                            </h3>
	                    <?php endif; ?>


	                    <?php if ( ! empty( $show_desc ) ) : ?>
                            <div class="elmpath-event-content">
			                    <?php if ( has_excerpt() ) : ?>
				                    <?php echo apply_filters( 'tribe_event_excerpt', wp_trim_words( get_post_field( 'post_excerpt', get_the_ID() ), $excerpt_length ) ); ?>
			                    <?php elseif ( get_the_content() ) : ?>
				                    <?php echo apply_filters( 'tribe_event_content', wp_trim_words( get_post_field( 'post_content', get_the_ID() ), $excerpt_length ) ); ?>
			                    <?php endif; ?>
                            </div>
	                    <?php endif; ?>

                        <div class="elmpath-event-footer">

	                        <?php if ( ! empty( tribe_get_formatted_cost() ) && !empty( $show_cost ) ) : ?>
                                <div class="elmpath-event-price">
                                    <strong><?php esc_html_e( 'Cost:', 'element-path' ); ?></strong>
                                    <span><?php echo esc_html( tribe_get_formatted_cost() ); ?></span>
                                </div>
							<?php endif; ?>

                            <div class="address-website-icon">
	                            <?php if ( ! empty( tribe_get_event_website_url() ) && !empty( $show_website ) ) : ?>
                                    <a href="<?php echo esc_url( tribe_get_event_website_url() ); ?>" target="_blank"
                                       class="elmpath-icofont-earth"
                                       aria-hidden="true"></a>
	                            <?php endif; ?>

	                            <?php if ( tribe_address_exists() && !empty( $show_address ) ) : ?>
                                    <span class="pb-tooltip"
                                          data-title="<?php echo esc_attr( preg_replace( '/\s+/', ' ', wp_strip_all_tags( tribe_get_full_address() ) ) ); ?>"><i
                                                class="elmpath-icofont-map-marker" aria-hidden="true"></i></span>
	                            <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

			<?php wp_reset_postdata();
		endforeach; ?>
    </div>
</div>