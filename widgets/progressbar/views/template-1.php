<?php
/**
 * Widget Render: Progressbar
 *
 * @package widgets/progressbar/views/template-1.php
 * @copyright Pluginbazar 2020
 */

$unique_id = uniqid();
$style     = elmpath()->get_settings_atts( 'style', '1' );
$pb_label = elmpath()->get_settings_atts( 'pb_label' );
$pb_value = elmpath()->get_settings_atts( 'pb_value' );

?>

<div id="elmpath-progress-bar<?php echo esc_attr( $unique_id ); ?>" class="elmpath-progress-bar elmpath-progress-bar-<?php echo esc_attr( $style ); ?>">
    <div class="elmpath-progress-fill" role="progressbar" aria-valuenow="<?php echo esc_attr( $pb_value ); ?>"
         aria-valuemin="0" aria-valuemax="100"
         style="width:<?php echo esc_attr( $pb_value . '%' ); ?>">

		<?php if ( $style == '2' ) : ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="90" viewBox="0 0 460 90">
                <g transform="translate(-638 -407)">
                    <circle cx="22" cy="22" r="22" transform="translate(761 415)" fill="#fff"
                            opacity="0.2"></circle>
                    <circle cx="16.5" cy="16.5" r="16.5" transform="translate(820 454)" fill="#fff"
                            opacity="0.2"></circle>
                    <circle cx="17.5" cy="17.5" r="17.5" transform="translate(887 407)" fill="#fff"
                            opacity="0.2"></circle>
                    <circle cx="19" cy="19" r="19" transform="translate(940 459)" fill="#fff"
                            opacity="0.2"></circle>
                    <circle cx="9" cy="9" r="9" transform="translate(986 407)" fill="#fff" opacity="0.2"></circle>
                    <circle cx="11" cy="11" r="11" transform="translate(1044 475)" fill="#fff"
                            opacity="0.2"></circle>
                    <circle cx="5.5" cy="5.5" r="5.5" transform="translate(1087 430)" fill="#fff"
                            opacity="0.2"></circle>
                    <circle cx="22" cy="22" r="22" transform="translate(638 447)" fill="#fff"
                            opacity="0.2"></circle>
                    <circle cx="5.5" cy="5.5" r="5.5" transform="translate(1013 442)" fill="#fff"
                            opacity="0.2"></circle>
                </g>
            </svg>
		<?php endif; ?>

		<?php if ( ! empty( $pb_label ) ) : ?>
            <span class="elmpath-pb-label"><?php echo esc_html( $pb_label ); ?></span>
		<?php endif; ?>

		<?php if ( ! empty( $pb_value ) ) : ?>
            <span class="elmpath-pb-percent"><?php echo esc_html( $pb_value . '%' ); ?></span>
		<?php endif; ?>
    </div>
</div>

