<?php
/**
 * Widget Render: InfoBox
 *
 * @package widgets/info-box/views/template-1.php
 * @copyright Pluginbazar 2020
 */

$unique_id       = uniqid();
$unique_id_2     = uniqid();
$style           = elmpath()->get_settings_atts( 'style', '1' );
$title           = elmpath()->get_settings_atts( 'title' );
$info_count      = elmpath()->get_settings_atts( 'info_count' );
$description     = elmpath()->get_settings_atts( 'description' );
$btn_url         = elmpath()->get_settings_atts( 'btn_url' );
$btn_text        = elmpath()->get_settings_atts( 'btn_text' );
$info_icon       = elmpath()->get_settings_atts( 'info_icon' );
$info_image      = elmpath()->get_settings_atts( 'info_image' );
$primary_color   = elmpath()->get_settings_atts( 'primary_color' );
$secondary_color = elmpath()->get_settings_atts( 'secondary_color' );
$is_featured     = elmpath()->get_settings_atts( 'is_featured' );

?>


<div class="elmpath-info-box elmpath-info-box-<?php echo esc_attr( $style ); ?> <?php echo esc_attr( $is_featured == 'yes' ? 'elmpath-featured' : '' ); ?> ">

	<?php if ( ! empty( $style == '3' ) ) : ?>
        <div class="info-count"><?php echo esc_html( $info_count ); ?></div>
	<?php endif; ?>

    <div class="icon-wrap">
		<?php if ( $style == '4' ) : ?>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="74" height="100"
                 viewBox="0 0 74 100">
                <defs>
                    <linearGradient id="linear-gradient<?php echo esc_attr( $unique_id ); ?>" x1="0.5" x2="0.5" y2="1"
                                    gradientUnits="objectBoundingBox">
                        <stop offset="0"
                              stop-color="<?php echo esc_attr( ! empty( $primary_color ) ? $primary_color : '#43d5e1' ); ?>"></stop>
                        <stop offset="1"
                              stop-color="<?php echo esc_attr( ! empty( $secondary_color ) ? $secondary_color : '#3ceeb0' ); ?>"></stop>
                    </linearGradient>
                </defs>
                <path d="M37,0A37.076,37.076,0,0,1,74,37.151C74.07,71.977,37,100,37,100S.324,75.282,0,37.151A37.076,37.076,0,0,1,37,0Z"
                      fill="url(#linear-gradient<?php echo esc_attr( $unique_id ); ?>)"></path>
            </svg>
		<?php endif; ?>

		<?php if ( ! empty( $info_image['url'] ) ) : ?>
            <img src="<?php echo esc_attr( $info_image['url'] ) ?>" alt="<?php echo esc_html( $title ) ?>">
		<?php endif; ?>
		<?php if ( ! empty( $info_icon['value'] ) ) : ?>
            <i class="<?php echo esc_attr( $info_icon['value'] ); ?>"></i>
		<?php endif; ?>
    </div>

    <div class="elmpath-info-desc">
		<?php if ( ! empty( $title ) ) {
			printf( '<h3 class="elmpath-info-title">%s</h3>', esc_html( $title ) );
		} ?>

		<?php if ( ! empty( $description ) ) {
			printf( ' <div class="elmpath-info-desc">%s</div>', wpautop( $description ) );
		} ?>

		<?php if ( ! empty( $btn_url['url'] ) ) : ?>
            <a href="<?php echo esc_url( $btn_url['url'] ); ?>"
               class="elmpath-info-btn">
				<?php if ( $style == '1' || $style == '7' ) {
					echo esc_html( $btn_text );
				} else { ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="14" viewBox="0 0 20 14">
                        <path d="M13.468,4.885a.708.708,0,1,0-1.008.993l5.111,5.088H.706a.7.7,0,0,0-.706.7.708.708,0,0,0,.706.713H17.571L12.46,17.46a.718.718,0,0,0,0,1,.708.708,0,0,0,1.008,0l6.321-6.292a.689.689,0,0,0,0-.993Z"
                              transform="translate(0 -4.674)" fill="#fff"></path>
                    </svg>
				<?php } ?>
            </a>
		<?php endif; ?>
    </div>
	<?php if ( $style == '5' ) : ?>
        <div class="curve-shape">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="228.968"
                 height="360"
                 viewBox="0 0 228.968 360">
                <defs>
                    <linearGradient id="<?php echo esc_attr( $unique_id_2 ); ?>" x1="0.5" x2="0.5" y2="1"
                                    gradientUnits="objectBoundingBox">
                        <stop offset="0"
                              stop-color="<?php echo esc_attr( ! empty( $primary_color ) ? $primary_color : '#ee9ca7' ); ?>"></stop>
                        <stop offset="1"
                              stop-color="<?php echo esc_attr( ! empty( $secondary_color ) ? $secondary_color : '#ffdde1' ); ?>"></stop>
                    </linearGradient>
                </defs>
                <path d="M8,0H192a8,8,0,0,1,8,7.992V351.635a8,8,0,0,1-8,7.992H8a8,8,0,0,1-8-7.992s-65.179-81.049,0-182.629S-2,50.243,0,7.991C2.3-2.994,3.582,0,8,0Z"
                      transform="translate(28.968 0.373)" opacity="0.1"
                      fill="url(#<?php echo esc_attr( $unique_id_2 ); ?>)"></path>
            </svg>
        </div>
	<?php endif; ?>
</div>