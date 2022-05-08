<?php
/**
 * Widget Render: Pricing
 *
 * @package widgets/pricing/views/template-1.php
 * @copyright Pluginbazar 2020
 */

use Elementor\Icons_Manager;

$unique_id   = uniqid( 'gradient-p' );
$unique_id_2 = uniqid( 'gradient-s' );

$style            = elmpath()->get_settings_atts( 'style', '1' );
$_image           = elmpath()->get_settings_atts( '_image' );
$img_url          = wp_get_attachment_image_url( elmpath()->get_settings_atts( 'id', '', $_image ), 'full' );
$_featured        = elmpath()->get_settings_atts( '_featured' );
$featured_class   = $_featured == 'yes' ? ' is-featured' : '';
$choose_media     = elmpath()->get_settings_atts( 'choose_media' );
$_icon            = elmpath()->get_settings_atts( '_icon' );
$highlighted_text = elmpath()->get_settings_atts( 'highlighted_text' );
$features         = elmpath()->get_settings_atts( 'features' );

$sale_price    = elmpath()->get_settings_atts( 'sale_price' );
$regular_price = elmpath()->get_settings_atts( 'regular_price' );
$currency      = elmpath()->get_settings_atts( 'currency' );
$short_desc    = elmpath()->get_settings_atts( 'short_desc' );
$btn_text    = elmpath()->get_settings_atts( 'btn_text' );
$btn_url    = elmpath()->get_settings_atts( 'btn_url' );

$primary_color    = elmpath()->get_settings_atts( 'primary_color' );
$secondary_color    = elmpath()->get_settings_atts( 'secondary_color' );
?>


