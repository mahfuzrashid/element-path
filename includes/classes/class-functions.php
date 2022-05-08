<?php
/**
 * Class Functions
 */

if ( ! function_exists( 'ELMPATH_Functions' ) ) {
	class ELMPATH_Functions {

		public $active_elements = null;

		/**
		 * ELMPATH_Functions constructor.
		 */
		function __construct() {
			$this->set_active_elements();
		}


		/**
		 * Return if an element is active or not
		 *
		 * @param string $element_id
		 *
		 * @return bool
		 */
		function is_element_active( $element_id = '' ) {

			if ( empty( $element_id ) ) {
				return false;
			}

			return in_array( sprintf( 'elmpath_%s', $element_id ), $this->get_active_elements() );
		}


		/**
		 * Return active elements
		 *
		 * @return null
		 */
		function get_active_elements() {
			return $this->active_elements;
		}


		/**
		 * Set all active elements
		 */
		function set_active_elements() {
			$elements_ext_active = $this->get_option( 'elmpath_elements_ext_active', array_keys( $this->get_widgets_options( 'external' ) ) );
			$elements_ext_active = empty( $elements_ext_active ) || ! is_array( $elements_ext_active ) ? array() : $elements_ext_active;
			$elements_active     = $this->get_option( 'elmpath_elements_active', array_keys( $this->get_widgets_options( 'self' ) ) );
			$elements_active     = array_merge( $elements_active, $elements_ext_active );

			$this->active_elements = empty( $elements_active ) || ! is_array( $elements_active ) ? array() : $elements_active;
		}


		/**
		 * Return template by id and group name
		 *
		 * @param string $template_id
		 * @param string $template_group
		 *
		 * @return mixed|void
		 */
		function get_template_by_id( $template_id = '', $template_group = '' ) {

			$templates = elmpath()->get_plugin_data( 'templates' );
			$template  = isset( $templates[ $template_group ]['pages'][ $template_id ] ) ? $templates[ $template_group ]['pages'][ $template_id ] : array();

			return apply_filters( 'elmpath_filters_template_by_id', $template, $template_id, $template_group );
		}


		/**
		 * Return template group thumbnail
		 *
		 * @param array $template_group
		 *
		 * @return mixed|void
		 */
		function get_template_group_thumb( $template_group = array() ) {

			$pages    = elmpath()->get_settings_atts( 'pages', array(), $template_group );
			$template = reset( $pages );
			$thumb    = elmpath()->get_settings_atts( 'thumb', '', $template );

			return apply_filters( 'elmpath_filters_get_template_group_thumb', $thumb );
		}


		/**
		 * Return required data from api response
		 *
		 * @param string $data_for
		 *
		 * @return mixed|string
		 */
		function get_plugin_data( $data_for = 'templates' ) {

			//			$api_response = array(
//				'templates' => array(
//					'agency'   => array(
//						'title'    => esc_html( 'Agency' ),
//						'type'     => 'template',
//						'category' => 'agency',
//						'tags'     => array( 'home', 'agency', 'landing page', 'agency', 'jaed', 'mosharraf' ),
//						'pages'    => array(
//							'agency_main'    => array(
//								'title'       => esc_html( 'Agency - Home' ),
//								'thumb'       => 'https://api.hasthemes.com/api/htmega/v1/layout-img/thumb/agency-aboutus.png',
//								'page_id'     => 265,
//								'demo'        => 'http://demo.wphash.com/htmega/agency/',
//								'pro'         => false,
//								'req_plugins' => array(
//									array(
//										'id'     => 'contact-form-7',
//										'label'  => esc_html( 'Contact Form 7' ),
//										'is_pro' => false,
//									),
//									array(
//										'id'     => 'wp-poll',
//										'label'  => esc_html( 'WP Poll' ),
//										'is_pro' => false,
//									),
//									array(
//										'id'     => 'wp-poll-pro',
//										'label'  => esc_html( 'WP Poll - Pro' ),
//										'url'    => esc_url( 'https://pluginbazar.com/plugin/wp-poll' ),
//										'is_pro' => true,
//									),
//								),
//							),
//							'agency_about'   => array(
//								'title'       => esc_html( 'Agency - About Us' ),
//								'thumb'       => 'https://api.hasthemes.com/api/htmega/v1/layout-img/thumb/agency-aboutus.png',
//								'page_id'     => 1070,
//								'demo'        => 'http://demo.wphash.com/ht-agency/about-us/',
//								'pro'         => false,
//								'req_plugins' => array(),
//							),
//							'agency_service' => array(
//								'title'       => esc_html( 'Agency - Service' ),
//								'thumb'       => 'https://api.hasthemes.com/api/htmega/v1/layout-img/thumb/agency-service.png',
//								'page_id'     => 80,
//								'demo'        => 'http://demo.wphash.com/ht-agency/service/',
//								'pro'         => false,
//								'req_plugins' => array(),
//							),
//						),
//					),
//					'cleaning' => array(
//						'title'    => esc_html( 'Cleaning Service' ),
//						'type'     => 'template',
//						'category' => 'cleaning',
//						'tags'     => array( 'cleaning', 'service' ),
//						'pages'    => array(
//							'cleaning_main'    => array(
//								'title'       => esc_html( 'Cleaning - Home' ),
//								'thumb'       => 'https://api.hasthemes.com/api/htmega/v1/layout-img/thumb/cleaning-service.png',
//								'page_id'     => 112,
//								'demo'        => 'http://demo.wphash.com/htmega/cleaning-service/',
//								'pro'         => true,
//								'req_plugins' => array(),
//							),
//							'cleaning_service' => array(
//								'title'       => esc_html( 'Cleaning - Service' ),
//								'thumb'       => 'https://api.hasthemes.com/api/htmega/v1/layout-img/thumb/cleaning-servicepage.png',
//								'page_id'     => 91,
//								'demo'        => 'http://demo.wphash.com/ht-cleaning/service/',
//								'pro'         => true,
//								'req_plugins' => array(),
//							),
//							'cleaning_contact' => array(
//								'title'       => esc_html( 'Cleaning - Contact' ),
//								'thumb'       => 'https://api.hasthemes.com/api/htmega/v1/layout-img/thumb/cleaning-contactus.png',
//								'page_id'     => 606,
//								'demo'        => 'http://demo.wphash.com/ht-cleaning/contact-us/',
//								'pro'         => true,
//								'req_plugins' => array(
//									array(
//										'id'     => 'contact-form-7',
//										'label'  => esc_html( 'Contact Form 7' ),
//										'is_pro' => false,
//									),
//								),
//							),
//						),
//					),
//				),
//			);

			// Check option for saved data
			$elmpath_api_response = elmpath()->get_option( 'elmpath_api_response', array() );
			$elmpath_api_response = ! is_array( $elmpath_api_response ) ? array() : $elmpath_api_response;

			// If empty get from remote server
			if ( empty( $elmpath_api_response ) ) {
				$elmpath_api_response = elmpath()->get_plugin_data_from_api();

				update_option( 'elmpath_api_response', $elmpath_api_response );
			}

			return elmpath()->get_settings_atts( $data_for, array(), $elmpath_api_response );
		}


		/**
		 * Return plugin data from remote server
		 *
		 * @return array
		 */
		function get_plugin_data_from_api() {
			if ( is_wp_error( $api_response = wp_remote_get( sprintf( '%s/wp-json/elmpath/plugin-data', ELMPATH_API_URL ) ) ) ) {
				return array();
			}

			// Parsing response data
			$response_data = wp_remote_retrieve_body( $api_response );
			$response_data = json_decode( $response_data, true );

			return json_decode( $response_data, true );
		}


		/**
		 * include widget class
		 *
		 * @param string $widget_slug
		 */
		function include_widget_class( $widget_slug = '' ) {

			if ( empty( $widget_slug ) || ! $widget_slug ) {
				return;
			}

			global $current_widget;

			$widget_class_file = sprintf( '%swidgets/%s/widget.php', ELMPATH_PLUGIN_DIR, $widget_slug );
			$widget_class_file = apply_filters( 'elmpath_filters_widget_class_file', $widget_class_file, $widget_slug );

			if ( file_exists( $widget_class_file ) ) {
				include_once( $widget_class_file );
			}
		}


		/**
		 * Return arrays of widgets
		 *
		 * @return mixed|void
		 */
		function get_widgets() {

			$widgets = [
				'elmpath_accordion'         => [
					'title'      => esc_html__( 'Accordion', 'element-path' ),
					'icon'       => 'eicon-accordion',
					'keywords'   => [ 'accordion', 'toggle', 'collapse' ],
					'styles'     => 6,
					'views'      => [
						'4' => 'template-2',
						'5' => 'template-2',
						'6' => 'template-3',
					],
					'class_name' => 'ELMPATH_Accordion',
					'type'       => 'self',
				],
				'elmpath_button'            => [
					'title'      => esc_html__( 'Button', 'element-path' ),
					'icon'       => 'eicon-image',
					'keywords'   => [ 'button', 'widget' ],
					'styles'     => 1,
					'class_name' => 'ELMPATH_Button',
					'type'       => 'self',
				],
				'elmpath_countdown'         => [
					'title'      => esc_html__( 'Countdown', 'element-path' ),
					'icon'       => 'eicon-countdown',
					'keywords'   => [ 'countdown', 'timer' ],
					'styles'     => 5,
					'class_name' => 'ELMPATH_Countdown',
					'type'       => 'self',
				],
				'elmpath_counter'           => [
					'title'      => esc_html__( 'Counter', 'element-path' ),
					'icon'       => 'eicon-counter',
					'keywords'   => [ 'counter', 'timer', 'countup' ],
					'styles'     => 5,
					'class_name' => 'ELMPATH_Counter',
					'type'       => 'self',
				],
				'elmpath_contact'           => [
					'title'      => esc_html__( 'Contact From 7', 'element-path' ),
					'icon'       => 'eicon-form-horizontal',
					'keywords'   => [ 'cf7' ],
					'styles'     => 1,
					'class_name' => 'ELMPATH_Contact_Form',
					'type'       => 'external',
				],
				'elmpath_charts'            => [
					'title'      => esc_html__( 'Charts', 'element-path' ),
					'icon'       => 'eicon-countdown',
					'keywords'   => [ 'charts', 'barcharts' ],
					'styles'     => 4,
					'class_name' => 'ELMPATH_Charts',
					'views'      => [
						'1' => 'template-1',
						'2' => 'template-1',
						'3' => 'template-2',
						'4' => 'template-2',
					],
					'type'       => 'external',
				],
				'elmpath_tribe_events_grid' => [
					'title'      => esc_html__( 'Tribe Events Grid', 'element-path' ),
					'icon'       => 'eicon-calendar',
					'keywords'   => [ 'events', 'tribe', 'meetup' ],
					'styles'     => 2,
					'class_name' => 'ELMPATH_Tribe_Events_Grid',
					'views'      => [
						'2' => 'template-2'
					],
					'type'       => 'external',
				],
				'elmpath_edd_products_grid' => [
					'title'      => esc_html__( 'Edd Products Grid', 'element-path' ),
					'icon'       => 'eicon-product-stock',
					'keywords'   => [ 'EDD', 'easy digital', 'download', 'products' ],
					'styles'     => 3,
					'class_name' => 'ELMPATH_EDD_Products_Grid',
					'type'       => 'external',
				],
				'elmpath_gradient_heading'  => [
					'title'      => esc_html__( 'Gradient Heading', 'element-path' ),
					'icon'       => 'eicon-t-letter',
					'keywords'   => [ 'Gradient Heading', 'Gradient Title' ],
					'styles'     => 1,
					'class_name' => 'ELMPATH_Gradient_Heading',
					'type'       => 'self',
				],
				'elmpath_info_box'          => [
					'title'      => esc_html__( 'Info Box', 'element-path' ),
					'icon'       => 'eicon-icon-box',
					'keywords'   => [ 'info box', 'services', 'info', 'box' ],
					'styles'     => 5,
					'class_name' => 'ELMPATH_Info_Box',
					'type'       => 'self',
				],
				'elmpath_gallery_justified' => [
					'title'      => esc_html__( 'Gallery - Justified', 'element-path' ),
					'icon'       => 'eicon-image',
					'keywords'   => [ 'gallery', 'justified' ],
					'styles'     => 1,
					'class_name' => 'ELMPATH_Gallery_Justified',
					'type'       => 'self',
				],
				'elmpath_image_compare'     => [
					'title'      => esc_html__( 'Image Compare', 'element-path' ),
					'icon'       => 'eicon-image',
					'keywords'   => [ 'image compare', 'image', 'gallery' ],
					'styles'     => 1,
					'class_name' => 'ELMPATH_Image_Compare',
					'type'       => 'self',
				],
				'elmpath_marquee'           => [
					'title'      => esc_html__( 'Marquee', 'element-path' ),
					'icon'       => 'eicon-t-letter',
					'keywords'   => [ 'marquee', 'breaking news' ],
					'styles'     => 5,
					'class_name' => 'ELMPATH_Marquee',
					'type'       => 'self',
				],
				'elmpath_mailchimp'         => [
					'title'      => esc_html__( 'Mailchimp', 'element-path' ),
					'icon'       => 'eicon-form-horizontal',
					'keywords'   => [ 'form', 'contact', 'forms' ],
					'styles'     => 1,
					'class_name' => 'ELMPATH_Mailchimp',
					'type'       => 'self',
				],
				'elmpath_ninja_forms'       => [
					'title'      => esc_html__( 'Ninja Forms', 'element-path' ),
					'icon'       => 'eicon-form-horizontal',
					'keywords'   => [ 'ninja', 'contact', 'forms' ],
					'styles'     => 1,
					'class_name' => 'ELMPATH_Ninja_Forms',
					'type'       => 'external',
				],
				'elmpath_newsticker'        => [
					'title'      => esc_html__( 'Newsticker', 'element-path' ),
					'icon'       => 'eicon-animated-headline',
					'keywords'   => [ 'newsticker', 'breaking news' ],
					'styles'     => 5,
					'class_name' => 'ELMPATH_Newsticker',
					'type'       => 'self',
				],
				'elmpath_posts_grid'        => [
					'title'      => esc_html__( 'Posts Grid', 'element-path' ),
					'icon'       => 'eicon-archive-posts',
					'keywords'   => [ 'blog', 'posts grid' ],
					'styles'     => 6,
					'class_name' => 'ELMPATH_Posts_Grid',
					'views'      => [
						'2' => 'template-2',
						'3' => 'template-3',
						'4' => 'template-4',
						'5' => 'template-5',
						'6' => 'template-6',
					],
					'type'       => 'self',
				],
				'elmpath_portfolio'         => [
					'title'      => esc_html__( 'Portfolio', 'element-path' ),
					'icon'       => 'eicon-gallery-grid',
					'keywords'   => [ 'pricing', 'pricing plan' ],
					'styles'     => 3,
					'class_name' => 'ELMPATH_Portfolio',
					'views'      => [
						'2' => 'template-2',
						'3' => 'template-3',
					],
					'type'       => 'self',
				],
				'elmpath_pricing'           => [
					'title'      => esc_html__( 'Pricing', 'element-path' ),
					'icon'       => 'eicon-price-table',
					'keywords'   => [ 'pricing', 'pricing plan' ],
					'styles'     => 5,
					'class_name' => 'ELMPATH_Pricing',
					'views'      => [
						'2' => 'template-2',
						'3' => 'template-3',
						'4' => 'template-4',
						'5' => 'template-4',
					],
					'type'       => 'self',
				],
				'elmpath_promotion'         => [
					'title'      => esc_html__( 'Promotional Banner', 'element-path' ),
					'icon'       => 'eicon-testimonial',
					'keywords'   => [ 'promotion', 'banner', 'widget' ],
					'styles'     => 1,
					'class_name' => 'ELMPATH_Promotion',
					'type'       => 'self',
				],
				'elmpath_progressbar'       => [
					'title'      => esc_html__( 'Progressbar', 'element-path' ),
					'icon'       => 'eicon-skill-bar',
					'keywords'   => [ 'progressbar', 'skill' ],
					'styles'     => 3,
					'class_name' => 'ELMPATH_Progressbar',
					'views'      => [
						'3' => 'template-2',
					],
					'type'       => 'self',
				],
				'elmpath_progresspie'       => [
					'title'      => esc_html__( 'Progresspie', 'element-path' ),
					'icon'       => 'fas fa-circle-notch',
					'keywords'   => [ 'progresspie', 'skill' ],
					'styles'     => 1,
					'class_name' => 'ELMPATH_Progresspie',
					'type'       => 'self',
				],
				'elmpath_products_grid'     => [
					'title'      => esc_html__( 'Products Grid', 'element-path' ),
					'icon'       => 'eicon-woocommerce',
					'keywords'   => [ 'products', 'woocommerce' ],
					'styles'     => 3,
					'class_name' => 'ELMPATH_Products_Grid',
					'type'       => 'external',
				],
				'elmpath_products_carousel' => [
					'title'      => esc_html__( 'Products Carousel', 'element-path' ),
					'icon'       => 'eicon-woocommerce',
					'keywords'   => [ 'products', 'woocommerce' ],
					'styles'     => 3,
					'class_name' => 'ELMPATH_Products_Carousel',
					'type'       => 'external',
				],
				'elmpath_social_profile'    => [
					'title'      => esc_html__( 'Social Profile', 'element-path' ),
					'icon'       => 'eicon-share',
					'keywords'   => [ 'social', 'profile' ],
					'styles'     => 5,
					'class_name' => 'ELMPATH_Social_Profile',
					'views'      => [
						'2' => 'template-2',
						'4' => 'template-3',
					],
					'type'       => 'self',
				],
				'elmpath_table'             => [
					'title'      => esc_html__( 'Table', 'element-path' ),
					'icon'       => 'eicon-table-of-contents',
					'keywords'   => [ 'table', 'elmpath' ],
					'styles'     => 6,
					'class_name' => 'ELMPATH_Table',
					'type'       => 'external',
				],
				'elmpath_tabs'              => [
					'title'      => esc_html__( 'Tabs', 'element-path' ),
					'icon'       => 'eicon-tabs',
					'keywords'   => [ 'tabs', 'tab', 'collapse' ],
					'styles'     => 6,
					'class_name' => 'ELMPATH_Tabs',
					'type'       => 'self',
				],
				'elmpath_testimonial'       => [
					'title'      => esc_html__( 'Testimonial', 'element-path' ),
					'icon'       => 'eicon-testimonial',
					'keywords'   => [ 'testimonial', 'client', 'review' ],
					'styles'     => 5,
					'class_name' => 'ELMPATH_Testimonial',
					'views'      => [
						'2' => 'template-2',
						'3' => 'template-3',
						'4' => 'template-3',
					],
					'type'       => 'self',
				],
				'elmpath_team'              => [
					'title'      => esc_html__( 'Team', 'element-path' ),
					'icon'       => 'eicon-hypster',
					'keywords'   => [ 'team', 'member', 'author' ],
					'styles'     => 7,
					'class_name' => 'ELMPATH_Team',
					'views'      => [
						'1' => 'template-2',
						'4' => 'template-3',
						'6' => 'template-4',
						'7' => 'template-7',
					],
					'type'       => 'self',
				],
				'elmpath_team_details'      => [
					'title'      => esc_html__( 'Team details', 'element-path' ),
					'icon'       => 'eicon-hypster',
					'keywords'   => [ 'team', 'team-details', 'member', 'author' ],
					'styles'     => 1,
					'class_name' => 'ELMPATH_Team_details',
					'views'      => [
						'1' => 'template-1',
					],
					'type'       => 'self',
				],
				'elmpath_typewriter'        => [
					'title'      => esc_html__( 'Typewriter', 'element-path' ),
					'icon'       => 'eicon-animated-headline',
					'keywords'   => [ 'typewriter', 'animated text' ],
					'styles'     => 1,
					'class_name' => 'ELMPATH_Typewriter',
					'type'       => 'self',
				],
				'elmpath_timeline'          => [
					'title'      => esc_html__( 'Timeline', 'element-path' ),
					'icon'       => 'eicon-toggle',
					'keywords'   => [ 'timeline', 'vertical', 'widget pack' ],
					'styles'     => 4,
					'class_name' => 'ELMPATH_Timeline',
					'views'      => [
						'3' => 'template-2',
					],
					'type'       => 'self',
				],
				'elmpath_tutor'             => [
					'title'      => esc_html__( 'Tutor', 'element-path' ),
					'icon'       => 'fas fa-graduation-cap',
					'keywords'   => [ 'tutor', 'tutorial', 'learn' ],
					'styles'     => 1,
					'class_name' => 'ELMPATH_Tutor',
					'type'       => 'external',
				],
				'elmpath_timeline_slider'   => [
					'title'      => esc_html__( 'Timeline Slider', 'element-path' ),
					'icon'       => 'eicon-slider-push',
					'keywords'   => [ 'timeline', 'horizontal', 'widget pack' ],
					'styles'     => 1,
					'class_name' => 'ELMPATH_Timeline_Slider',
					'type'       => 'self',
				],
				'elmpath_weforms'           => [
					'title'      => esc_html__( 'weForms', 'element-path' ),
					'icon'       => 'eicon-form-horizontal',
					'keywords'   => [ 'forms', 'weforms', 'contact' ],
					'styles'     => 1,
					'class_name' => 'ELMPATH_weForms',
					'type'       => 'external',
				],
				'elmpath_slider'  => [
		            'title'      => esc_html__( 'Banner Slider', 'element-path' ),
		            'icon'       => 'eicon-slider',
		            'keywords'   => [ 'slider', 'toggle', 'collapse' ],
		            'styles'     => 1,
		            'class_name' => 'ELMPATH_Slider',
		            'type'       => 'self',
		        ],


			];

			return apply_filters( 'elmpath_filters_widgets', $widgets );
		}


		/**
		 * Return widget options for specific type
		 *
		 * @param string $for
		 *
		 * @return mixed|void
		 */
		function get_widgets_options( $for = '' ) {

			$widgets = array();
			foreach ( $this->get_widgets() as $widget_slug => $widget ) {
				if ( $for === $this->get_settings_atts( 'type', '', $widget ) ) {
					$widgets[ $widget_slug ] = $this->get_settings_atts( 'title', '', $widget );
				} else if ( empty( $for ) ) {
					$widgets[ $widget_slug ] = $this->get_settings_atts( 'title', '', $widget );
				}
			}

			return apply_filters( 'elmpath_filters_widgets_options', $widgets, $for );
		}


		/**
		 * Return post ids
		 *
		 * @param string $content_type
		 *
		 * @return array|int[]|WP_Post[]
		 */
		function get_post_ids( $content_type = '' ) {

			$post_ids = array();

			if ( $content_type == 'by_posts_category' ) {

				foreach ( elmpath()->get_settings_atts( '_category' ) as $category_id ) {
					$query_string = sprintf( 'fields=ids&posts_per_page=-1&category=%s', $category_id );
					$post_ids     = array_merge( $post_ids, get_posts( $query_string ) );
				}
			} elseif ( $content_type == 'by_posts_tags' ) {
				echo '<pre>';
				print_r( elmpath()->get_settings_atts( 'tag_ids' ) );
				echo '</pre>';

				$post_ids = get_posts( array(
					'post_type'      => 'post',
					'posts_per_page' => - 1,
					'fields'         => 'ids',
					'tax_query'      => array(
						array(
							'taxonomy' => 'post_tag',
							'field'    => 'term_id',
							'terms'    => elmpath()->get_settings_atts( 'tag_ids' ),
						),
					)
				) );

			} elseif ( $content_type == 'by_latest_posts' ) {
				$post_ids = get_posts( array(
					'posts_per_page' => - 1,
					'offset'         => 0,
					'orderby'        => 'post_date',
					'fields'         => 'ids',
					'order'          => 'DESC',
					'post_type'      => 'post',
					'post_status'    => 'publish'
				) );

			} elseif ( $content_type == 'by_custom' ) {
				$post_ids = explode( ',', elmpath()->get_settings_atts( 'custom_post_ids' ) );
			} else {
				$post_ids = elmpath()->get_settings_atts( 'post_ids' );
			}

			return $post_ids;

		}


		/**
		 * Return advanced addons as array
		 *
		 * @return mixed|void
		 */
		function get_advanced_addons() {
			return apply_filters( 'elmpath_filters_advanced_addons', array(
				'sales_notification' => esc_html__( 'Sales Notification', 'element-plus' ),
				'post_duplicator'    => esc_html__( 'Post Duplicator', 'element-plus' ),
			) );
		}


		/**
		 * Print notice to the admin bar
		 *
		 * @param string $message
		 * @param bool $is_success
		 * @param bool $is_dismissible
		 */
		function print_notice( $message = '', $is_success = true, $is_dismissible = true ) {

			if ( empty ( $message ) ) {
				return;
			}

			if ( is_bool( $is_success ) ) {
				$is_success = $is_success ? 'success' : 'error';
			}

			printf( '<div class="notice notice-%s %s"><p>%s</p></div>', $is_success, $is_dismissible ? 'is-dismissible' : '', $message );
		}


		/**
		 * Return Shortcode Arguments
		 *
		 * @param string $key
		 * @param string $default
		 * @param array $args
		 *
		 * @return mixed|string
		 */
		function get_settings_atts( $key = '', $default = '', $args = array() ) {

			global $widget_settings;

			$args    = empty( $args ) ? $widget_settings : $args;
			$default = is_array( $default ) && ! empty( $default ) ? array() : $default;
			$default = ! is_array( $default ) && empty( $default ) ? '' : $default;
			$key     = empty( $key ) ? '' : $key;

			if ( isset( $args[ $key ] ) && ! empty( $args[ $key ] ) ) {
				return $args[ $key ];
			}

			return $default;
		}


		/**
		 * Return option value
		 *
		 * @param string $option_key
		 * @param string $default_val
		 *
		 * @return mixed|string|void
		 */
		function get_option( $option_key = '', $default_val = '' ) {

			if ( empty( $option_key ) ) {
				return '';
			}

			$option_val = get_option( $option_key, $default_val );
			$option_val = empty( $option_val ) ? $default_val : $option_val;

			return apply_filters( 'elmpath_filters_option_' . $option_key, $option_val );
		}


		/**
		 * Return Post Meta Value
		 *
		 * @param bool $meta_key
		 * @param bool $post_id
		 * @param string $default
		 *
		 * @return mixed|string|void
		 */
		function get_meta( $meta_key = false, $post_id = false, $default = '' ) {

			if ( ! $meta_key ) {
				return '';
			}

			$post_id    = ! $post_id ? get_the_ID() : $post_id;
			$meta_value = get_post_meta( $post_id, $meta_key, true );
			$meta_value = empty( $meta_value ) ? $default : $meta_value;

			return apply_filters( 'woc_filters_get_meta', $meta_value, $meta_key, $post_id, $default );
		}


		/**
		 * PB_Settings Class
		 *
		 * @param array $args
		 *
		 * @return PB_Settings
		 */
		function PB_Settings( $args = array() ) {

			return new PB_Settings( $args );
		}


		/**
		 * Generate and return widget styles
		 *
		 * @param int $style_count
		 *
		 * @return array
		 */
		function load_widget_styles( $style_count = 1 ) {

			$styles = array();
			for ( $index = 1; $index <= $style_count; $index ++ ) {
				$styles[ $index ] = sprintf( esc_html__( 'Style %s', 'element-path' ), $index );
			}

			return $styles;
		}
	}

	new ELMPATH_Functions();
}