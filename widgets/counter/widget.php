<?php
/**
 * Widget: Counter
 */

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;

defined( 'ABSPATH' ) || die();

class ELMPATH_Counter extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-counter';
	}

	/**
	 * Get dependent stylesheet
	 */
	public function get_style_depends() {
		return [ 'elmpath-counter' ];
	}

	/**
	 * Get dependent scripts
	 */
	public function get_script_depends() {
		return [ 'counter-up', 'elmpath-counter'];
	}

	/**
	 * Register content related controls
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Icon', 'element-path' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'choose_media',
			[
				'label'   => esc_html__( 'Select Type', 'element-path' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'choose_icon',
				'options' => [
					'choose_icon'  => esc_html__( 'Icon', 'element-path' ),
					'choose_image' => esc_html__( 'Image', 'element-path' ),
				],
			]
		);

		$this->add_control(
			'_image',
			[
				'label'     => esc_html__( 'Choose Image', 'element-path' ),
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'default'   => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'choose_media' => 'choose_image',
				],
			]
		);

		$this->add_control(
			'_icon',
			[
				'label'            => esc_html__( 'Choose Icon', 'element-path' ),
				'type'             => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'condition'        => [
					'choose_media' => 'choose_icon',
				],
			]
		);

		$this->add_control(
			'_number',
			[
				'label' => esc_html__( 'Number', 'element-path' ),
				'type'  => Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'element-path' ),
				'type'  => Controls_Manager::TEXT,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_infobox_style',
			[
				'label' => esc_html__( 'Global Style', 'element-path' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_common_controls();

		$this->add_control(
			'bg2_color',
			[
				'label'     => esc_html__( 'Background Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-counter-2' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'style' => [ '2' ],
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
				'condition' => [
					'style' => [ '3', '4', '5' ],
				],
			]
		);

		$this->add_control(
			'secondary_color',
			[
				'label'     => esc_html__( 'Secondary Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'condition' => [
					'style' => [ '3', '5' ],
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'img_width',
			[
				'label'      => esc_html__( 'Image Width', 'element-path' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 300,
						'step' => 1,
					],
					'%'  => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 42,
				],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-counter .counter-icon img' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'choose_media' => 'choose_image',
				],
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
					'{{WRAPPER}} .elmpath-counter .counter-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'choose_media' => 'choose_icon',
				],
			]
		);

		$this->add_responsive_control(
			'icon_bg_size',
			[
				'label'      => esc_html__( 'Icon Background Size', 'element-path' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 300,
						'step' => 1,
					]
				],
				'default'    => [
					'unit' => 'px',
					'size' => 80,
				],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-counter .counter-icon i' => 'width: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'choose_media' => 'choose_icon',
				],
			]
		);

		$this->add_responsive_control(
			'icon_margin',
			[
				'label'      => esc_html__( 'Margin', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-counter .counter-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-counter .counter-icon i' => 'color: {{VALUE}};',
				],
				'condition'  => [
					'choose_media' => 'choose_icon',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_number_style',
			[
				'label' => esc_html__( 'Number', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'number_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-counter .counter-number' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'typography_number',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} .elmpath-counter .counter-number',
			]
		);

		$this->add_responsive_control(
			'number_margin',
			[
				'label'      => esc_html__( 'Margin', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-counter .counter-number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-counter .counter-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'typography_title',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .elmpath-counter .counter-title',
			]
		);

		$this->add_responsive_control(
			'title_margin',
			[
				'label'      => esc_html__( 'Margin', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-counter .counter-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

}
