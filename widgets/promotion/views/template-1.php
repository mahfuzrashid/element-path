<?php
/**
 * Widget Render: Promotional Banner
 *
 * @package widgets/promotion/views/template-1.php
 * @copyright Pluginbazar 2020
 */

$style        = elmpath()->get_settings_atts( 'style', '1' );
$_image       = elmpath()->get_settings_atts( '_image' );
$image_url    = wp_get_attachment_image_url( elmpath()->get_settings_atts( 'id', '', $_image ), 'full' );
$title        = elmpath()->get_settings_atts( 'title' );
$sub_title    = elmpath()->get_settings_atts( 'sub_title' );
$btn_text     = elmpath()->get_settings_atts( 'btn_text' );
$btn_url      = elmpath()->get_settings_atts( 'url', '', elmpath()->get_settings_atts( 'btn_url' ) );
$is_external  = elmpath()->get_settings_atts( 'is_external', '', elmpath()->get_settings_atts( 'btn_url' ) );
$nofollow     = elmpath()->get_settings_atts( 'nofollow', '', elmpath()->get_settings_atts( 'btn_url' ) );
$img_position = elmpath()->get_settings_atts( 'img_position' );
$img_position = $img_position == 'right' ? 'image-alignment-right' : '';

$target   = ! empty( $is_external ) ? ' target="_blank"' : '';
$nofollow = ! empty( $nofollow ) ? ' rel="nofollow"' : '';


?>


<div class="elmpath-promo elmpath-promo-<?php echo esc_attr( $style . ' ' . $img_position ); ?>">

	<?php if ( ! empty( $image_url ) ) : ?>
        <div class="elmpath-promo-img">
            <img src="<?php echo esc_url( $image_url ) ?>" alt="<?php echo esc_attr( $title ) ?>">
        </div>
	<?php endif; ?>

    <div class="elmpath-promo-info">
		<?php if ( ! empty( $sub_title ) ) : ?>
            <h4 class="elmpath-promo-sub-title"><?php echo esc_html( $sub_title ); ?></h4>
		<?php endif; ?>

		<?php if ( ! empty( $title ) ) : ?>
            <h3 class="elmpath-promo-title"><?php echo esc_html( $title ); ?></h3>
		<?php endif; ?>

		<?php if ( ! empty( $btn_url ) ) : ?>
            <a href="<?php echo esc_url( $btn_url ); ?>"
               class="promo-btn" <?php echo wp_kses_post( $target . $nofollow ); ?> ><?php echo esc_html( $btn_text ); ?></a>
		<?php endif; ?>

    </div>
</div>