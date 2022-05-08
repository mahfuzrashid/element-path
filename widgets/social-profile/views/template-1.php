<?php
/**
 * Widget Render: Social Profile
 *
 * @package widgets/social-profile/views/template-1.php
 * @copyright Pluginbazar 2020
 */

$unique_id    = uniqid();
$style        = elmpath()->get_settings_atts( 'style', '1' );
$social_items = elmpath()->get_settings_atts( 'social_items' );

$primary   = elmpath()->get_settings_atts( 'primary' );
$secondary = elmpath()->get_settings_atts( 'secondary' );

if ( ! empty( $primary ) || ! empty( $secondary ) && $style == '1' || $style == '5' ) : ?>
    <style>
        #elmpath-social-profile-<?php echo esc_attr( $unique_id ) ?> > a {
            background-color: <?php echo esc_attr( $primary ); ?>
        }

        #elmpath-social-profile-<?php echo esc_attr( $unique_id ) ?> .elmpath-sp-label,
        #elmpath-social-profile-<?php echo esc_attr( $unique_id ) ?> a i {
            color: <?php echo esc_attr( $secondary ); ?>
        }
    </style>
<?php endif; ?>

<div id="elmpath-social-profile-<?php echo esc_attr( $unique_id ) ?>"
     class="elmpath-social-profile-<?php echo esc_attr( $style ) ?>">

	<?php foreach ( $social_items as $index => $social_item ) :

		$item_id = sprintf( '%s%s', $unique_id, $index );
		$social_url = elmpath()->get_settings_atts( 'url', '#', elmpath()->get_settings_atts( 'social_url', '', $social_item ) );
		$_icon = elmpath()->get_settings_atts( '_icon', '', $social_item );
		$_image = elmpath()->get_settings_atts( '_image', '', $social_item );
		$_label = elmpath()->get_settings_atts( '_label', '', $social_item );

		$_color = elmpath()->get_settings_atts( '_color', '', $social_item );

		if ( ! empty( $_color ) && $style !== '3' ) : ?>
            <style>
                #social-link<?php echo esc_attr( $item_id ); ?> i,
                #social-link<?php echo esc_attr( $item_id ); ?> img {
                    background-color: <?php echo esc_attr( $_color ); ?>;
                }
            </style>
		<?php endif; ?>

        <a href="<?php echo esc_url( $social_url ); ?>" id="social-link<?php echo esc_attr( $item_id ); ?>">

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