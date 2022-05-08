<?php
/**
 * Widget Render: Timeline
 *
 * @package widgets/timeline/views/template-1.php
 * @copyright Pluginbazar 2020
 */

use Elementor\Icons_Manager;

$unique_id = uniqid();

$style            = elmpath()->get_settings_atts( 'style', '1' );
$posts_per_page = elmpath()->get_settings_atts( 'posts_per_page', '-1' );
$btn_text       = elmpath()->get_settings_atts( 'btn_text', 'Read More' );
$excerpt_length = elmpath()->get_settings_atts( 'excerpt_length', 20 );

if ( ! isset( $settings['social_icon'] ) && ! Icons_Manager::is_migration_allowed() ) {
	$social_icon = 'fab fab-home';
}


$post_ids = get_posts( array(
	'posts_per_page' => $posts_per_page,
	'offset'      => 0,
	'orderby'     => 'post_date',
	'fields'      => 'ids',
	'order'       => 'DESC',
	'post_type'   => 'post',
	'post_status' => 'publish'
) );


?>


<div class="elmpath-timeline-<?php echo esc_attr( $style ); ?>">

	<?php foreach ( $post_ids as $index => $post_id ) :

		global $post;

		$post = get_post( $post_id );

		setup_postdata( $post );

		$post_img_url = get_the_post_thumbnail_url( $post_id );
		$this_post    = get_post( $post_id );
		$categories   = get_the_category( $post_id );
		$category     = reset( $categories );
		?>

        <div class="timeline-single pb-row">

            <div class="pb-col-lg-3">
                <div class="timeline-info">
                    <div class="author">
                        <img src="<?php echo esc_url( get_avatar_url( get_the_author_meta( 'ID' ) ) ) ?>"
                             alt="<?php echo esc_attr( get_the_author_meta( 'display_name' ) ); ?>">
                        <div class="author-info">
                            <h4 class="author-name"><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?></h4>
                            <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
                        </div>
                    </div>
					<?php printf( '<p class="post-meta-date">%s</p>', get_the_date( 'M jS, Y', $post_id ) ); ?>
                </div>
            </div>

            <div class="pb-col-lg-9">
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
        </div>

		<?php wp_reset_postdata();
	endforeach; ?>

</div>