<?php
/**
 * Element Name: Post Grid
 *
 * @package elements/post-grid/view/template-1
 * @copyright Pluginbazar 2019
 */

$unique_id    = uniqid();
$style        = elmpath()->get_settings_atts( 'style' );
$content_type = elmpath()->get_settings_atts( 'content_type', 'by_posts' );
$btn_text     = elmpath()->get_settings_atts( 'btn_text', esc_html__( 'Read More', 'pb-postgrid' ) );;
$items_per_row   = elmpath()->get_settings_atts( 'items_per_row', '12' );
$readmore_style  = elmpath()->get_settings_atts( 'readmore_style', '1' );
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

                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 width="370"
                                 height="222" viewBox="0 0 370 222">
                                <defs>
                                    <linearGradient id="gradient-<?php echo esc_attr( $unique_id ); ?>"
                                                    x1="1"
                                                    x2="0.007" y2="1" gradientUnits="objectBoundingBox">
                                        <stop offset="0" stop-color="#ad2c2a"></stop>
                                        <stop offset="1" stop-color="#fbb446"></stop>
                                    </linearGradient>
                                </defs>
                                <path d="M2365,721.339s9.7-91.2,138.986-106.254S2691.2,593.285,2735,499.34c-.706-.519,0,222,0,222Z"
                                      transform="translate(-2365 -499.339)" opacity="0.04"
                                      fill="url(#gradient-<?php echo esc_attr( $unique_id ); ?>)"></path>
                            </svg>

                            <div class="post-meta">

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

								<?php printf( '<span class="post-meta-date"><span class="day">%s</span><span class="month">%s</span></span>', get_the_date( 'd' ), get_the_date( 'M' ) ); ?>
                            </div>

                            <h3 class="post-title">
                                <a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
                            </h3>
                            <div class="post-content">
								<?php echo wp_kses_post( wpautop( wp_trim_words( get_the_content( null, false ), $excerpt_length ) ) ); ?>
                            </div>
                            <div class="post-footer">

                                <div class="post-author">
                                    <div class="author-img">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             width="70" height="70" viewBox="0 0 70 70">
                                            <defs>
                                                <pattern id="author_img<?php echo esc_attr( $unique_id ); ?>"
                                                         width="1" height="1" viewBox="0 6.383 68.979 68.979">
                                                    <image preserveAspectRatio="xMidYMid slice" width="70" height="105"
                                                           xlink:href="<?php echo esc_url( get_avatar_url( get_the_author_meta( 'ID' ) ) ) ?>"></image>
                                                </pattern>
                                            </defs>
                                            <path d="M54.137,26.852c22.955,0,14.246,52.462,4.478,65.781S14.336,84.659,1.149,71.339,31.182,26.852,54.137,26.852Z"
                                                  transform="translate(1.303 -26.852)"
                                                  fill="url(#author_img<?php echo esc_attr( $unique_id ); ?>)"></path>
                                        </svg>
                                    </div>

                                    <div class="author-info">
                                        <span class="author-by"><?php esc_html_e( 'Story By', 'pb-postgrid' ) ?></span>
										<?php printf( '<h4 class="author-name"><a href="%s">%s</a></h4>', get_author_posts_url( get_the_author_meta( 'ID' ) ), get_the_author_meta( 'display_name' ) ); ?>
                                    </div>
                                </div>

                                <div class="post-read-more">

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
                </div>

			<?php endwhile; ?>
        </div>

		<?php if ( ! empty( $show_pagination ) ) {
			printf( '<div class="elmpath-pagination">%s</div>', elmpath_pagination( $wp_query, array( 'echo' => false ) ) );
		}

		wp_reset_query();
	endif; ?>

</div>