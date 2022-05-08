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
$_name            = elmpath()->get_settings_atts( '_name' );
$_content         = elmpath()->get_settings_atts( '_content' );
$social_icon      = elmpath()->get_settings_atts( 'social_icon' );
$social_link_list = elmpath()->get_settings_atts( 'social_link_list' );
$tel_no           = elmpath()->get_settings_atts( 'tel_no' );
$designation      = elmpath()->get_settings_atts( 'designation' );
$email            = elmpath()->get_settings_atts( 'email' );
$primary_color            = elmpath()->get_settings_atts( 'primary_color', '#fb53df' );
$secondary_color            = elmpath()->get_settings_atts( 'secondary_color', '#1e3bf3' );


if ( ! isset( $settings['social_icon'] ) && ! Icons_Manager::is_migration_allowed() ) {
	$social_icon = 'fab fa-facebook-f';
}

?>


<div id="elmpath-team<?php echo esc_attr( $unique_id ); ?>"
     class="elmpath-team elmpath-team-<?php echo esc_attr( $style ); ?>">

	<?php if ( ! empty( $image_url ) ) : ?>
        <div class="elmpath-team-img">

            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 357 290">
                <defs>
                    <linearGradient id="cg-<?php echo esc_attr( $unique_id ) ?>" x1="1.154" y1="1.034" x2="-0.132" y2="-0.117"
                                    gradientUnits="objectBoundingBox">
                        <stop offset="0" stop-color="<?php echo esc_attr( $primary_color ); ?>"/>
                        <stop offset="1" stop-color="<?php echo esc_attr( $secondary_color ); ?>"/>
                    </linearGradient>
                    <pattern id="iml-<?php echo esc_attr( $unique_id ) ?>" width="1" height="1" viewBox="0 5.514 321 262">
                        <image preserveAspectRatio="xMidYMid slice" width="321" height="347.027"
                               xlink:href="<?php echo esc_url( $image_url ) ?>"/>
                    </pattern>
                </defs>
                <g transform="translate(-1019 -299)">
                    <path d="M259.369,0a15,15,0,0,1,12.774,7.137l80.017,130a15,15,0,0,1,0,15.725l-80.017,130A15,15,0,0,1,259.369,290H97.631a15,15,0,0,1-12.774-7.137l-80.017-130a15,15,0,0,1,0-15.725l80.017-130A15,15,0,0,1,97.631,0Z"
                          transform="translate(1019 299)" fill="url(#cg-<?php echo esc_attr( $unique_id ) ?>)"/>
                    <path d="M232.348,0a15,15,0,0,1,12.791,7.164l71.061,116a15,15,0,0,1,0,15.671l-71.061,116A15,15,0,0,1,232.348,262H88.652a15,15,0,0,1-12.791-7.164L4.8,138.836a15,15,0,0,1,0-15.671l71.061-116A15,15,0,0,1,88.652,0Z"
                          transform="translate(1037 313)" fill="url(#iml-<?php echo esc_attr( $unique_id ) ?>)"/>
                </g>
            </svg>
        </div>
	<?php endif; ?>

    <div class="elmpath-team-info">
		<?php
		if ( ! empty( $_name ) ) {
			printf( '<h3 class="elmpath-team-name">%s</h3>', esc_html( $_name ) );
		}
		?>
        <span class="elmpath-team-designation"><?php echo esc_html( $designation ); ?></span>

        <div class="elmpath-team-social">
			<?php
			foreach ( $social_link_list as $link ) :
				$migrated = isset( $link['__fa4_migrated']['social_share_icon'] );
				$is_new = empty( $link['social_icon'] ) && Icons_Manager::is_migration_allowed();
				?>
                <li>
                    <a href="<?php echo esc_url( $link['social_link'] ); ?>">

						<?php if ( $is_new || $migrated ) :
							Icons_Manager::render_icon( $link['social_share_icon'], [
								'aria-hidden' => 'true',
								'class'       => 'fa-fw'
							] );
						else : ?>
                            <i class="<?php echo esc_attr( $link['social_icon'] ); ?>" aria-hidden="true"></i>
						<?php endif; ?>

                    </a>
                </li>

			<?php endforeach; ?>
        </div>

    </div>
</div>