<?php
/**
 * Widget: Button
 */

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Utils;

defined( 'ABSPATH' ) || die();

class ELMPATH_Button extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-button';
	}

	/**
	 * Get dependent stylesheet
	 */
	public function get_style_depends() {
		return [ 'elmpath-button' ];
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
			'btn_text',
			[
				'label'       => esc_html__( 'Button Text', 'element-path' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'btn_url',
			[
				'label'         => esc_html__( 'Button URL', 'element-path' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => esc_html__( 'https://your-link.com', 'element-path' ),
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'elmpath_btn_style_holder',
			[
				'label' => esc_html__( 'Button', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'elmpath_btn_typography',
				'label'    => esc_html__( 'Typography', 'element-path' ),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .elmpath-btn',
			]
		);

		$this->add_responsive_control(
			'elmpath_btn_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'elmpath_btn_border_padding',
			[
				'label'      => esc_html__( 'Padding', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'elmpath_btn_style_margin',
			[
				'label'      => esc_html__( 'Margin', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_control(
			'elmpath_btn_style_use_width_height',
			[
				'label'        => esc_html__( 'Use Height Width', 'element-path' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'element-path' ),
				'label_off'    => esc_html__( 'Hide', 'element-path' ),
				'return_value' => 'yes',
				'default'      => 'no',
			]
		);

		$this->add_responsive_control(
			'elmpath_btn_width',
			[
				'label'      => esc_html__( 'Width', 'element-path' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 50,
						'max'  => 200,
						'step' => 1,
					],
					'%'  => [
						'min' => 10,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-btn' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'elmpath_btn_style_use_width_height' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'elmpath_btn_style_height',
			[
				'label'      => esc_html__( 'Height', 'element-path' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 50,
						'max'  => 200,
						'step' => 1,
					],
					'%'  => [
						'min' => 10,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-btn' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'elmpath_btn_style_use_width_height' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'elmpath_btn_style_line_height',
			[
				'label'      => esc_html__( 'Line Height', 'element-path' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 10,
						'max'  => 200,
						'step' => 1,
					],
					'%'  => [
						'min' => 10,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-btn' => 'line-height: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'elmpath_btn_style_use_width_height' => 'yes'
				]
			]
		);

		$this->start_controls_tabs(
			'elmpath_btn_normal_and_hover_tabs'
		);
		$this->start_controls_tab(
			'elmpath_btn_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'element-path' ),
			]
		);

		$this->add_responsive_control(
			'elmpath_btn_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .elmpath-btn' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'elmpath_btn_background',
				'label'    => esc_html__( 'Background', 'element-path' ),
				'types'    => [ 'classic', 'gradient', ],
				'selector' => '{{WRAPPER}} .elmpath-btn',
				'exclude'  => [
					'image'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'elmpath_btn_box_shadow',
				'label'    => esc_html__( 'Box Shadow', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-btn',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'elmpath_btn_border',
				'label'    => esc_html__( 'Border', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-btn',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'elmpath_btn_text_shadow',
				'selector' => '{{WRAPPER}} .elmpath-btn',
			]
		);

		$this->end_controls_tab();
		$this->start_controls_tab(
			'elmpath_btn_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'element-path' ),
			]
		);

		$this->add_responsive_control(
			'elmpath_btn_color_hover',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .elmpath-btn:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'elmpath_btn_hover_background',
				'label'    => esc_html__( 'Background', 'element-path' ),
				'types'    => [ 'classic', 'gradient', ],
				'selector' => '{{WRAPPER}} .elmpath-btn:hover',
				'exclude'  => [
					'image'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'elmpath_btn_box_shadow_hover',
				'label'    => esc_html__( 'Box Shadow', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-btn:hover',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'elmpath_btn_border_hover',
				'label'    => esc_html__( 'Border', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-btn:hover',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'elmpath_btn_text_shadow_hover',
				'selector' => '{{WRAPPER}} .elmpath-btn:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

}
