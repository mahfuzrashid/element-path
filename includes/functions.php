<?php
/**
 * Functions
 */

use Elementor\Widget_Base;


if ( ! function_exists( 'elmpath_do_settings' ) ) {
	function elmpath_do_settings( $widget_base ) {

		global $widget_settings;

		if ( ! $widget_base instanceof Elementor\Widget_Base ) {
			return;
		}

		$widget_settings           = $widget_base->get_settings_for_display();
		$widget_settings['widget'] = $widget_base;
	}
}


if ( ! function_exists( 'elmpath' ) ) {
	function elmpath() {
		global $elmpath;

		if ( ! $elmpath instanceof ELMPATH_Functions ) {
			$elmpath = new ELMPATH_Functions();
		}

		return $elmpath;
	}
}


if ( ! function_exists( 'elmpath_get_template' ) ) {
	/**
	 * Get Template
	 *
	 * @param $template_name
	 * @param array $args
	 * @param string $template_path
	 * @param string $default_path
	 *
	 * @return WP_Error
	 */
	function elmpath_get_template( $template_name, $args = array(), $template_path = '', $default_path = '' ) {

		$located = elmpath_locate_template( $template_name, $template_path, $default_path );

		if ( ! file_exists( $located ) ) {
			return new WP_Error( 'invalid_data', __( '%s does not exist.', 'element-path' ), '<code>' . $located . '</code>' );
		}

		$located = apply_filters( 'elmpath_filters_get_template', $located, $template_name, $args, $template_path, $default_path );

		do_action( 'elmpath_before_template_part', $template_name, $template_path, $located, $args );

		include $located;

		do_action( 'elmpath_after_template_part', $template_name, $template_path, $located, $args );
	}
}


if ( ! function_exists( 'elmpath_locate_template' ) ) {
	/**
	 *  Locate template
	 *
	 * @param $template_name
	 * @param string $template_path
	 * @param string $default_path
	 *
	 * @return mixed|void
	 */
	function elmpath_locate_template( $template_name, $template_path = '', $default_path = '' ) {

		$plugin_dir  = ELMPATH_PLUGIN_DIR;
		$this_widget = elmpath()->get_settings_atts( 'widget' );
		$widget_name = $this_widget ? $this_widget->get_name() : '';

		/**
		 * Template path in Theme
		 */
		if ( ! $template_path ) {
			$template_path = 'elmpath/';
		}

		/**
		 * Template default path from Plugin
		 */
		if ( ! $default_path && $this_widget instanceof Widget_Base ) {
			$default_path = untrailingslashit( $plugin_dir ) . '/widgets/' . $this_widget->get_widget_slug( true ) . '/';
		}

		/**
		 * Look within passed path within the theme - this is priority.
		 */
		$template = locate_template(
			array(
				trailingslashit( $template_path ) . $template_name,
				$template_name,
			)
		);

		/**
		 * Get default template
		 */
		if ( ! $template ) {
			$template = $default_path . $template_name;
		}

		/**
		 * Return what we found with allowing 3rd party to override
		 *
		 * @filter elmpath_filters_locate_template
		 */
		return apply_filters( 'elmpath_filters_locate_template', $template, $template_name, $template_path, $widget_name );
	}
}


if ( ! function_exists( 'elmpath_pagination' ) ) {
	/**
	 * Display Pagination
	 *
	 * @param $query_object WP_Query
	 * @param $args
	 *
	 * @return string
	 */

	function elmpath_pagination( $query_object = false, $args = array() ) {

		if ( ! $query_object ) {
			global $wp_query;
			$query_object = $wp_query;
		}

		$paged = max( 1, ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1 );

		$defaults = array(
			'base'      => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
			'format'    => '?paged=%#%',
			'current'   => $paged,
			'total'     => $query_object->max_num_pages,
			'prev_text' => esc_html__( 'Prev', 'element-path' ),
			'next_text' => esc_html__( 'Next', 'element-path' ),
		);

		$paginate_links = paginate_links( apply_filters( 'elmpath_pagination', array_merge( $defaults, $args ) ) );

		if ( isset( $args['echo'] ) && $args['echo'] ) {
			echo wp_kses_post( $paginate_links );

			return true;
		}

		return $paginate_links;
	}
}