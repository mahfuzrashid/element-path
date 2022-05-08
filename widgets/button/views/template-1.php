<?php
/**
 * Widget Render: Button
 *
 * @package widgets/button/views/template-1.php
 * @copyright Pluginbazar 2020
 */

$btn_text     = elmpath()->get_settings_atts( 'btn_text' );
$btn_url      = elmpath()->get_settings_atts( 'url', '', elmpath()->get_settings_atts( 'btn_url' ) );
$is_external  = elmpath()->get_settings_atts( 'is_external', '', elmpath()->get_settings_atts( 'btn_url' ) );
$nofollow     = elmpath()->get_settings_atts( 'nofollow', '', elmpath()->get_settings_atts( 'btn_url' ) );


$target   = ! empty( $is_external ) ? ' target="_blank"' : '';
$nofollow = ! empty( $nofollow ) ? ' rel="nofollow"' : '';


?>

<?php if ( ! empty( $btn_url ) ) : ?>
    <a href="<?php echo esc_url( $btn_url ); ?>"
       class="elmpath-btn" <?php echo wp_kses_post( $target . $nofollow ); ?> ><?php echo esc_html( $btn_text ); ?></a>
<?php endif; ?>