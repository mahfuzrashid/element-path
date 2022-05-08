<?php
/**
 * Widget Render: Countdown
 *
 * @package widgets/countdown/views/template-1.php
 * @copyright Pluginbazar 2020
 */

$unique_id = uniqid();
$style     = elmpath()->get_settings_atts( 'style', '1' );
$date_time = elmpath()->get_settings_atts( 'date_time', '08 Oct 2020 01:51 pm' );

?>

<div id="elmpath-countdown-<?php echo esc_attr( $unique_id ); ?>"
     class="elmpath-countdown elmpath-countdown-<?php echo esc_attr( $style ) ?>"></div>
<script>
    (function ($, window, document) {
        "use strict";

        (function updateTime() {
            var countDownDate = new Date(new Date('<?php echo esc_attr( $date_time ); ?>').toString()).getTime(),
                now = new Date().getTime(),
                distance = countDownDate - now,
                days = 0, hours = 0, minutes = 0, seconds = 0;

            if (distance > 0) {
                days = Math.floor(distance / (1000 * 60 * 60 * 24));
                hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                seconds = Math.floor((distance % (1000 * 60)) / 1000);
            }

            days = days < 10 ? '0' + days : days;
            hours = hours < 10 ? '0' + hours : hours;
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;

            $("#elmpath-countdown-<?php echo esc_attr( $unique_id ); ?>").html(
                '<span class="days"><span class="count-number">' + days + '</span><span class="count-text"><?php esc_html_e( 'Days', 'element-path' ); ?></span></span>' +
                '<span class="hours"><span class="count-number">' + hours + '</span><span class="count-text"><?php esc_html_e( 'Hours', 'element-path' ) ?></span></span>' +
                '<span class="minutes"><span class="count-number">' + minutes + '</span><span class="count-text"><?php esc_html_e( 'Minutes', 'element-path' ); ?></span></span>' +
                '<span class="seconds"><span class="count-number">' + seconds + '</span><span class="count-text"><?php esc_html_e( 'Seconds', 'element-path' ) ?></span></span>');

            setTimeout(updateTime, 1000);
        })();

    })(jQuery, window, document);
</script>
