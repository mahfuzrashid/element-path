<?php
/**
 * Widget: Progress Pie
 */

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Utils;

defined( 'ABSPATH' ) || die();

class ELMPATH_Progresspie extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-progresspie';
	}

	/**
	 * Get dependent stylesheet
	 */
	public function get_style_depends() {
		return [ 'elmpath-progresspie' ];
	}

	/**
	 * Get dependent scripts
	 */
	public function get_script_depends() {
		return [ 'jquery-appear', 'asPieProgress', 'elmpath-progresspie' ];
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
			'_label',
			[
				'label' => esc_html__( 'Label', 'element-path' ),
				'type'  => Controls_Manager::TEXT,
			]
		);

		$this->add_responsive_control(
			'_value',
			[
				'label' => esc_html__( 'Percentage', 'element-path' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min'  => 1,
						'max'  => 100,
						'step' => 1,
					]
				],
			]
		);

		$this->add_control(
			'speed',
			[
				'label'       => esc_html__( 'Speed (ms)', 'element-path' ),
				'placeholder' => esc_html__( '30', 'element-path' ),
				'type'        => Controls_Manager::NUMBER,
			]
		);

		$this->add_control(
			'delay',
			[
				'label'       => esc_html__( 'Delay (ms)', 'element-path' ),
				'placeholder' => esc_html__( '1000', 'element-path' ),
				'type'        => Controls_Manager::NUMBER,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'elmpath_global_style',
			[
				'label' => esc_html__( 'Global Style', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'label_typo',
				'label'    => esc_html__( 'Label Typography', 'element-path' ),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .elmpath-progress-pie .elmpath-progress-pie-label',
			]
		);

		$this->add_control(
			'label_color',
			[
				'label'     => esc_html__( 'Label Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elmpath-progress-pie .elmpath-progress-pie-label' => 'color: {{VALUE}}',
				],
			]

		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'value_typo',
				'label'    => esc_html__( 'Value Typography', 'element-path' ),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .elmpath-progress-pie .elmpath-progress-pie-number',
			]
		);

		$this->add_control(
			'value_color',
			[
				'label'     => esc_html__( 'Value Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elmpath-progress-pie .elmpath-progress-pie-number' => 'color: {{VALUE}}',
				],
			]

		);

		$this->add_control(
			'bar_color',
			[
				'label'     => esc_html__( 'Bar Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
			]
		);

		$this->add_control(
			'fill_color',
			[
				'label'     => esc_html__( 'Fill Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
			]

		);

		$this->add_control(
			'track_color',
			[
				'label'     => esc_html__( 'Track Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
			]

		);

		$this->add_control(
			'bar_size',
			[
				'label' => esc_html__( 'Bar Size', 'element-path' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min'  => 1,
						'max'  => 50,
						'step' => 1,
					]
				],
			]
		);

		$this->end_controls_section();

	}

}
