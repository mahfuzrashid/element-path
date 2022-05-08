<?php
/**
 * Widget: ELMPATH_Mailchimp
 */

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

defined( 'ABSPATH' ) || die();

class ELMPATH_Mailchimp extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-mailchimp';
	}

	/**
	 * Get dependent stylesheet
	 */
	public function get_style_depends() {
		return [ 'elmpath-mailchimp' ];
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
			'form_id',
			[
				'label'   => esc_html__( 'Select Form', 'element-path' ),
				'type'    => Controls_Manager::SELECT,
				'options' => $this->elmpath_get_post_type( 'mc4wp-form' ),
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'elmpath_cf_wrapper',
			[
				'label' => esc_html__( 'Wrapper', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_wrapper_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-mailchimp-form' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_wrapper_border_padding',
			[
				'label'      => esc_html__( 'Padding', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-mailchimp-form' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_wrapper_style_margin',
			[
				'label'      => esc_html__( 'Margin', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-mailchimp-form' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'elmpath_cf_wrapper_background',
				'label'    => esc_html__( 'Background', 'element-path' ),
				'types'    => [ 'classic', 'gradient', ],
				'selector' => '{{WRAPPER}} .elmpath-mailchimp-form',
				'exclude'  => [
					'image'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'elmpath_cf_wrapper_box_shadow',
				'label'    => esc_html__( 'Box Shadow', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-mailchimp-form',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'elmpath_cf_wrapper_border',
				'label'    => esc_html__( 'Border', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-mailchimp-form',
			]
		);

		$this->end_controls_section();


		// label
		$this->start_controls_section(
			'elmpath_cf_input_label_style',
			[
				'label' => esc_html__( 'Label', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'elmpath_cf_input_label_typography',
				'label'    => esc_html__( 'Typography', 'element-path' ),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields label',
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_input_label_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields label' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_input_label_margin',
			[
				'label'      => esc_html__( 'Margin', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'elmpath_cf_input_label_hint_heading',
			[
				'label'     => esc_html__( 'Hint', 'element-path' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'elmpath_cf_input_label_hint_typography',
				'label'    => esc_html__( 'Typography', 'element-path' ),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-error p',
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_input_label_hint_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#777777',
				'selectors' => [
					'{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-error p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_input_agree_terms_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#777777',
				'selectors' => [
					'{{WRAPPER}} .elmpath-mailchimp-form [name="AGREE_TO_TERMS"] ~ a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		// input style
		$this->start_controls_section(
			'elmpath_cf_input_style',
			[
				'label' => esc_html__( 'Input', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_input_style_padding',
			[
				'label'      => esc_html__( 'Padding', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields input:not([type="button"]):not([type="submit"]):not([type="checkbox"]):not([type="radio"]), {{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields select' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_input_style_width',
			[
				'label'      => esc_html__( 'Width', 'element-path' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 5,
					],
					'%'  => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields input:not([type="button"]):not([type="submit"]):not([type="checkbox"]):not([type="radio"]), {{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields select' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_input_style_height',
			[
				'label'      => esc_html__( 'Height', 'element-path' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 200,
						'step' => 1,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields input:not([type="button"]):not([type="submit"]):not([type="checkbox"]):not([type="radio"]), {{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields select' => 'height: {{SIZE}}px;',
				],
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_input_style_margin_bottom',
			[
				'label'      => esc_html__( 'Margin Bottom', 'element-path' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields input:not([type="checkbox"]):not([type="radio"]):not([type="button"]):not([type="submit"]), {{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields select' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs(
			'elmpath_cf_input_normal_and_hover_tabs'
		);
		$this->start_controls_tab(
			'elmpath_cf_input_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'element-path' ),
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'elmpath_cf_input_style_background',
				'label'    => esc_html__( 'Background', 'element-path' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields input:not([type="button"]):not([type="submit"]), {{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields select',
				'exclude'  => [
					'image'
				]
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_input_style_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields input:not([type="button"]):not([type="submit"]), {{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields select' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'elmpath_cf_input_style_border',
				'label'    => esc_html__( 'Border', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields input:not([type="button"]):not([type="submit"]), {{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields select',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'elmpath_cf_input_style_box_shadow',
				'label'    => esc_html__( 'Box Shadow', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields input:not([type="checkbox"]):not([type="radio"]):not([type="button"]):not([type="submit"]), {{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields select'
			]
		);

		$this->end_controls_tab();
		$this->start_controls_tab(
			'elmpath_cf_input_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'element-path' ),
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'elmpath_cf_input_hover_style_background',
				'label'    => esc_html__( 'Background', 'element-path' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields input:not([type="button"]):not([type="submit"]):hover, {{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields select:hover',
				'exclude'  => [
					'image'
				]
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_input_hover_style_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields input:not([type="button"]):not([type="submit"]):hover, {{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields select:hover'                                                                                                                                                           => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'elmpath_cf_input_hover_style_border',
				'label'    => esc_html__( 'Border', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields input:not([type="button"]):not([type="submit"]):hover, {{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields select:hover',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'elmpath_cf_input_hover_style_box_shadow',
				'label'    => esc_html__( 'Box Shadow', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields input:not([type="button"]):not([type="submit"]):hover, {{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields select:hover'
			]
		);

		$this->end_controls_tab();
		$this->start_controls_tab(
			'elmpath_cf_input_focus_tab',
			[
				'label' => esc_html__( 'Focus', 'element-path' ),
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'elmpath_cf_input_focus_style_background',
				'label'    => esc_html__( 'Background', 'element-path' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields input:not([type="button"]):not([type="submit"]):focus, {{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields select:focus',
				'exclude'  => [
					'image'
				]
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_input_focus_style_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields input:not([type="button"]):not([type="submit"]):focus, {{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields select:focus'                                                                                                                                                           => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'elmpath_cf_input_focus_style_border',
				'label'    => esc_html__( 'Border', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields input:not([type="button"]):not([type="submit"]):focus, {{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields select:focus',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'elmpath_cf_input_focus_style_box_shadow',
				'label'    => esc_html__( 'Box Shadow', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields input:not([type="button"]):not([type="checkbox"]):not([type="radio"]):not([type="submit"]):focus, {{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields select:focus'
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'elmpath_cf_input_style_typography_heading',
			[
				'label'     => esc_html__( 'Typography', 'element-path' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'elmpath_cf_input_typography',
				'label'    => esc_html__( 'Typography', 'element-path' ),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields input:not([type="button"]):not([type="submit"]), {{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields select',
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_input_style_font_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields input:not([type="button"]):not([type="submit"]), {{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields select' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'elmpath_cf_input_style_placeholder_heading',
			[
				'label'     => esc_html__( 'Placeholder', 'element-path' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_input_style_placeholder_font_size',
			[
				'label'      => esc_html__( 'Font Size', 'element-path' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 14,
				],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields select::-webkit-input-placeholder' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields select::-moz-placeholder'          => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields select:-ms-input-placeholder'      => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields select:-moz-placeholder'           => 'font-size: {{SIZE}}{{UNIT}};',

					'{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields input:not([type="button"]):not([type="submit"])::-webkit-input-placeholder' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields input:not([type="button"]):not([type="submit"])::-moz-placeholder'          => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields input:not([type="button"]):not([type="submit"]):-ms-input-placeholder'      => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields input:not([type="button"]):not([type="submit"]):-moz-placeholder'           => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'elmpath_cf_input_placeholder_font_color',
			[
				'label'     => esc_html__( 'Placeholder Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields select::-webkit-input-placeholder' => 'color: {{VALUE}}',
					'{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields select::-moz-placeholder'          => 'color: {{VALUE}}',
					'{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields select:-ms-input-placeholder'      => 'color: {{VALUE}}',
					'{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields select:-moz-placeholder'           => 'color: {{VALUE}}',

					'{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields input:not([type="button"]):not([type="submit"])::-webkit-input-placeholder' => 'color: {{VALUE}}',
					'{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields input:not([type="button"]):not([type="submit"])::-moz-placeholder'          => 'color: {{VALUE}}',
					'{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields input:not([type="button"]):not([type="submit"]):-ms-input-placeholder'      => 'color: {{VALUE}}',
					'{{WRAPPER}} .elmpath-mailchimp-form .mc4wp-form-fields input:not([type="button"]):not([type="submit"]):-moz-placeholder'           => 'color: {{VALUE}}',
				],
			]
		);


		$this->end_controls_section();


		$this->start_controls_section(
			'elmpath_cf_button_style_holder',
			[
				'label' => esc_html__( 'Button', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'elmpath_cf_button_typography',
				'label'    => esc_html__( 'Typography', 'element-path' ),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .elmpath-mailchimp-form [type="submit"], {{WRAPPER}} .elmpath-mailchimp-form button',
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_button_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-mailchimp-form [type="submit"], {{WRAPPER}} .elmpath-mailchimp-form button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_button_border_padding',
			[
				'label'      => esc_html__( 'Padding', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-mailchimp-form [type="submit"], {{WRAPPER}} .elmpath-mailchimp-form button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_button_style_margin',
			[
				'label'      => esc_html__( 'Margin', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-mailchimp-form [type="submit"], {{WRAPPER}} .elmpath-mailchimp-form button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_control(
			'elmpath_cf_button_style_use_width_height',
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
			'elmpath_cf_button_width',
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
					'{{WRAPPER}} .elmpath-mailchimp-form [type="submit"], {{WRAPPER}} .elmpath-mailchimp-form button' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'elmpath_cf_button_style_use_width_height' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_button_style_height',
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
					'{{WRAPPER}} .elmpath-mailchimp-form [type="submit"], {{WRAPPER}} .elmpath-mailchimp-form button' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'elmpath_cf_button_style_use_width_height' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_button_style_line_height',
			[
				'label'      => esc_html__( 'Line Height', 'element-path' ),
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
					'{{WRAPPER}} .elmpath-mailchimp-form [type="submit"], {{WRAPPER}} .elmpath-mailchimp-form button' => 'line-height: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'elmpath_cf_button_style_use_width_height' => 'yes'
				]
			]
		);

		$this->start_controls_tabs(
			'elmpath_cf_button_normal_and_hover_tabs'
		);
		$this->start_controls_tab(
			'elmpath_cf_button_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'element-path' ),
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_button_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .elmpath-mailchimp-form [type="submit"], {{WRAPPER}} .elmpath-mailchimp-form button' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'elmpath_cf_button_background',
				'label'    => esc_html__( 'Background', 'element-path' ),
				'types'    => [ 'classic', 'gradient', ],
				'selector' => '{{WRAPPER}} .elmpath-mailchimp-form [type="submit"], {{WRAPPER}} .elmpath-mailchimp-form button',
				'exclude'  => [
					'image'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'elmpath_cf_button_box_shadow',
				'label'    => esc_html__( 'Box Shadow', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-mailchimp-form [type="submit"], {{WRAPPER}} .elmpath-mailchimp-form button',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'elmpath_cf_button_border',
				'label'    => esc_html__( 'Border', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-mailchimp-form [type="submit"], {{WRAPPER}} .elmpath-mailchimp-form button',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'elmpath_cf_button_title_shadow',
				'selector' => '{{WRAPPER}} .elmpath-mailchimp-form [type="submit"], {{WRAPPER}} .elmpath-mailchimp-form button',
			]
		);

		$this->end_controls_tab();
		$this->start_controls_tab(
			'elmpath_cf_button_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'element-path' ),
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_button_color_hover',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .elmpath-mailchimp-form [type="submit"]:hover, {{WRAPPER}} .elmpath-mailchimp-form button:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'elmpath_cf_button_hover_background',
				'label'    => esc_html__( 'Background', 'element-path' ),
				'types'    => [ 'classic', 'gradient', ],
				'selector' => '{{WRAPPER}} .elmpath-mailchimp-form [type="submit"]:hover, {{WRAPPER}} .elmpath-mailchimp-form button:hover',
				'exclude'  => [
					'image'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'elmpath_cf_button_box_shadow_hover',
				'label'    => esc_html__( 'Box Shadow', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-mailchimp-form [type="submit"]:hover, {{WRAPPER}} .elmpath-mailchimp-form button:hover',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'elmpath_cf_button_border_hover',
				'label'    => esc_html__( 'Border', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-mailchimp-form [type="submit"]:hover, {{WRAPPER}} .elmpath-mailchimp-form button:hover',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'elmpath_cf_button_title_shadow_hover',
				'selector' => '{{WRAPPER}} .elmpath-mailchimp-form [type="submit"]:hover, {{WRAPPER}} .elmpath-mailchimp-form button:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();


	}

}
