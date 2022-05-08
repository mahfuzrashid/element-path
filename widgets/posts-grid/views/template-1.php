<?php
/**
 * Element Name: Post Grid
 *
 * @package elements/post-grid/view/template-1
 * @copyright Pluginbazar 2019
 */

$unique_id    = uniqid();
$style        = elmpath()->get_settings_atts( 'style' );
$content_type = elmpath()->get_settings_atts( 'content_type', 'by_latest_posts' );
$btn_text     = elmpath()->get_settings_atts( 'btn_text', esc_html__( 'Read More', 'element-path' ) );;
$items_per_row   = elmpath()->get_settings_atts( 'items_per_row', '4' );
$excerpt_length  = elmpath()->get_settings_atts( 'excerpt_length', 24 );
$show_pagination = elmpath()->get_settings_atts( 'show_pagination' );

$query_args = array(
	'post_type'      => 'post',
	'post__in'       => array_unique( elmpath()->get_post_ids( $content_type ) ),
	'posts_per_page' => elmpath()->get_settings_atts( 'posts_per_page', - 1 ),
	'paged'          => ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1,
);

$wp_query = new WP_Query( $query_args );

?>

<div id="elmpath-post-grid-<?php echo esc_attr( $unique_id ); ?>"
     class="elmpath-post-grid-<?php echo esc_attr( $style ); ?>">
	<?php if ( $wp_query->have_posts() ) : ?>
        <div class="pb-row">
			<?php while ( $wp_query->have_posts() ) : $wp_query->the_post();

				$post_img_url = get_the_post_thumbnail_url();
				$post_author  = get_user_by( 'ID', get_the_author_meta( 'ID' ) );

				?>

                <div class="pb-col-lg-<?php echo esc_attr( $items_per_row ); ?> pb-col-md-6 pb-grid-item">
                    <div class="post-item">

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
								<?php printf( '<span class="post-author"><i class="elmpath-icofont-user"></i> <a href="%s">%s</a></span>', get_author_posts_url( $post_author->ID ), ucwords( $post_author->display_name ) ); ?>
								<?php printf( '<span class="post-meta-date"><i class="elmpath-icofont-clock"></i> %s</span>', get_the_date( 'M jS, Y' ) ); ?>
                            </div>
                            <h3 class="post-title">
                                <a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
                            </h3>
                            <div class="post-content">
								<?php echo wp_kses_post( wpautop( wp_trim_words( get_the_content( null, false ), $excerpt_length ) ) ); ?>
                            </div>
                            <div class="post-footer">
                                <a href="<?php echo esc_url( get_the_permalink() ); ?>"
                                   class="post-btn"><?php echo esc_html( $btn_text ); ?> <i
                                            class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

			<?php endwhile; ?>
        </div>

		<?php if ( ! empty( $show_pagination ) ) {
			printf( '<div class="elmpath-pagination">%s</div>', elmpath_pagination( $wp_query, array( 'echo' => false ) ) );
		}

		wp_reset_query();
	endif; ?>

</div>