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
$posts_per_page = elmpath()->get_settings_atts( 'posts_per_page', '-1' );
$btn_text       = elmpath()->get_settings_atts( 'btn_text', 'Read More' );
$excerpt_length = elmpath()->get_settings_atts( 'excerpt_length', 20 );

if ( ! isset( $settings['social_icon'] ) && ! Icons_Manager::is_migration_allowed() ) {
	$social_icon = 'fab fab-home';
}


$post_ids = get_posts( array(
	'posts_per_page' => $posts_per_page,
	'offset'         => 0,
	'orderby'        => 'post_date',
	'fields'         => 'ids',
	'order'          => 'DESC',
	'post_type'      => 'post',
	'post_status'    => 'publish'
) );

?>

<div class="elmpath-timeline-<?php echo esc_attr( $style ); ?>">

	<?php foreach ( $post_ids as $index => $post_id ) :

		global $post;

		$post = get_post( $post_id );

		setup_postdata( $post );

		$post_img_url = get_the_post_thumbnail_url( $post_id );
		$this_post    = get_post( $post_id );
		$post_author  = get_user_by( 'ID', $this_post->post_author );
		$this_icon    = isset( $timeline_icons[ $index ] ) ? $timeline_icons[ $index ] : array();

		$icon = isset( $this_icon['_icon']['value'] ) ? $this_icon['_icon']['value'] : '';


		?>

        <div class="timeline-single">

			<?php if ( $style == '4' ) : ?>
                <div class="timeline-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 60 60">
                        <path d="M29.007,60C43.3,60,64.733,22.105,57.588,9.474S7.571-3.158.426,9.474,14.716,60,29.007,60Z"
                              transform="translate(0.993)"
                              fill="<?php echo esc_attr( ! empty( $primary_color ) ? $primary_color : '#9c88ff' ); ?>"></path>
                    </svg>
                    <i class="<?php echo esc_attr( $icon ); ?>"></i>
                </div>
			<?php endif; ?>

            <div class="timeline-content">
				<?php if ( ! empty( $post_img_url ) ) : ?>
                    <div class="post-image">
                        <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                            <img src="<?php echo esc_url( $post_img_url ); ?>"
                                 alt="<?php echo esc_attr( get_the_title() ); ?>">
                        </a>
                    </div>
				<?php endif; ?>

                <div class="post-body">
                    <div class="post-meta">
						<?php printf( '<span class="post-author"><i class="fa fa-user"></i> <a href="%s">%s</a></span>', get_author_posts_url( $post_author->ID ), ucwords( $post_author->display_name ) ); ?>
						<?php printf( '<span class="post-meta-date">%s</span>', get_the_date( 'M Y', $post_id ) ); ?>
                    </div>
                    <h3 class="post-title">
                        <a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
                    </h3>
                    <div class="post-content">
						<?php echo wp_kses_post( wpautop( wp_trim_words( get_the_content( null, false, $post_id ), $excerpt_length ) ) ); ?>
                    </div>
                    <div class="post-footer">
                        <a href="<?php echo esc_url( get_the_permalink() ); ?>"
                           class="post-btn"><?php echo esc_html( $btn_text ); ?> <i
                                    class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

		<?php wp_reset_postdata();
	endforeach; ?>

</div>