<?php
/**
 * Widget Render: Team
 *
 * @package widgets/team/views/template-2.php
 * @copyright Pluginbazar 2020
 */

use Elementor\Icons_Manager;

$unique_id = uniqid();

$style            = elmpath()->get_settings_atts( 'style', '1' );
$_image           = elmpath()->get_settings_atts( '_image' );
$image_url        = wp_get_attachment_image_url( elmpath()->get_settings_atts( 'id', '', $_image ), 'full' );


if ( ! isset( $settings['social_icon'] ) && ! Icons_Manager::is_migration_allowed() ) {
	$social_icon = 'fab fa-facebook-f';
}

?>


<div id="elmpath-team<?php echo esc_attr( $unique_id ); ?>" class="elmpath-team-details elmpath-team-details-<?php echo esc_attr( $style ); ?>">

	<?php if ( ! empty( $image_url ) ) : ?>
        <div class="elmpath-team-img">
            <img src="<?php echo esc_url( $image_url ) ?>" alt="<?php echo esc_html( $_name ) ?>">
        </div>
	<?php endif; ?>
</div>
