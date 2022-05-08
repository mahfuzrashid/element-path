<?php
/**
 * Widget: Tribe Events Grid
 */

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

defined( 'ABSPATH' ) || die();

class ELMPATH_Tribe_Events_Grid extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-tribe-events-grid';
	}

	/**
	 * Get dependent stylesheet
	 */
	public function get_style_depends() {
		return [ 'elmpath-tribe-events' ];
	}

	/**
	 * Register content related controls
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Query', 'element-path' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'content_type',
			[
				'label'   => esc_html__( 'Content Type', 'element-path' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'by_latest_events',
				'options' => array(
					'by_latest_events'   => esc_html__( 'By Latest Events', 'element-path' ),
					'by_events_category' => esc_html__( 'By Events Category', 'element-path' ),
					'by_events_tags'     => esc_html__( 'By Events Tags', 'element-path' ),
					'by_events'          => esc_html__( 'By Events', 'element-path' ),
					'by_custom'          => esc_html__( 'By Custom', 'element-path' ),
				),
			]
		);

		$this->add_control(
			'_category',
			[
				'label'       => esc_html__( 'Category', 'element-path' ),
				'type'        => Controls_Manager::SELECT2,
				'multiple'    => true,
				'label_block' => true,
				'options'     => $this->elmpath_get_taxonomies( 'tribe_events_cat' ),
				'condition'   => [
					'content_type' => 'by_events_category',
				],
			]
		);

		$this->add_control(
			'tag_ids',
			[
				'label'       => esc_html__( 'Tags', 'element-path' ),
				'type'        => Controls_Manager::SELECT2,
				'multiple'    => true,
				'label_block' => true,
				'options'     => $this->elmpath_get_taxonomies( 'post_tag' ),
				'condition'   => [
					'content_type' => 'by_events_tags',
				],
			]
		);

		$this->add_control(
			'product_ids',
			[
				'label'       => esc_html__( 'Events List', 'element-path' ),
				'type'        => Controls_Manager::SELECT2,
				'multiple'    => true,
				'label_block' => true,
				'options'     => $this->elmpath_get_post_type( 'tribe_events' ),
				'condition'   => [
					'content_type' => 'by_events',
				],
			]
		);

		$this->add_control(
			'custom_product_ids',
			[
				'label'       => esc_html__( 'Custom Events IDs', 'element-path' ),
				'description' => esc_html__( 'Add any product ids of tribe events post types. If multiple use comma to separate them. Example: 1023,201,239', 'element-path' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html( '1023,201,239' ),
				'condition'   => [
					'content_type' => 'by_custom',
				],
			]
		);

		$this->add_control(
			'posts_per_page',
			[
				'label'       => esc_html__( 'Total Items', 'element-path' ),
				'type'        => Controls_Manager::NUMBER,
				'placeholder' => - 1,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'events_grid_settings',
			[
				'label' => esc_html__( 'Additional Settings', 'element-path' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'items_per_row',
			[
				'label'   => esc_html__( 'Item (s) Per Row', 'element-path' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '6',
				'options' => [
					'12' => esc_html__( '1 Column', 'element-path' ),
					'6'  => esc_html__( '2 Column', 'element-path' ),
					'4'  => esc_html__( '3 Column', 'element-path' ),
					'3'  => esc_html__( '4 Column', 'element-path' ),
				],
			]
		);

		$this->add_control(
			'excerpt_length',
			[
				'label'       => esc_html__( 'Excerpt Length', 'element-path' ),
				'type'        => Controls_Manager::NUMBER,
				'placeholder' => 14,
			]
		);

		$this->add_control(
			'show_thumbs',
			[
				'label'   => esc_html__( 'Show Thumbs', 'element-path' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_date',
			[
				'label'   => esc_html__( 'Show Date', 'element-path' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_title',
			[
				'label'   => esc_html__( 'Show Title', 'element-path' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_desc',
			[
				'label'   => esc_html__( 'Show Short Description', 'element-path' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_cost',
			[
				'label'   => esc_html__( 'Show Cost', 'element-path' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_website',
			[
				'label'   => esc_html__( 'Show Website', 'element-path' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_address',
			[
				'label'   => esc_html__( 'Show Address', 'element-path' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'events_grid_style',
			[
				'label' => esc_html__( 'Global', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_common_controls();


		$this->end_controls_section();


		$this->start_controls_section(
			'events_title_style',
			[
				'label' => esc_html__( 'Title', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-tribe-events .elmpath-event-title a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'title_hover_color',
			[
				'label'     => esc_html__( 'Hover Color', 'element-path' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-tribe-events-2 .elmpath-event-title a:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elmpath-tribe-events-1 .elmpath-event-title a:hover' => 'box-shadow: 0 -1px 0 0 #fff inset, 0 -2px 0 0 {{VALUE}} inset;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'typography_title',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .elmpath-tribe-events .elmpath-event-title',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'events_desc_style',
			[
				'label' => esc_html__( 'Description', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-tribe-events .elmpath-event-content' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => esc_html__( 'Typography', 'element-path' ),
				'name'     => 'typography_desc',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .elmpath-tribe-events .elmpath-event-content',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'events_date_time_style',
			[
				'label' => esc_html__( 'Date/Time', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'date_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-tribe-events .elmpath-event-date' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'date_bg_color',
			[
				'label'     => esc_html__( 'Background', 'element-path' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-tribe-events-1 .elmpath-event-date' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'style' => '1'
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'events_tooltip_style',
			[
				'label' => esc_html__( 'Tooltip', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'tooltip_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .pb-tooltip:after' => 'color: {{VALUE}}',
					'{{WRAPPER}} .pb-tooltip:before' => 'border-top-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'tooltip_bg_color',
			[
				'label'     => esc_html__( 'Background', 'element-path' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .pb-tooltip:after' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .pb-tooltip:before' => 'border-top-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'events_cost_style',
			[
				'label' => esc_html__( 'Joining Cost', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'cost_label_color',
			[
				'label'     => esc_html__( 'Label Color', 'element-path' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-tribe-events .elmpath-event-price strong' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'cost_value_color',
			[
				'label'     => esc_html__( 'Value Color', 'element-path' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-tribe-events .elmpath-event-price span' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'events_web_address_style',
			[
				'label' => esc_html__( 'Website/Address', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'web_icon_color',
			[
				'label'     => esc_html__( 'Website Icon Color', 'element-path' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-tribe-events .address-website-icon a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'address_icon_color',
			[
				'label'     => esc_html__( 'Address Icon Color', 'element-path' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-tribe-events .address-website-icon span' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

	}

}
