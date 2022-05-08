<?php
/**
 * Widget: Tabs
 */

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Repeater;

defined( 'ABSPATH' ) || die();

class ELMPATH_Tabs extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-tabs';
	}

	/**
	 * Get dependent stylesheet
	 */
	public function get_style_depends() {
		return [ 'elmpath-tabs' ];
	}

	/**
	 * Get dependent scripts
	 */
	public function get_script_depends() {
		return [ 'elmpath-tabs' ];
	}

	/**
	 * Register content related controls
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'section_tabs_content',
			[
				'label' => esc_html__( 'Tabs Items', 'element-path' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'tab_title',
			[
				'label' => esc_html__( 'Title & Description', 'element-path' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Tab Title', 'element-path' ),
				'placeholder' => esc_html__( 'Tab Title', 'element-path' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'tab_content',
			[
				'label' => esc_html__( 'Content', 'element-path' ),
				'default' => esc_html__( 'Tab Content', 'element-path' ),
				'placeholder' => esc_html__( 'Tab Content', 'element-path' ),
				'type' => Controls_Manager::WYSIWYG,
				'show_label' => false,
				'dynamic' => [
					'active' => false,
				],
			]
		);

		$repeater->add_control(
			'_icon',
			[
				'label'   => esc_html__( 'Choose Icon', 'element-path' ),
				'type'             => Controls_Manager::ICONS,
				'fa4compatibility' => 'tab_iocn',
			]
		);

		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Tabs Items', 'element-path' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'tab_title' => esc_html__( 'Tab #1', 'element-path' ),
						'tab_content' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'element-path' ),
					],
					[
						'tab_title' => esc_html__( 'Tab #2', 'element-path' ),
						'tab_content' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'element-path' ),
					],
				],
				'title_field' => '{{{ tab_title }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_tabs_style',
			[
				'label' => esc_html__( 'Style', 'element-path' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_common_controls();

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'background',
				'label'     => esc_html__( 'Background', 'element-path' ),
				'types'     => [ 'gradient' ],
				'selector'  => '{{WRAPPER}} .elmpath-tab-panel > .tab-nav .tab-nav-item.active, 
					{{WRAPPER}} .elmpath-tab-panel > .tab-nav .tab-nav-item:hover',
				'condition' => [
					'style' => [ '1', '3' ],
				],
			]
		);

		$this->add_control(
			'primary_color',
			[
				'label'     => esc_html__( 'Primary Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-tab-panel > .tab-nav .tab-nav-item.active, 
					{{WRAPPER}} .elmpath-tab-panel > .tab-nav .tab-nav-item:hover' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'style' => [ '2', '4' ],
				],
			]
		);

		$this->add_control(
			'primary_border_color',
			[
				'label'     => esc_html__( 'Primary Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-tab-panel > .tab-nav .tab-nav-item.active, 
					{{WRAPPER}} .elmpath-tab-panel > .tab-nav .tab-nav-item:hover' => 'border-left-color: {{VALUE}};',
				],
				'condition' => [
					'style' => [ '5' ],
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_nav_style',
			[
				'label' => esc_html__( 'Nav', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'nav_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-tab-panel > .tab-nav .tab-nav-item' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'nav_active_color',
			[
				'label'     => esc_html__( 'Active Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-tab-panel > .tab-nav .tab-nav-item.active, 
					{{WRAPPER}} .elmpath-tab-panel > .tab-nav .tab-nav-item:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'typography_nav',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .elmpath-tab-panel > .tab-nav .tab-label',
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label'      => esc_html__( 'Icon Size', 'element-path' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 170,
						'step' => 1,
					]
				],
				'default'    => [
					'unit' => 'px',
					'size' => 42,
				],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-tab-panel > .tab-nav .tab-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'nav_padding',
			[
				'label'      => esc_html__( 'Padding', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-tab-panel > .tab-nav .tab-nav-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'nav_margin',
			[
				'label'      => esc_html__( 'Item Margin', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-tab-panel > .tab-nav .tab-nav-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_desc_style',
			[
				'label' => esc_html__( 'Description', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label'     => esc_html__( 'Description Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-tabs .tab-item-content, {{WRAPPER}} .elmpath-tabs .tab-item-content > *' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'typography_desc',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} .elmpath-tabs .tab-item-content, {{WRAPPER}} .elmpath-tabs .tab-item-content > *',
			]
		);

		$this->add_responsive_control(
			'desc_margin',
			[
				'label'      => esc_html__( 'Margin', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-tabs .tab-item-content, {{WRAPPER}} .elmpath-tabs .tab-item-content > *' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}
}