<div class="elmpath-pricing elmpath-pricing-<?php echo esc_attr( $style . $featured_class ); ?>">
    <div class="pricing-head">

        <div class="pricing-head">

	        <?php if ( ! empty( $_icon['value'] ) || ! empty( $img_url ) ): ?>
                <div class="pricing-icon">

                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100"
                         height="109.135" viewBox="0 0 100 109.135">
                        <defs>
                            <linearGradient id="<?php echo esc_attr( $unique_id ); ?>" x1="0.5" x2="0.5" y2="1"
                                            gradientUnits="objectBoundingBox">
                                <stop offset="0"
                                      stop-color="<?php echo esc_attr( ! empty( $primary_color ) ? $primary_color : '#ff2a3d' ); ?>"></stop>
                                <stop offset="1"
                                      stop-color="<?php echo esc_attr( ! empty( $secondary_color ) ? $secondary_color : '#ff6b81' ); ?>"></stop>
                            </linearGradient>
                            <linearGradient id="<?php echo esc_attr( $unique_id_2 ); ?>" x1="0.5" x2="0.5" y2="1"
                                            gradientUnits="objectBoundingBox">
                                <stop offset="0"
                                      stop-color="<?php echo esc_attr( ! empty( $primary_color ) ? $primary_color : '#FF4757' ); ?>"></stop>
                                <stop offset="1"
                                      stop-color="<?php echo esc_attr( ! empty( $secondary_color ) ? $secondary_color : '#ff6b81' ); ?>"></stop>
                            </linearGradient>
                        </defs>
                        <g transform="translate(-1652.788 -752.865)">
                            <path d="M48.337,100c23.817,0,59.543-63.158,47.635-84.211S12.611-5.263.7,15.789,24.519,100,48.337,100Z"
                                  transform="translate(1751.124 852.865) rotate(180)" opacity="0.16"
                                  fill="url(#<?php echo esc_attr( $unique_id ); ?>)"></path>
                            <path d="M48.337,0C72.154,0,107.88,63.158,95.971,84.211S12.611,105.263.7,84.211,24.519,0,48.337,0Z"
                                  transform="translate(1751.124 862) rotate(180)"
                                  fill="url(#<?php echo esc_attr( $unique_id_2 ); ?>)"></path>
                        </g>
                    </svg>

			        <?php if ( $choose_media == 'choose_image' ): ?>
                        <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $highlighted_text ); ?>">
			        <?php else: ?>
                        <i class="<?php echo esc_attr( $_icon['value'] ); ?>"></i>
			        <?php endif; ?>
                </div>
	        <?php endif; ?>

	        <?php if ( ! empty( $highlighted_text ) ) : ?>
                <h4 class="pricing-duration"><?php echo esc_html( $highlighted_text ) ?></h4>
	        <?php endif; ?>

		    <?php if ( ! empty( $sale_price ) || ! empty( $regular_price ) ) : ?>
                <div class="price <?php echo esc_attr( ! empty( $sale_price ) ? 'has-sale-price' : '' ); ?>">
				    <?php if ( ! empty( $regular_price ) ) : ?>
                        <span class="regular-price">
                        <span class="currency"><?php echo esc_html( $currency ); ?></span><?php echo esc_html( $regular_price ); ?>
                    </span>
				    <?php endif; ?>
				    <?php if ( ! empty( $sale_price ) ) : ?>
                        <span class="sale-price">
                        <span class="currency"><?php echo esc_html( $currency ); ?></span><?php echo esc_html( $sale_price ); ?>
                    </span>
				    <?php endif; ?>
				    <?php if ( ! empty( $short_desc ) ) : ?>
                        <span class="pricing-title"><?php echo esc_html( $short_desc ); ?></span>
				    <?php endif; ?>
                </div>
		    <?php endif; ?>
        </div>

    </div>

    <div class="pricing-content">
        <ul>
			<?php foreach ( $features as $feature ) :

				$feature_text = isset( $feature['feature_text'] ) && ! empty( $feature['feature_text'] ) ? $feature['feature_text'] : '';

				$feature_in = $feature['feature_in'] == 'no' || empty( $feature['feature_in'] ) ? ' feature-not-in' : 'feature-in';
				?>

                <li class="<?php echo esc_attr( $feature_in ); ?>"><span class="check-close-icon"></span> <?php echo esc_html( $feature_text ); ?></li>
			<?php endforeach; ?>
        </ul>
    </div>

	<?php if ( ! empty( $btn_url['url'] ) ) : ?>
        <div class="pricing-footer">
            <a href="<?php echo esc_url( $btn_url['url'] ); ?>" <?php echo wp_kses_post( !empty( $btn_url['is_external'] ) ? 'target="_blank"' : '' ); ?>><?php echo esc_html( $btn_text ); ?></a>
        </div>
	<?php endif; ?>

	<?php if ( ! empty( $featured_class ) ) : ?>
        <div class="elmpath-bubbles">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="440" height="247"
                 viewBox="0 0 440 247">
                <defs>
                    <linearGradient id="<?php echo esc_attr( $unique_id ); ?>" x1="0.5" x2="0.5" y2="1"
                                    gradientUnits="objectBoundingBox">
                        <stop offset="0"
                              stop-color="<?php echo esc_attr( ! empty( $primary_color ) ? $primary_color : '#f19886' ); ?>"></stop>
                        <stop offset="1"
                              stop-color="<?php echo esc_attr( ! empty( $secondary_color ) ? $secondary_color : '#f6e1c2' ); ?>"></stop>
                    </linearGradient>
                </defs>
                <g transform="translate(-722 -822)">
                    <path d="M82,0A82,82,0,1,1,0,82,82,82,0,0,1,82,0Z" transform="translate(998 872)"
                          fill="url(#<?php echo esc_attr( $unique_id ); ?>)"></path>
                    <circle cx="103.5" cy="103.5" r="103.5" transform="translate(895 822)" opacity="0.5"
                            fill="url(#<?php echo esc_attr( $unique_id ); ?>)"></circle>
                    <circle cx="82" cy="82" r="82" transform="translate(722 849)" opacity="0.5"
                            fill="url(#<?php echo esc_attr( $unique_id ); ?>)"></circle>
                    <circle cx="82" cy="82" r="82" transform="translate(787 905)"
                            fill="url(#<?php echo esc_attr( $unique_id ); ?>)"></circle>
                </g>
            </svg>
        </div>
	<?php endif; ?>
</div>