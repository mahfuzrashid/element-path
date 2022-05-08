<?php
/**
 * Widget Render: Progressbar
 *
 * @package widgets/progressbar/views/template-2.php
 * @copyright Pluginbazar 2020
 */

$unique_id   = uniqid();
$style       = elmpath()->get_settings_atts( 'style' );
$start_label = elmpath()->get_settings_atts( 'start_label' );
$end_label   = elmpath()->get_settings_atts( 'end_label' );
$pb_value    = elmpath()->get_settings_atts( 'pb_value' );
$bar_img     = elmpath()->get_settings_atts( 'url', '', elmpath()->get_settings_atts( 'bar_img' ) );

?>

<div id="elmpath-progress-bar<?php echo esc_attr( $unique_id ); ?>"
     class="elmpath-progress-bar elmpath-progress-bar-<?php echo esc_attr( $style ); ?>">

    <span class="elmpath-pb-start-label"><?php echo esc_html( ! empty( $start_label ) ? $start_label : '0' ); ?></span>

    <div class="elmpath-progress-bar-inner">
        <div class="elmpath-progress-fill" role="progressbar" aria-valuenow="<?php echo esc_attr( $pb_value ); ?>"
             aria-valuemin="0" aria-valuemax="100"
             style="width:<?php echo esc_attr( $pb_value . '%' ); ?>">

			<?php if ( ! empty( $bar_img ) ) : ?>
                <div class="elmpath-pb-indicator">
                    <img src="<?php echo esc_url( $bar_img ); ?>" alt="<?php echo esc_attr( $pb_value . '%' ); ?>">
                </div>
			<?php endif; ?>

			<?php if ( ! empty( $pb_value ) ) : ?>
                <div class="elmpath-pb-percent">
                    <svg xmlns="http://www.w3.org/2000/svg" width="69.999" height="41" viewBox="0 0 69.999 41">
                        <g transform="translate(-741 -474)">
                            <g transform="translate(2590 408)" fill="none">
                                <path d="M -1783 105.0000991821289 C -1781.8974609375 105.0000991821289 -1781.000366210938 104.1026763916016 -1781.000366210938 102.9996032714844 L -1781.000366210938 79.00019836425781 C -1781.000366210938 77.89712524414063 -1781.8974609375 76.99970245361328 -1783 76.99970245361328 L -1809 76.99970245361328 L -1810.1767578125 76.99970245361328 L -1810.748291015625 75.97105407714844 L -1814.00048828125 70.11769104003906 L -1817.252563476563 75.97104644775391 L -1817.824096679688 76.99970245361328 L -1819.000854492188 76.99970245361328 L -1845 76.99970245361328 C -1846.1025390625 76.99970245361328 -1846.999633789063 77.89712524414063 -1846.999633789063 79.00019836425781 L -1846.999633789063 102.9996032714844 C -1846.999633789063 104.1026763916016 -1846.1025390625 105.0000991821289 -1845 105.0000991821289 L -1783 105.0000991821289 M -1783 107.0000991821289 L -1845 107.0000991821289 C -1847.209594726563 107.0000991821289 -1848.999633789063 105.209098815918 -1848.999633789063 102.9996032714844 L -1848.999633789063 79.00019836425781 C -1848.999633789063 76.79070281982422 -1847.209594726563 74.99970245361328 -1845 74.99970245361328 L -1819.000854492188 74.99970245361328 L -1814.00048828125 65.99970245361328 L -1809 74.99970245361328 L -1783 74.99970245361328 C -1780.791381835938 74.99970245361328 -1779.000366210938 76.79070281982422 -1779.000366210938 79.00019836425781 L -1779.000366210938 102.9996032714844 C -1779.000366210938 105.209098815918 -1780.791381835938 107.0000991821289 -1783 107.0000991821289 Z"
                                      stroke="none"
                                      fill="<?php echo esc_attr( ! empty( $label_color ) ? $label_color : '#444' ); ?>">
                            </g>
                            <text transform="translate(760 504)"
                                  fill="<?php echo esc_attr( ! empty( $label_color ) ? $label_color : '#444' ); ?>">

								<?php if ( is_rtl() ) : ?>
                                    <tspan x="35" y="0"><?php echo esc_html( $pb_value . '%' ); ?></tspan>
								<?php else: ?>
                                    <tspan x="0" y="0"><?php echo esc_html( $pb_value . '%' ); ?></tspan>
								<?php endif; ?>

                            </text>
                        </g>
                    </svg>
                </div>
			<?php endif; ?>

        </div>
    </div>

    <span class="elmpath-pb-end-label"><?php echo esc_html( ! empty( $end_label ) ? $end_label : '100' ); ?></span>

</div>

