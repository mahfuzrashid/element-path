<?php
/**
 * Widget Render: Timeline
 *
 * @package widgets/timeline/views/template-1.php
 * @copyright Pluginbazar 2020
 */

use Elementor\Icons_Manager;

$unique_id = uniqid();

$style          = elmpath()->get_settings_atts( 'style', '1' );
$timeline_icons = elmpath()->get_settings_atts( 'timeline_icons' );
$excerpt_length = elmpath()->get_settings_atts( 'excerpt_length', 20 );

if ( ! isset( $settings['social_icon'] ) && ! Icons_Manager::is_migration_allowed() ) {
	$social_icon = 'fab fab-home';
}


$post_ids = get_posts( array(
	'posts_per_page' => - 1,
	'offset'         => 0,
	'orderby'        => 'post_date',
	'fields'         => 'ids',
	'order'          => 'DESC',
	'post_type'      => 'post',
	'post_status'    => 'publish'
) );

?>


<div id="timeline-<?php echo esc_attr( $unique_id ); ?>" class="elmpath-timeline-horizontal timeline">

    <div class="timeline__wrap">
        <div class="timeline__items">

			<?php foreach ( $post_ids as $index => $post_id ) :

				global $post;
				$post = get_post( $post_id );
				setup_postdata( $post );
				$this_post = get_post( $post_id );
				$this_icon = isset( $timeline_icons[ $index ] ) ? $timeline_icons[ $index ] : array();

				$icon = isset( $this_icon['_icon']['value'] ) ? $this_icon['_icon']['value'] : '';

				?>

                <div class="timeline__item">
                    <div class="timeline__content">

						<?php if ( ! empty( $icon ) ) : ?>
                            <div class="timeline-icon">
                                <i class="<?php echo esc_attr( $icon ); ?>"></i>
                            </div>
						<?php endif; ?>
						<?php printf( '<span class="post-meta-date">%s</span>', get_the_date( 'M Y', $post_id ) ); ?>
                        <h3 class="post-title"><a
                                    href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
                        </h3>
						<?php printf( '<p>%s</p>', wpautop( wp_trim_words( get_the_content( null, false, $post_id ), $excerpt_length ) ) ) ?>
                    </div>
                </div>
				<?php wp_reset_postdata();
			endforeach; ?>

        </div>
    </div>

</div>