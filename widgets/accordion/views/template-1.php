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
	<?php foreach ( $accordions as $index => $accordion ) :
		$title = isset( $accordion['title'] ) && ! empty( $accordion['title'] ) ? $accordion['title'] : '';
		$content = isset( $accordion['content'] ) && ! empty( $accordion['content'] ) ? $accordion['content'] : '';
		?>

        <div class="elmpath-accordion-item">
            <h3 class="elmpath-accordion-title">
				<?php echo esc_html( $title ); ?>
                <span class="toggle-icon icon-plus"></span>
            </h3>
            <div class="elmpath-accordion-content"><?php echo wp_kses_post( $content ); ?></div>
        </div>
	<?php endforeach; ?>
</div>