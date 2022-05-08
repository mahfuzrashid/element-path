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
$image_url        = wp_get_attachment_image_url( elmpath()->get_settings_atts( 'id', '', $_image ), 'thumbnail' );
$_name            = elmpath()->get_settings_atts( '_name' );
$_content         = elmpath()->get_settings_atts( '_content' );
$social_icon      = elmpath()->get_settings_atts( 'social_icon' );
$social_link_list = elmpath()->get_settings_atts( 'social_link_list' );
$designation      = elmpath()->get_settings_atts( 'designation' );
$review_ctext     = elmpath()->get_settings_atts( 'review_ctext' );
$experience       = elmpath()->get_settings_atts( 'experience' );
$rating           = (float) elmpath()->get_settings_atts( 'rating', 0 );

if ( ! isset( $settings['social_icon'] ) && ! Icons_Manager::is_migration_allowed() ) {
	$social_icon = 'fab fa-facebook-f';
}

?>


<div id="elmpath-team<?php echo esc_attr( $unique_id ); ?>"
     class="elmpath-team elmpath-team-<?php echo esc_attr( $style ); ?>">

	<?php if ( ! empty( $image_url ) ) : ?>
        <div class="elmpath-team-img">
            <img src="<?php echo esc_url( $image_url ) ?>" alt="<?php echo esc_html( $_name ) ?>">
        </div>
	<?php endif; ?>

    <div class="elmpath-team-info">
		<?php

		if ( ! empty( $_name ) ) {
			printf( '<h3 class="elmpath-team-name">%s</h3>', esc_html( $_name ) );
		}

		if ( ! empty( $designation ) ) {
			printf( '<span class="elmpath-team-designation">%s</span>', esc_html( $designation ) );
		}

		?>

        <div class="elmpath-team-rating">
			<?php
			for ( $index = 1; $index <= 5; $index ++ ) {
				if ( $rating != 0 && $index <= $rating ) {
					echo wp_kses_post( '<i class="fa fa-star"></i>' );
				} else if ( abs( $rating - $index ) === 0.5 ) {
					echo wp_kses_post( '<i class="fas fa-star-half-alt"></i>' );
				} else {
					echo wp_kses_post( '<i class="far fa-star"></i>' );
				}
			}
			?>
			<?php if ( ! empty( $review_ctext ) ) : ?>
                <span class="elmpath-team-rating-count"><?php echo esc_html( $review_ctext ); ?></span>
			<?php endif; ?>
        </div>

		<?php if ( ! empty( $experience ) ) : ?>
            <div class="elmpath-team-experience"><?php echo esc_html( $experience ); ?></div>
		<?php endif; ?>
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