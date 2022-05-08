<?php
/**
 * Plugin Name: Element Path for Elementor
 * Plugin URI: https://pluginurl/
 * Description: Plugin short description
 * Version: 1.0.0
 * Author: Element Path
 * Text Domain: element-path
 * Domain Path: /languages/
 * Author URI: http://mahfuzrashid.com/
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

defined( 'ABSPATH' ) || exit;
defined( 'ELMPATH_PLUGIN_URL' ) || define( 'ELMPATH_PLUGIN_URL', WP_PLUGIN_URL . '/' . plugin_basename( dirname( __FILE__ ) ) . '/' );
defined( 'ELMPATH_PLUGIN_DIR' ) || define( 'ELMPATH_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
defined( 'ELMPATH_PLUGIN_FILE' ) || define( 'ELMPATH_PLUGIN_FILE', plugin_basename( __FILE__ ) );
defined( 'ELMPATH_PLUGIN_NAME' ) || define( 'ELMPATH_PLUGIN_NAME', esc_html( 'Element Path for Elementor' ) );
defined( 'ELMPATH_PLUGIN_TUTORIAL' ) || define( 'ELMPATH_PLUGIN_TUTORIAL', '#' );
defined( 'ELMPATH_PLUGIN_DOC' ) || define( 'ELMPATH_PLUGIN_DOC', '#' );
defined( 'ELMPATH_PLUGIN_CONTACT' ) || define( 'ELMPATH_PLUGIN_CONTACT', '#' );
defined( 'ELMPATH_API_URL' ) || define( 'ELMPATH_API_URL', esc_url( 'https://plugin.commonsupport.com/server' ) );
defined( 'ELMPATH_VERSION' ) || define( 'ELMPATH_VERSION', '1.0.0' );


if ( ! class_exists( 'ELMPATH_Main' ) ) {
	/**
	 * Class ELMPATH_Main
	 */
	class ELMPATH_Main {

		function __construct() {

			add_action( 'admin_enqueue_scripts', [ $this, 'admin_scripts' ] );
			add_action( 'elementor/editor/after_enqueue_styles', [ $this, 'enqueue_editor_styles' ] );
			add_action( 'init', [ $this, 'i18n' ] );

			add_action( 'plugins_loaded', [ $this, 'include_files' ] );
			add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
			add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'front_styles' ] );

			add_action( 'elementor/frontend/before_enqueue_styles', [ $this, 'register_styles' ] );
			add_action( 'elementor/frontend/after_register_scripts', [ $this, 'register_scripts' ] );

			register_activation_hook( __FILE__, [ $this, 'plugin_activated' ] );
		}


		/**
		 * Register plugin activation hook
		 */
		function plugin_activated() {

			// Adding cron schedule
			if ( ! wp_next_scheduled( 'elmpath_update_data' ) ) {
				wp_schedule_event( time(), 'daily', 'elmpath_update_data' );
			}
		}


		/**
		 * Register all widgets
		 */
		function register_widgets() {

			include_once( ELMPATH_PLUGIN_DIR . 'includes/classes/class-widget-base.php' );

			$elements_ext_active = elmpath()->get_option( 'elmpath_elements_ext_active', array_keys( elmpath()->get_widgets_options( 'external' ) ) );
			$elements_ext_active = empty( $elements_ext_active ) || ! is_array( $elements_ext_active ) ? array() : $elements_ext_active;
			$elements_active     = elmpath()->get_option( 'elmpath_elements_active', array_keys( elmpath()->get_widgets_options( 'self' ) ) );
			$elements_active     = array_merge( $elements_active, $elements_ext_active );
			$elements_active     = empty( $elements_active ) || ! is_array( $elements_active ) ? array() : $elements_active;

			foreach ( elmpath()->get_widgets() as $widget_slug => $widget ) {
				if ( in_array( $widget_slug, $elements_active ) ) {

					$widget_slug = str_replace( 'elmpath_', '', $widget_slug );
					$widget_slug = str_replace( '_', '-', $widget_slug );
					$class_name  = elmpath()->get_settings_atts( 'class_name', '', $widget );

					elmpath()->include_widget_class( $widget_slug );
					\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new $class_name );
				}
			}
		}


		/**
		 * Includes classes and Functions
		 */
		public function include_files() {
			include_once( ELMPATH_PLUGIN_DIR . 'includes/classes/class-pb-settings.php' );
			include_once( ELMPATH_PLUGIN_DIR . 'includes/classes/class-functions.php' );
			include_once( ELMPATH_PLUGIN_DIR . 'includes/classes/class-hooks.php' );
			include_once( ELMPATH_PLUGIN_DIR . 'includes/classes/class-meta-boxes.php' );
			include_once( ELMPATH_PLUGIN_DIR . 'includes/functions.php' );
		}


		public function enqueue_editor_styles() {
			wp_enqueue_style( 'elmpath-admin', ELMPATH_PLUGIN_URL . 'assets/admin/css/style.css' );
		}

		/**
		 *  Register site scripts
		 */
		public function register_scripts() {
			wp_register_script( 'owl-carousel', ELMPATH_PLUGIN_URL . 'assets/front/js/owl.carousel.min.js', array( 'jquery' ), ELMPATH_VERSION, false );
			wp_register_script( 'jConveyorTicker', ELMPATH_PLUGIN_URL . 'assets/front/js/jquery.jConveyorTicker.js', array( 'jquery' ), ELMPATH_VERSION, false );
			wp_register_script( 'jquery-appear', ELMPATH_PLUGIN_URL . 'assets/front/js/jquery.appear.js', array( 'jquery' ), ELMPATH_VERSION, true );
			wp_register_script( 'image-compare-viewer', ELMPATH_PLUGIN_URL . 'assets/front/js/image-compare-viewer.min.js', array( 'jquery' ), ELMPATH_VERSION, false );
			wp_register_script( 'waypoints', ELMPATH_PLUGIN_URL . 'assets/front/js/waypoint.min.js', array( 'jquery' ), ELMPATH_VERSION, false );
			wp_register_script( 'timeline-slider', ELMPATH_PLUGIN_URL . 'assets/front/js/timeline.min.js', array( 'jquery' ), ELMPATH_VERSION, false );
			wp_register_script( 'justifiedGallery', ELMPATH_PLUGIN_URL . 'assets/front/js/jquery.justifiedGallery.min.js', array( 'jquery' ), ELMPATH_VERSION, false );
			wp_register_script( 'asPieProgress', ELMPATH_PLUGIN_URL . 'assets/front/js/jquery-asPieProgress.min.js', array( 'jquery' ), ELMPATH_VERSION, false );
			wp_register_script( 'elmpath-timeline', ELMPATH_PLUGIN_URL . 'assets/front/js/timeline-active.js', array( 'jquery' ), ELMPATH_VERSION, false );
			wp_register_script( 'products-carousel', ELMPATH_PLUGIN_URL . 'assets/front/js/products-carousel.js', array( 'jquery' ), ELMPATH_VERSION, true );
			wp_register_script( 'elmpath-accordion', ELMPATH_PLUGIN_URL . 'assets/front/js/accordion.js', array( 'jquery' ), ELMPATH_VERSION, false );
			wp_register_script( 'elmpath-tabs', ELMPATH_PLUGIN_URL . 'assets/front/js/tabs.js', array( 'jquery' ), ELMPATH_VERSION, false );
			wp_register_script( 'elmpath-progresspie', ELMPATH_PLUGIN_URL . 'assets/front/js/progresspie.js', array( 'jquery' ), ELMPATH_VERSION, false );
			wp_register_script( 'elmpath-progressbar', ELMPATH_PLUGIN_URL . 'assets/front/js/progressbar.js', array( 'jquery' ), ELMPATH_VERSION, false );
			wp_register_script( 'elmpath-typewriter', ELMPATH_PLUGIN_URL . 'assets/front/js/typewriter.js', array( 'jquery' ), ELMPATH_VERSION, false );
			wp_register_script( 'elmpath-newsticker', ELMPATH_PLUGIN_URL . 'assets/front/js/newsticker.js', array( 'jquery' ), ELMPATH_VERSION, false );
			wp_register_script( 'elmpath-gallery-justified', ELMPATH_PLUGIN_URL . 'assets/front/js/gallery-justified.js', array( 'jquery' ), ELMPATH_VERSION, false );
			wp_register_script( 'elmpath-marquee', ELMPATH_PLUGIN_URL . 'assets/front/js/marquee.js', array( 'jquery' ), ELMPATH_VERSION, false );
			wp_register_script( 'elmpath-image-compare', ELMPATH_PLUGIN_URL . 'assets/front/js/image-compare.js', array( 'jquery' ), ELMPATH_VERSION, true );
			wp_register_script( 'banner', ELMPATH_PLUGIN_URL . 'assets/front/js/banner.js', array( 'jquery' ), ELMPATH_VERSION, false );
			wp_register_script( 'counter-up', ELMPATH_PLUGIN_URL . 'assets/front/js/jquery.counter.min.js', array(
				'jquery',
				'waypoints'
			), ELMPATH_VERSION, false );
			wp_register_script( 'elmpath-counter', ELMPATH_PLUGIN_URL . 'assets/front/js/counter.js', array( 'jquery' ), ELMPATH_VERSION, false );
		}


		/**
		 * Register site styles
		 */
		public function register_styles() {
			wp_register_style( 'owl-carousel', ELMPATH_PLUGIN_URL . 'assets/front/css/owl.carousel.min.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-gallery-justified', ELMPATH_PLUGIN_URL . 'assets/front/css/gallery-justified.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-info-box', ELMPATH_PLUGIN_URL . 'assets/front/css/info-box.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-cf7', ELMPATH_PLUGIN_URL . 'assets/front/css/cf7.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-team', ELMPATH_PLUGIN_URL . 'assets/front/css/team.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-team-details', ELMPATH_PLUGIN_URL . 'assets/front/css/team-details.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-testimonial', ELMPATH_PLUGIN_URL . 'assets/front/css/testimonial.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-timeline', ELMPATH_PLUGIN_URL . 'assets/front/css/timeline.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-timeline-slider', ELMPATH_PLUGIN_URL . 'assets/front/css/timeline-slider.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-promotion', ELMPATH_PLUGIN_URL . 'assets/front/css/promotion.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-pricing', ELMPATH_PLUGIN_URL . 'assets/front/css/pricing.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-progressbar', ELMPATH_PLUGIN_URL . 'assets/front/css/progressbar.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-progresspie', ELMPATH_PLUGIN_URL . 'assets/front/css/progresspie.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-button', ELMPATH_PLUGIN_URL . 'assets/front/css/button.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-accordion', ELMPATH_PLUGIN_URL . 'assets/front/css/accordion.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-tabs', ELMPATH_PLUGIN_URL . 'assets/front/css/tabs.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-table', ELMPATH_PLUGIN_URL . 'assets/front/css/table.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-counter', ELMPATH_PLUGIN_URL . 'assets/front/css/counter.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-countdown', ELMPATH_PLUGIN_URL . 'assets/front/css/countdown.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-image-compare', ELMPATH_PLUGIN_URL . 'assets/front/css/image-compare.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-social-profile', ELMPATH_PLUGIN_URL . 'assets/front/css/social-profile.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-marquee', ELMPATH_PLUGIN_URL . 'assets/front/css/marquee.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-newsticker', ELMPATH_PLUGIN_URL . 'assets/front/css/newsticker.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-typewriter', ELMPATH_PLUGIN_URL . 'assets/front/css/typewriter.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-products-grid', ELMPATH_PLUGIN_URL . 'assets/front/css/products-grid.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-edd-products', ELMPATH_PLUGIN_URL . 'assets/front/css/edd-products.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-ninja-forms', ELMPATH_PLUGIN_URL . 'assets/front/css/ninja-forms.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-tribe-events', ELMPATH_PLUGIN_URL . 'assets/front/css/events.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-gradient-heading', ELMPATH_PLUGIN_URL . 'assets/front/css/gradient-heading.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-tutor', ELMPATH_PLUGIN_URL . 'assets/front/css/tutor.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-portfolio', ELMPATH_PLUGIN_URL . 'assets/front/css/portfolio.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-posts-grid', ELMPATH_PLUGIN_URL . 'assets/front/css/posts-grid.css', array(), ELMPATH_VERSION );
			wp_register_style( 'elmpath-mailchimp', ELMPATH_PLUGIN_URL . 'assets/front/css/mailchimp.css', array(), ELMPATH_VERSION );
		}


		/**
		 * Enqueue front styles
		 */
		public function front_styles() {

			wp_enqueue_script( 'apexcharts', ELMPATH_PLUGIN_URL . 'assets/front/js/apexcharts.js', array( 'jquery' ), ELMPATH_VERSION, false );
			wp_enqueue_style( 'pb-core', ELMPATH_PLUGIN_URL . 'assets/front/css/pb-core-styles.css', array(), ELMPATH_VERSION );
			wp_enqueue_style( 'elmpath-icons', ELMPATH_PLUGIN_URL . 'assets/front/css/element-path-font.css', array(), ELMPATH_VERSION );

			if ( is_rtl() ) {
				wp_enqueue_style( 'elmpath-rtl', ELMPATH_PLUGIN_URL . 'assets/front/css/rtl.css', array(), ELMPATH_VERSION );
			}
		}

		/**
		 * Localize Scripts
		 *
		 * @return mixed|void
		 */
		function localize_scripts() {
			return apply_filters( 'elmpath_filters_localize_scripts', array(
				'ajaxurl'           => admin_url( 'admin-ajax.php' ),
				'importingText'     => esc_html__( 'Importing...', 'element-path' ),
				'confirmRemoveText' => esc_html__( 'Do you really want to remove this item?', 'element-path' ),
			) );
		}


		/**
		 * Load Admin Scripts
		 */
		function admin_scripts() {
			wp_enqueue_style( 'elmpath-core', ELMPATH_PLUGIN_URL . 'assets/admin/css/core-style.css' );
			wp_enqueue_style( 'elmpath-admin', ELMPATH_PLUGIN_URL . 'assets/admin/css/style.css' );
			wp_enqueue_script( 'elmpath-admin', ELMPATH_PLUGIN_URL . 'assets/admin/js/scripts.js', array( 'jquery', 'jquery-ui-sortable' ) );
			wp_localize_script( 'elmpath-admin', 'elmpath', $this->localize_scripts() );

			wp_register_style( 'bootstrap', ELMPATH_PLUGIN_URL . 'assets/admin/css/bootstrap.css' );
			wp_register_script( 'bootstrap', ELMPATH_PLUGIN_URL . 'assets/admin/js/bootstrap.min.js', array( 'jquery' ) );

			wp_enqueue_style( 'select2', ELMPATH_PLUGIN_URL . 'assets/admin/css/select2.min.css' );
			wp_enqueue_script( 'select2', ELMPATH_PLUGIN_URL . 'assets/admin/js/select2.min.js', array( 'jquery' ) );
		}


		/**
		 * Language and Textdomain
		 */
		public function i18n() {
			load_plugin_textdomain( 'element-path', false, plugin_basename( dirname( __FILE__ ) ) . '/languages/' );
		}
	}

	new ELMPATH_Main();
}