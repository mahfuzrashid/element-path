<?php
/**
 * Templates Library
 */

?>

<div class="elmpath-library">
    <div class="elmpath-library-header">
        <div class="template-search">
            <input type="text" placeholder="<?php esc_html_e( 'Start typing...', 'element-path' ); ?>">
        </div>
    </div>

    <div class="elmpath-templates">

		<?php foreach ( elmpath()->get_plugin_data( 'templates' ) as $template_id => $template_group ) : ?>

            <a href="<?php echo esc_url( admin_url( 'admin.php?page=elmpath-library&template-group=' . $template_id ) ) ?>"
               data-filter-tags="<?php echo esc_attr( implode( '-', elmpath()->get_settings_atts( 'tags', array(), $template_group ) ) ); ?>"
               class="elmpath-template">
                <img src="<?php echo esc_url( elmpath()->get_template_group_thumb( $template_group ) ); ?>"
                     alt="<?php echo esc_html( elmpath()->get_settings_atts( 'title', '', $template_group ) ) ?>">
                <div class="template-details">
                    <h3><?php echo esc_html( elmpath()->get_settings_atts( 'title', '', $template_group ) ) ?></h3>
                    <div class="template-info">
                        <span><?php esc_html_e( sprintf( '%s Pages', count( elmpath()->get_settings_atts( 'pages', '', $template_group ) ) ), 'element-path' ); ?></span>
						<?php printf( '<div class="template-tags">%s</div>', implode( '', array_map( function ( $tag ) {
							return sprintf( '<span>%s</span>', $tag );
						}, elmpath()->get_settings_atts( 'tags', array(), $template_group ) ) ) ); ?>
                    </div>
                </div>
            </a>

		<?php endforeach; ?>

    </div>
</div>
