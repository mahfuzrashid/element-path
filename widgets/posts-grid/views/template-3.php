<?php
/**
 * Element Name: Post Grid
 *
 * @package elements/post-grid/view/template-3
 * @copyright Pluginbazar 2019
 */

$unique_id    = uniqid();
$style        = elmpath()->get_settings_atts('style' );
$content_type = elmpath()->get_settings_atts('content_type', 'by_latest_posts' );
$btn_text     = elmpath()->get_settings_atts('btn_text', esc_html__( 'Read More', 'pb-postgrid' ) );;
$items_per_row   = elmpath()->get_settings_atts('items_per_row', '12' );
$readmore_style  = elmpath()->get_settings_atts('readmore_style', '1' );
$excerpt_length  = elmpath()->get_settings_atts('excerpt_length', 24 );
$show_pagination = elmpath()->get_settings_atts('show_pagination' );

$query_args = array(
	'post_type'      => 'post',
	'post__in'       => array_unique( elmpath()->get_post_ids( $content_type ) ),
	'posts_per_page' => elmpath()->get_settings_atts('posts_per_page', - 1 ),
	'paged'          => ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1,
);

$wp_query = new WP_Query( $query_args );


?>

<div id="elmpath-post-grid-<?php echo esc_attr( $unique_id ); ?>"
     class="elmpath-post-grid-<?php echo esc_attr( $style ); ?>">
	<?php if ( $wp_query->have_posts() ) : ?>
        <div class="pb-row">
			<?php while ( $wp_query->have_posts() ) : $wp_query->the_post();
				$categories = get_the_category();
				?>

                <div class="pb-col-lg-<?php echo esc_attr( $items_per_row ); ?> pb-col-md-6 pb-grid-item">
                    <div class="post-item">

						<?php if ( has_post_thumbnail() ) : ?>
                            <div class="post-image">
                                <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                                    <img src="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>"
                                         alt="<?php echo esc_attr( get_the_title() ); ?>">
                                </a>
                            </div>
						<?php endif; ?>

                        <div class="post-body">
                            <div class="post-meta">

								<?php if ( ! empty( $categories ) ) : ?>
                                    <div class="post-categories">
                                        <i class="elmpath-icofont-briefcase" aria-hidden="true"></i>
										<?php $index = 0;
										foreach ( $categories as $category ) : $index ++;
											if ( $index > 1 ) {
												continue;
											} ?>
                                            <a href="<?php echo esc_url( get_category_link( $category->term_id ) ) ?>"><?php echo esc_html( $category->name ); ?></a>
										<?php endforeach; ?>

										<?php if ( count( $categories ) > 1 ) : ?>
                                            <div class="post-categories-all">
                                                <span><?php echo esc_html( '+' ); ?><?php echo esc_html( count( $categories ) - 1 ); ?></span>
                                                <div class="post-categories-dropdown">
													<?php $index = 0;
													foreach ( $categories as $category ) : $index ++;
														if ( $index == 1 ) {
															continue;
														} ?>
                                                        <a href="<?php echo esc_url( get_category_link( $category->term_id ) ) ?>"><?php echo esc_html( $category->name ); ?></a>
													<?php endforeach; ?>
                                                </div>
                                            </div>
										<?php endif; ?>

                                    </div>
								<?php endif; ?>

								<?php printf( '<span class="post-meta-date"><span class="day">%s</span><span class="month">%s</span></span>', get_the_date( 'd' ), get_the_date( 'M' ) ); ?>
                                <span class="post-comments"><i
                                            class="elmpath-icofont-eye"></i> <?php comments_number( esc_html__( 'No Comments', 'pb-postgrid' ), esc_html__( 'One Comment', 'pb-postgrid' ), esc_html__( '% Comments', 'pb-postgrid' ) ); ?></span>
                            </div>

                            <h3 class="post-title">
                                <a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
                            </h3>
                            <div class="post-content">
								<?php echo wp_kses_post( wpautop( wp_trim_words( get_the_content( null, false ), $excerpt_length ) ) ); ?>
                            </div>
                            <div class="post-footer">
								<?php if ( $readmore_style == '2' ) : ?>
                                    <a href="<?php echo esc_url( get_the_permalink() ); ?>"
                                       class="post-btn-2">
                                        <i class="elmpath-icofont-arrow-right"></i>
                                    </a>
								<?php else : ?>
                                    <a href="<?php echo esc_url( get_the_permalink() ); ?>"
                                       class="post-btn"><?php echo esc_html( $btn_text ); ?> <i
                                                class="elmpath-icofont-arrow-right"></i></a>
								<?php endif; ?>
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