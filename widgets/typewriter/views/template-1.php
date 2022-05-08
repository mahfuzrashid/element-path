<?php
/**
 * Widget Render: Typewriter
 *
 * @package widgets/typewriter/views/template-1.php
 * @copyright Pluginbazar 2020
 */

$unique_id = uniqid();

$before_text   = elmpath()->get_settings_atts( 'before_text' );
$after_text    = elmpath()->get_settings_atts( 'after_text' );
$typewriter    = elmpath()->get_settings_atts( 'typewriter' );
$display_before_after    = elmpath()->get_settings_atts( 'display_before_after', '' );
$effects    = elmpath()->get_settings_atts( 'effects', 'clip' );
$cursor_colors = array();

?>

<div class="elmpath-typewriter elmpath-block-<?php echo esc_attr( $display_before_after ); ?>">
    <?php if ( ! empty( $before_text ) ) : ?>
        <span class="typewriter-before"><?php echo esc_html( $before_text ); ?></span>
    <?php endif; ?>

    <div id="elmpath-typewriter-<?php echo esc_attr( $unique_id ); ?>" class="cd-headline <?php echo esc_attr( $effects ); ?>">
        <div class="cd-words-wrapper">
            <?php foreach ( $typewriter as $index => $text_item ) :

                $this_text = elmpath()->get_settings_atts( 'anim_text', '', $text_item );
                $this_color = elmpath()->get_settings_atts( 'anim_text_color', '', $text_item );

                $cursor_colors[] = sprintf( '.elmpath-typewriter .cd-headline .cd-words-wrapper.cur-%s::after{ background-color: %s; }', $index, $this_color );

                ?>
                <span data-cursor="cur-<?php echo esc_attr( $index ); ?>"
                      style="color: <?php echo esc_attr( $this_color ); ?>"><?php echo esc_html( $this_text ); ?></span>
            <?php endforeach; ?>
        </div>
    </div>

    <?php if ( ! empty( $after_text ) ) : ?>
        <span class="typewriter-after"><?php echo esc_html( $after_text ); ?></span>
    <?php endif; ?>
</div>

<?php

printf( '<style>%s</style>', implode( $cursor_colors ) );

?>
