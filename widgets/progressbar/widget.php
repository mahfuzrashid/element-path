<?php
/**
 * Widget: Button
 */

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Utils;

defined( 'ABSPATH' ) || die();

class ELMPATH_Progressbar extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-progressbar';
	}

	/**
	 * Get dependent stylesheet
	 */
	public function get_style_depends() {
		return [ 'elmpath-progressbar' ];
	}

	/**
	 * Get dependent scripts
	 */
	public function get_script_depends() {
		return [ 'jquery-appear', 'elmpath-progressbar' ];
	}

	/**
	 * Register content related controls
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'element-path' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'pb_label',
			[
				'label'     => esc_html__( 'Label', 'element-path' ),
				'type'      => Controls_Manager::TEXT,
				'condition' => [
					'style' => [ '1', '2' ]
				]
			]
		);

		$this->add_control(
			'start_label',
			[
				'label'     => esc_html__( 'Start Label', 'element-path' ),
				'type'      => Controls_Manager::TEXT,
				'condition' => [
					'style' => [ '3' ]
				]
			]
		);

		$this->add_control(
			'end_label',
			[
				'label'     => esc_html__( 'End Label', 'element-path' ),
				'type'      => Controls_Manager::TEXT,
				'condition' => [
					'style' => [ '3' ]
				]
			]
		);

		$this->add_control(
			'pb_value',
			[
				'label' => esc_html__( 'Percentage Value', 'element-path' ),
				'type'  => Controls_Manager::NUMBER,
			]
		);

		$this->add_control(
			'bar_img',
			[
				'label'     => esc_html__( 'Bar Image', 'element-path' ),
				'type'      => Controls_Manager::MEDIA,
				'default'   => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'style' => [ '3' ]
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'elmpath_btn_style_holder',
			[
				'label' => esc_html__( 'Global Style', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_common_controls();

		$this->add_responsive_control(
			'pb_margin',
			[
				'label'      => esc_html__( 'Margin', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-progress-bar' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'pb_height',
			[
				'label'      => esc_html__( 'Bar Height', 'element-path' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 150,
						'step' => 1,
					]
				],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-progress-bar' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'style' => [ '1', '2' ]
				]
			]
		);

		$this->add_responsive_control(
			'pb_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-progress-bar, {{WRAPPER}} .elmpath-progress-fill, {{WRAPPER}} .elmpath-progress-bar-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'label_typography',
				'label'    => esc_html__( 'Label Typography', 'element-path' ),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .elmpath-pb-label, {{WRAPPER}} .elmpath-pb-start-label, {{WRAPPER}} .elmpath-pb-end-label',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'percent_typography',
				'label'     => esc_html__( 'Percent Value Typography', 'element-path' ),
				'scheme'    => Scheme_Typography::TYPOGRAPHY_1,
				'selector'  => '{{WRAPPER}} .elmpath-pb-percent',
				'condition' => [
					'style' => [ '1', '2' ]
				]
			]
		);

		$this->add_responsive_control(
			'label_color',
			[
				'label'     => esc_html__( 'Label Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elmpath-progress-bar .elmpath-pb-label, 
					{{WRAPPER}} .elmpath-progress-bar-3 > span' => 'color: {{VALUE}}',
				],
			]

		);

		$this->add_responsive_control(
			'value_color',
			[
				'label'     => esc_html__( 'Value Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elmpath-progress-bar .elmpath-pb-percent'                               => 'color: {{VALUE}}',
					'{{WRAPPER}} .elmpath-progress-bar-3 .elmpath-pb-percent svg path, 
					{{WRAPPER}} .elmpath-progress-bar-3 .elmpath-pb-percent svg text' => 'fill: {{VALUE}}',
				],
			]

		);

		$this->add_responsive_control(
			'bar_color',
			[
				'label'     => esc_html__( 'Bar Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elmpath-progress-bar-1, 
					{{WRAPPER}} .elmpath-progress-bar-2, 
					{{WRAPPER}} .elmpath-progress-bar-3 .elmpath-progress-bar-inner' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'fill_color',
			[
				'label'     => esc_html__( 'Fill Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elmpath-progress-bar-1 .elmpath-progress-fill, 
					{{WRAPPER}} .elmpath-progress-bar-3 .elmpath-progress-fill' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'style' => [ '1', '3' ]
				]
			]

		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'fill_gradient',
				'label'     => esc_html__( 'Fill Color', 'element-path' ),
				'types'     => [ 'gradient' ],
				'selector'  => '{{WRAPPER}} .elmpath-progress-bar-2 .elmpath-progress-fill',
				'exclude'   => [
					'image'
				],
				'condition' => [
					'style' => [ '2' ]
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'indicator_color',
				'label' => esc_html__( 'Indicator Color', 'element-path' ),
				'types' => [ 'classic', 'gradient' ],
				'exclude'    => [
					'image'
				],
				'condition'  => [
					'style' => [ '3' ]
				],
				'selector'   => '{{WRAPPER}} .elmpath-progress-bar-3 .elmpath-pb-indicator',
			]
		);

		$this->end_controls_section();

	}

}
