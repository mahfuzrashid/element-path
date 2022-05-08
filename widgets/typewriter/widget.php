<?php
/**
 * Widget: Typewriter
 */

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;

defined( 'ABSPATH' ) || die();

class ELMPATH_Typewriter extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-typewriter';
	}

	/**
	 * Get dependent stylesheet
	 */
	public function get_style_depends() {
		return [ 'elmpath-typewriter' ];
	}

	/**
	 * Get dependent scripts
	 */
	public function get_script_depends() {
		return [ 'elmpath-typewriter' ];
	}

	/**
	 * Register content related controls
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'element-path' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'before_text',
			[
				'label' => esc_html__( 'Before Text', 'element-path' ),
				'type'  => \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		$this->add_control(
			'after_text',
			[
				'label' => esc_html__( 'After Text', 'element-path' ),
				'type'  => \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'anim_text', [
				'label'       => esc_html__( 'Title', 'element-path' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$repeater->add_control(
			'anim_text_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
			]
		);

		$this->add_control(
			'typewriter',
			[
				'label'       => esc_html__( 'Content', 'element-path' ),
				'show_label'  => false,
				'type'        => Controls_Manager::REPEATER,
				'title_field' => '{{ anim_text }}',
				'dynamic'     => [
					'active' => true,
				],
				'default'     => [
					[
						'anim_text'   => esc_html__( 'New Market Expansion', 'element-path' ),
					],
					[
						'anim_text'   => esc_html__( 'Data and Strategy', 'element-path' ),
					],
					[
						'anim_text'   => esc_html__( 'Corporate Development', 'element-path' ),
					],
				],
				'fields'      => $repeater->get_controls(),
			]
		);

		$this->end_controls_section(); // Emd Content Section

		$this->start_controls_section(
			'section_typewriter_style',
			[
				'label' => esc_html__( 'Typewriter', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'effects',
			[
				'label' => esc_html__('Animation Effects', 'element-path' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'clip',
				'options' => [
					'clip'  => esc_html__('Clip Words', 'element-path' ),
					'rotate-1'  => esc_html__('Rotate', 'element-path' ),
					'loading-bar' => esc_html__('Loading Bar', 'element-path' ),
					'slide' => esc_html__('Slide Top', 'element-path' ),
					'zoom' => esc_html__('Zoom', 'element-path' ),
					'push' => esc_html__('Push', 'element-path' ),
				],
			]
		);

		$this->add_control(
			'display_before_after',
			[
				'label' => esc_html__('Before/After Text', 'element-path' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default'  => esc_html__('Default', 'element-path' ),
					'before'  => esc_html__('Before Block', 'element-path' ),
					'after' => esc_html__('After Block', 'element-path' ),
					'before-after' => esc_html__('Before/After Block', 'element-path' ),
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Title Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-typewriter' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'typography_size',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .elmpath-typewriter',
			]
		);

		$this->add_responsive_control(
			'margin',
			[
				'label'      => __( 'Margin', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-typewriter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}
}
