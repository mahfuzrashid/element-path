<?php
/**
 * Widget Render: Pricing
 *
 * @package widgets/pricing/views/template-1.php
 * @copyright Pluginbazar 2020
 */

$unique_id   = uniqid( 'gradient-p' );
$unique_id_2 = uniqid( 'gradient-s' );

$style            = elmpath()->get_settings_atts( 'style', '1' );
$_featured        = elmpath()->get_settings_atts( '_featured' );
$featured_class   = $_featured == 'yes' ? ' is-featured' : '';
$highlighted_text = elmpath()->get_settings_atts( 'highlighted_text' );
$features         = elmpath()->get_settings_atts( 'features' );

$sale_price    = elmpath()->get_settings_atts( 'sale_price' );
$regular_price = elmpath()->get_settings_atts( 'regular_price' );
$currency      = elmpath()->get_settings_atts( 'currency' );
$short_desc    = elmpath()->get_settings_atts( 'short_desc' );
$btn_text      = elmpath()->get_settings_atts( 'btn_text' );
$btn_url       = elmpath()->get_settings_atts( 'btn_url' );

?>


<div class="elmpath-pricing elmpath-pricing-<?php echo esc_attr( $style . $featured_class ); ?>">
    <div class="pricing-head">

		<?php if ( ! empty( $highlighted_text ) ) : ?>
            <h4 class="pricing-duration"><?php echo esc_html( $highlighted_text ) ?></h4>
		<?php endif; ?>

		<?php if ( ! empty( $sale_price ) || ! empty( $regular_price ) ) : ?>
            <div class="price <?php echo esc_attr( ! empty( $sale_price ) ? 'has-sale-price' : '' ); ?>">
				<?php if ( ! empty( $sale_price ) ) : ?>
                    <span class="sale-price">
                        <span class="currency"><?php echo esc_html( $currency ); ?></span><?php echo esc_html( $sale_price ); ?>
                    </span>
				<?php endif; ?>

				<?php if ( ! empty( $regular_price ) ) : ?>
                    <span class="regular-price">
                        <span class="currency"><?php echo esc_html( $currency ); ?></span><?php echo esc_html( $regular_price ); ?>
                    </span>
				<?php endif; ?>
            </div>
		<?php endif; ?>

		<?php if ( ! empty( $short_desc ) ) : ?>
            <h3 class="pricing-title"><?php echo esc_html( $short_desc ); ?></h3>
		<?php endif; ?>
    </div>

    <div class="pricing-content">
        <ul>
			<?php foreach ( $features as $feature ) :

				$feature_text = isset( $feature['feature_text'] ) && ! empty( $feature['feature_text'] ) ? $feature['feature_text'] : '';

				$feature_in = $feature['feature_in'] == 'no' || empty( $feature['feature_in'] ) ? ' feature-not-in' : 'feature-in';
				?>

                <li class="<?php echo esc_attr( $feature_in ); ?>"><span
                            class="check-close-icon"></span> <?php echo esc_html( $feature_text ); ?></li>
			<?php endforeach; ?>
        </ul>
    </div>

	<?php if ( ! empty( $btn_url['url'] ) ) : ?>
        <div class="pricing-footer">
            <a href="<?php echo esc_url( $btn_url['url'] ); ?>" <?php echo wp_kses_post( ! empty( $btn_url['is_external'] ) ? 'target="_blank"' : '' ); ?>><?php echo esc_html( $btn_text ); ?></a>
        </div>
	<?php endif; ?>
</div>