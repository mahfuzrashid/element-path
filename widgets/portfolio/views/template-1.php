<?php
/**
 * Widget Render: Portfolio
 *
 * @package widgets/portfolio/views/template-1.php
 * @copyright Pluginbazar 2020
 */

$unique_id     = uniqid();
$style         = elmpath()->get_settings_atts( 'style' );
$portfolios    = elmpath()->get_settings_atts( 'portfolios' );
$items_per_row = elmpath()->get_settings_atts( 'items_per_row' );

?>


<div id="elmpath-portfolio<?php echo esc_attr( $unique_id ); ?>"
     class="elmpath-portfolio elmpath-portfolio-<?php echo esc_attr( $style ); ?>">
    <div class="pb-row">
		<?php foreach ( $portfolios as $portfolio ) :

			$title = elmpath()->get_settings_atts( 'title', '', $portfolio );
			$p_link = elmpath()->get_settings_atts( 'p_link', '', $portfolio );
			$p_url = elmpath()->get_settings_atts( 'url', '', $p_link );

			$img_url = elmpath()->get_settings_atts( 'url', '', elmpath()->get_settings_atts( 'img_id', '', $portfolio ) );

			$category      = elmpath()->get_settings_atts( 'category', '', $portfolio );
			$author        = elmpath()->get_settings_atts( 'author', '', $portfolio );
			$author_url    = elmpath()->get_settings_atts( 'url', '', elmpath()->get_settings_atts( 'author_url', '', $portfolio ) );
			$btn_hire_text = elmpath()->get_settings_atts( 'btn_hire_text', '', $portfolio );
			$btn_hire_url  = elmpath()->get_settings_atts( 'url', '', elmpath()->get_settings_atts( 'btn_hire_url', '', $portfolio ) );

			?>
            <div class="pb-col-lg-<?php echo esc_attr( $items_per_row ); ?> pb-col-md-6">

                <div class="elmpath-portfolio-item">

					<?php if ( ! empty( $img_url ) ) : ?>
                        <div class="image-wrap">
                            <a href="<?php echo esc_url( $p_url ); ?>">
                                <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $title ); ?>">
                            </a>
                            <span class="p-category"><?php echo esc_html( $category ); ?></span>
                        </div>
					<?php endif; ?>

                    <div class="p-info">
						<?php if ( ! empty( $p_url ) && ! empty( $title ) ) : ?>
                            <h3 class="p-title">
                                <a href="<?php echo esc_url( $p_url ); ?>"><?php echo esc_html( $title ); ?></a>
                            </h3>
						<?php endif; ?>

						<?php if ( ! empty( $author ) ) : ?>
                            <div class="p-author"><a
                                        href="<?php echo esc_url( $author_url ); ?>"><?php echo esc_html( $author ); ?></a>
                            </div>
						<?php endif; ?>

                        <div class="p-footer">
							<?php if ( ! empty( $btn_hire_url ) ) : ?>
                                <a href="<?php echo esc_url( $btn_hire_url ); ?>"
                                   class="btn-hire"><?php echo esc_html( $btn_hire_text ); ?></a>
							<?php endif; ?>

                            <ul class="elmpath-p-social">

                                <li><a href="//www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( $p_url ); ?>"><i class="fa fa-facebook"></i></a>
                                </li>

                                <li><a href="//twitter.com/share?url=<?php echo esc_url( $p_url ); ?>"><i class="fa fa-twitter"></i></a>
                                </li>

                                <li><a href="//pinterest.com/pin/create/button/?url=<?php echo esc_url( $p_url ); ?>"><i
                                                class="fa fa-pinterest"></i></a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
		<?php endforeach; ?>
    </div>
</div>