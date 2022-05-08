<?php
/**
 * Widget Render: Tabs
 *
 * @package widgets/tabs/views/template-1.php
 * @copyright Pluginbazar 2020
 */

use Elementor\Icons_Manager;

$unique_id = uniqid();
$style     = elmpath()->get_settings_atts( 'style' );
$tabs      = elmpath()->get_settings_atts( 'tabs' );

if ( ! isset( $settings['tab_iocn'] ) && ! Icons_Manager::is_migration_allowed() ) {
	$social_icon = 'fab fab-home';
}

?>

<div id="elmpath-tabs<?php echo esc_attr( $unique_id ); ?>"
     class="elmpath-tabs elmpath-tabs-<?php echo esc_attr( $style ); ?>">
    <div class="elmpath-tab-panel">
        <div class="tab-nav">
			<?php foreach ( $tabs as $tab_id => $tab ) :

				$active = $tab_id == 0 ? 'active' : '';
				$tab_id = sprintf( '%s%s', $unique_id, $tab_id );
				$tab_title = isset( $tab['tab_title'] ) ? $tab['tab_title'] : '';
				$_icon = isset( $tab['_icon'] ) ? $tab['_icon'] : array();
				$_icon = elmpath()->get_settings_atts( 'value', '', $_icon );

				?>
                <div class="tab-nav-item <?php echo esc_attr( $active ); ?>"
                     data-target="tab-<?php echo esc_attr( $tab_id ); ?>">
					<?php if ( ! empty( $_icon ) ) : ?>
                        <span class="tab-icon"><i class="<?php echo esc_attr( $_icon ); ?>"></i></span>
					<?php endif; ?>

					<?php if ( $style !== '6' ) : ?>
                        <span class="tab-label"><?php echo esc_html( $tab_title ); ?></span>
					<?php endif; ?>
                </div>
			<?php endforeach; ?>
        </div>

        <div class="tab-content">

			<?php foreach ( $tabs as $tab_id => $tab ) :
				$active = $tab_id == 0 ? 'active' : '';

				$tab_id  = sprintf( '%s%s', $unique_id, $tab_id );
				$content = isset( $tab['tab_content'] ) ? $tab['tab_content'] : '';
				?>

                <div class="tab-item-content <?php echo esc_attr( $active ); ?> tab-<?php echo esc_attr( $tab_id ); ?>">
					<?php echo wp_kses_post( wpautop( $content ) ); ?>
                </div>
			<?php endforeach; ?>

        </div>
    </div>
</div>