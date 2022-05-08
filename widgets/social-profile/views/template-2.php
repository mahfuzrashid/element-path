<?php
/**
 * Widget Render: Social Profile
 *
 * @package widgets/social-profile/views/template-2.php
 * @copyright Pluginbazar 2020
 */

$unique_id    = uniqid();
$style        = elmpath()->get_settings_atts( 'style', '1' );
$social_items = elmpath()->get_settings_atts( 'social_items' );

$primary   = elmpath()->get_settings_atts( 'primary' );
$secondary = elmpath()->get_settings_atts( 'secondary' );

if ( ! empty( $primary ) ) : ?>
    <style>
        #elmpath-social-profile-<?php echo esc_attr( $unique_id ) ?> > .elmpath-social-profile-inner {
            background-color: <?php echo esc_attr( $primary ); ?>
        }
    </style>
<?php endif; ?>

<div id="elmpath-social-profile-<?php echo esc_attr( $unique_id ) ?>" class="elmpath-social-profile-<?php echo esc_attr( $style ) ?>">

    <div class="elmpath-social-profile-inner">

		<?php foreach ( $social_items as $index => $social_item ) :

			$item_id = sprintf( '%s%s', $unique_id, $index );
			$social_url = elmpath()->get_settings_atts( 'url', '#', elmpath()->get_settings_atts( 'social_url', '', $social_item ) );
			$_icon = elmpath()->get_settings_atts( '_icon', '', $social_item );
			$_image = elmpath()->get_settings_atts( '_image', '', $social_item );
			$_label = elmpath()->get_settings_atts( '_label', '', $social_item );

			$_color = elmpath()->get_settings_atts( '_color', '', $social_item );

			?>

            <a href="<?php echo esc_url( $social_url ); ?>" id="social-link<?php echo esc_attr( $item_id ); ?>">

	            <?php if ( ! empty( $_color ) || ! empty( $primary ) ) : ?>
                    <style>
                        #social-link<?php echo esc_attr( $item_id ); ?> i,
                        #social-link<?php echo esc_attr( $item_id ); ?> img {
                            background-color: <?php echo esc_attr( $_color ); ?>;
                            color: <?php echo esc_attr( $primary ); ?>;
                        }
                    </style>
	            <?php endif; ?>

				<?php if ( ! empty( $_image['url'] ) ) : ?>
                    <img src="<?php echo esc_attr( $_image['url'] ) ?>" alt="<?php echo esc_attr( $_label ) ?>">
				<?php endif; ?>

				<?php if ( ! empty( $_icon['value'] ) ) : ?>
                    <i class="<?php echo esc_attr( $_icon['value'] ); ?>"></i>
				<?php endif; ?>

				<?php if ( $style == '5' && ! empty( $_label ) ) : ?>
                    <span class="elmpath-sp-label"><?php echo esc_html( $_label ); ?></span>
				<?php endif; ?>
            </a>

		<?php endforeach; ?>
    </div>
</div>