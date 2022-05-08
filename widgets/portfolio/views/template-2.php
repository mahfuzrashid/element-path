<?php
/**
 * Widget Render: Portfolio
 *
 * @package widgets/portfolio/views/template-2.php
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


			?>
            <div class="pb-col-lg-<?php echo esc_attr( $items_per_row ); ?> pb-col-md-6">

                <div class="elmpath-portfolio-item">
	                <?php if ( ! empty( $img_url ) ) : ?>
                        <div class="image-wrap">
                            <a href="<?php echo esc_url( $p_url ); ?>">
                                <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $title ); ?>">
                            </a>
                        </div>
	                <?php endif; ?>

                    <div class="p-info">

                        <div class="elmpath-shape">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 384 204">
                                <path d="M0,0S71.342-99.681,189.008-51.19,384-104,384-104V100H0Z" transform="translate(0 104)"
                                      opacity="0.76"></path>
                            </svg>
                        </div>

                        <div class="p-title-wrap">
                            <span class="p-category"><?php echo esc_html( $category ); ?></span>
	                        <?php if ( ! empty( $p_url ) && ! empty( $title ) ) : ?>
                                <h3 class="p-title">
                                    <a href="<?php echo esc_url( $p_url ); ?>"><?php echo esc_html( $title ); ?></a>
                                </h3>
	                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
		<?php endforeach; ?>
    </div>
</div>