<?php
/**
 * Widget Render: Portfolio
 *
 * @package widgets/portfolio/views/template-3.php
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
                        <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $title ); ?>">
		            <?php endif; ?>

                    <div class="p-info">
			            <?php if ( ! empty( $p_url ) ) : ?>
                            <a class="p-link" href="<?php echo esc_url( $p_url ); ?>"><i class="fa fa-link"></i></a>
			            <?php endif; ?>
                        <p class="p-category"><?php echo esc_html( $category ); ?></p>
			            <?php if ( ! empty( $p_url ) && ! empty( $title ) ) : ?>
                            <h3 class="p-title">
                                <a href="<?php echo esc_url( $p_url ); ?>"><?php echo esc_html( $title ); ?></a>
                            </h3>
			            <?php endif; ?>
                    </div>
                </div>

            </div>
		<?php endforeach; ?>
    </div>
</div>