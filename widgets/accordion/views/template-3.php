<?php
/**
 * Widget Render: Accordion
 *
 * @package widgets/accordion/views/template-1.php
 * @copyright Pluginbazar 2020
 */

$style      = elmpath()->get_settings_atts( 'style' );
$accordions = elmpath()->get_settings_atts( 'accordions' );

?>

<div class="elmpath-accordion elmpath-accordion-<?php echo esc_attr( $style ); ?>">

    <div class="elmpath-accordion-inner">

        <div class="elmpath-accordion-wrap">
			<?php foreach ( $accordions as $index => $accordion ) :
				$title = isset( $accordion['title'] ) && ! empty( $accordion['title'] ) ? $accordion['title'] : '';
				$content = isset( $accordion['content'] ) && ! empty( $accordion['content'] ) ? $accordion['content'] : '';
				?>

                <div class="elmpath-accordion-item">
                    <h3 class="elmpath-accordion-title">
						<?php echo esc_html( $title ); ?>

                        <div class="onoffswitch">
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>

                    </h3>
                    <div class="elmpath-accordion-content"><?php echo wp_kses_post( $content ); ?></div>
                </div>
			<?php endforeach; ?>
        </div>
    </div>
</div>