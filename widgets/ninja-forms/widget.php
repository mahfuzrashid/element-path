<?php
/**
 * Widget: ELMPATH_Ninja_Forms
 */

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

defined( 'ABSPATH' ) || die();

class ELMPATH_Ninja_Forms extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-ninja-forms';
	}

	/**
	 * Get dependent stylesheet
	 */
	public function get_style_depends() {
		return [ 'elmpath-ninja-forms' ];
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
				'options' => $this->elmpath_get_ninja_forms_data(),
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
					'{{WRAPPER}} .elmpath-ninja-forms' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .elmpath-ninja-forms' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .elmpath-ninja-forms' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'elmpath_cf_wrapper_background',
				'label'    => esc_html__( 'Background', 'element-path' ),
				'types'    => [ 'classic', 'gradient', ],
				'selector' => '{{WRAPPER}} .elmpath-ninja-forms',
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
				'selector' => '{{WRAPPER}} .elmpath-ninja-forms',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'elmpath_cf_wrapper_border',
				'label'    => esc_html__( 'Border', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-ninja-forms',
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
				'selector' => '{{WRAPPER}} .elmpath-ninja-forms .nf-form-wrap .nf-field-label label',
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_input_label_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} .elmpath-ninja-forms .nf-form-wrap .nf-field-label label' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .elmpath-ninja-forms .nf-form-wrap .nf-field-label label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .elmpath-ninja-forms .nf-form-wrap .nf-error-msg',
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_input_label_hint_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#777777',
				'selectors' => [
					'{{WRAPPER}} .elmpath-ninja-forms .nf-form-wrap .nf-error-msg' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .elmpath-ninja-forms .nf-form-wrap input:not([type="button"]):not([type="submit"]):not([type="checkbox"]):not([type="radio"]), {{WRAPPER}} .elmpath-ninja-forms .nf-form-content .listselect-wrap .nf-field-element div, {{WRAPPER}} .elmpath-ninja-forms .nf-form-content .list-select-wrap>div select, {{WRAPPER}} .elmpath-ninja-forms .nf-form-content textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .elmpath-ninja-forms' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .elmpath-ninja-forms input:not([type="button"]):not([type="submit"]):not([type="checkbox"]):not([type="radio"]), {{WRAPPER}} .elmpath-ninja-forms .nf-form-content .listselect-wrap .nf-field-element div, {{WRAPPER}} .elmpath-ninja-forms .nf-form-content select.ninja-forms-field:not([multiple])' => 'height: {{SIZE}}px;',
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
					'{{WRAPPER}} .elmpath-ninja-forms .nf-field-container:not(.submit-container)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'elmpath_cf_input_style_textarea_heading',
			[
				'label'     => esc_html__( 'Textarea', 'element-path' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_input_style_textarea_height',
			[
				'label'      => esc_html__( 'Height', 'element-path' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 100,
						'max'  => 500,
						'step' => 1,
					],
					'%'  => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 100,
				],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-ninja-forms textarea' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'elmpath_cf_input_style_padding_textarea_hr',
			[
				'type' => Controls_Manager::DIVIDER,
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
				'selector' => '{{WRAPPER}} .elmpath-ninja-forms input:not([type="button"]):not([type="submit"]):not([type="checkbox"]):not([type="radio"]), {{WRAPPER}} .elmpath-ninja-forms .nf-form-content .listselect-wrap select, {{WRAPPER}} .elmpath-ninja-forms textarea',
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
					'{{WRAPPER}} .elmpath-ninja-forms input:not([type="button"]):not([type="submit"]):not([type="checkbox"]):not([type="radio"]), {{WRAPPER}} .elmpath-ninja-forms .nf-form-content .listselect-wrap select, {{WRAPPER}} .elmpath-ninja-forms textarea' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'elmpath_cf_input_style_border',
				'label'    => esc_html__( 'Border', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-ninja-forms input:not([type="button"]):not([type="submit"]):not([type="checkbox"]):not([type="radio"]), {{WRAPPER}} .elmpath-ninja-forms .nf-form-content .listselect-wrap select, {{WRAPPER}} .elmpath-ninja-forms textarea',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'elmpath_cf_input_style_box_shadow',
				'label'    => esc_html__( 'Box Shadow', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-ninja-forms input:not([type="button"]):not([type="submit"]):not([type="checkbox"]):not([type="radio"]), {{WRAPPER}} .elmpath-ninja-forms .nf-form-content .listselect-wrap select, {{WRAPPER}} .elmpath-ninja-forms textarea'
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
				'selector' => '{{WRAPPER}} .elmpath-ninja-forms input:not([type="button"]):not([type="submit"]):not([type="checkbox"]):not([type="radio"]):hover, {{WRAPPER}} .elmpath-ninja-forms .nf-form-content .listselect-wrap select:hover, {{WRAPPER}} .elmpath-ninja-forms textarea:hover',
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
					'{{WRAPPER}} .elmpath-ninja-forms input:not([type="button"]):not([type="submit"]):not([type="checkbox"]):not([type="radio"]):hover, {{WRAPPER}} .elmpath-ninja-forms .nf-form-content .listselect-wrap select:hover, {{WRAPPER}} .elmpath-ninja-forms textarea:hover'                                                                                                                                                           => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'elmpath_cf_input_hover_style_border',
				'label'    => esc_html__( 'Border', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-ninja-forms input:not([type="button"]):not([type="submit"]):not([type="checkbox"]):not([type="radio"]):hover, {{WRAPPER}} .elmpath-ninja-forms .nf-form-content .listselect-wrap select:hover, {{WRAPPER}} .elmpath-ninja-forms textarea:hover',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'elmpath_cf_input_hover_style_box_shadow',
				'label'    => esc_html__( 'Box Shadow', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-ninja-forms input:not([type="button"]):not([type="submit"]):not([type="checkbox"]):not([type="radio"]):hover, {{WRAPPER}} .elmpath-ninja-forms .nf-form-content .listselect-wrap select:hover, {{WRAPPER}} .elmpath-ninja-forms textarea:hover'
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
				'selector' => '{{WRAPPER}} .elmpath-ninja-forms input:not([type="button"]):not([type="submit"]):not([type="checkbox"]):not([type="radio"]):focus, {{WRAPPER}} .elmpath-ninja-forms .nf-form-content .listselect-wrap select:focus, {{WRAPPER}} .elmpath-ninja-forms textarea:focus',
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
					'{{WRAPPER}} .elmpath-ninja-forms input:not([type="button"]):not([type="submit"]):not([type="checkbox"]):not([type="radio"]):focus, {{WRAPPER}} .elmpath-ninja-forms .nf-form-content .listselect-wrap select:focus, {{WRAPPER}} .elmpath-ninja-forms textarea:focus'                                                                                                                                                           => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'elmpath_cf_input_focus_style_border',
				'label'    => esc_html__( 'Border', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-ninja-forms input:not([type="button"]):not([type="submit"]):not([type="checkbox"]):not([type="radio"]):focus, {{WRAPPER}} .elmpath-ninja-forms .nf-form-content .listselect-wrap select:focus, {{WRAPPER}} .elmpath-ninja-forms textarea:focus',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'elmpath_cf_input_focus_style_box_shadow',
				'label'    => esc_html__( 'Box Shadow', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-ninja-forms input:not([type="button"]):not([type="submit"]):not([type="checkbox"]):not([type="radio"]):focus, {{WRAPPER}} .elmpath-ninja-forms .nf-form-content .listselect-wrap select:focus, {{WRAPPER}} .elmpath-ninja-forms textarea:focus'
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
				'selector' => '{{WRAPPER}} .elmpath-ninja-forms input:not([type="button"]):not([type="submit"]):not([type="checkbox"]):not([type="radio"]), {{WRAPPER}} .elmpath-ninja-forms .nf-form-content .listselect-wrap select, {{WRAPPER}} .elmpath-ninja-forms textarea',
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_input_style_font_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} .elmpath-ninja-forms input:not([type="button"]):not([type="submit"]):not([type="checkbox"]):not([type="radio"]), {{WRAPPER}} .elmpath-ninja-forms .nf-form-content .listselect-wrap select, {{WRAPPER}} .elmpath-ninja-forms textarea' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .elmpath-ninja-forms input:not([type="button"]):not([type="checkbox"]):not([type="radio"])::-webkit-input-placeholder' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elmpath-ninja-forms input:not([type="button"]):not([type="checkbox"]):not([type="radio"])::-moz-placeholder'          => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elmpath-ninja-forms input:not([type="button"]):not([type="checkbox"]):not([type="radio"]):-ms-input-placeholder'      => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elmpath-ninja-forms input:not([type="button"]):not([type="checkbox"]):not([type="radio"]):-moz-placeholder'           => 'font-size: {{SIZE}}{{UNIT}};',

					'{{WRAPPER}} .elmpath-ninja-forms textarea::-webkit-input-placeholder' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elmpath-ninja-forms textarea::-moz-placeholder'          => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elmpath-ninja-forms textarea:-ms-input-placeholder'      => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elmpath-ninja-forms textarea:-moz-placeholder'           => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .elmpath-ninja-forms input:not([type="button"]):not([type="checkbox"]):not([type="radio"])::-webkit-input-placeholder' => 'color: {{VALUE}}',
					'{{WRAPPER}} .elmpath-ninja-forms input:not([type="button"]):not([type="checkbox"]):not([type="radio"])::-moz-placeholder'          => 'color: {{VALUE}}',
					'{{WRAPPER}} .elmpath-ninja-forms input:not([type="button"]):not([type="checkbox"]):not([type="radio"]):-ms-input-placeholder'      => 'color: {{VALUE}}',
					'{{WRAPPER}} .elmpath-ninja-forms input:not([type="button"]):not([type="checkbox"]):not([type="radio"]):-moz-placeholder'           => 'color: {{VALUE}}',

					'{{WRAPPER}} .elmpath-ninja-forms textarea::-webkit-input-placeholder' => 'color: {{VALUE}}',
					'{{WRAPPER}} .elmpath-ninja-forms textarea::-moz-placeholder'          => 'color: {{VALUE}}',
					'{{WRAPPER}} .elmpath-ninja-forms textarea:-ms-input-placeholder'      => 'color: {{VALUE}}',
					'{{WRAPPER}} .elmpath-ninja-forms textarea:-moz-placeholder'           => 'color: {{VALUE}}',
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

		$this->add_responsive_control(
			'elmpath_cf_button_alignment',
			[
				'label'     => esc_html__( 'Alignment', 'element-path' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => esc_html__( 'Left', 'element-path' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'element-path' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'  => [
						'title' => esc_html__( 'Right', 'element-path' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'default'   => 'left',
				'selectors' => [
					'{{WRAPPER}} .elmpath-ninja-forms .submit-container' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'elmpath_cf_button_typography',
				'label'    => esc_html__( 'Typography', 'element-path' ),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .elmpath-ninja-forms .submit-container input[type="button"]',
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_button_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-ninja-forms .submit-container input[type="button"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .elmpath-ninja-forms .submit-container input[type="button"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .elmpath-ninja-forms .submit-container input[type="button"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .elmpath-ninja-forms .submit-container input[type="button"]' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .elmpath-ninja-forms .submit-container input[type="button"]' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .elmpath-ninja-forms .submit-container input[type="button"]' => 'line-height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .elmpath-ninja-forms .submit-container input[type="button"]' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'elmpath_cf_button_background',
				'label'    => esc_html__( 'Background', 'element-path' ),
				'types'    => [ 'classic', 'gradient', ],
				'selector' => '{{WRAPPER}} .elmpath-ninja-forms .submit-container input[type="button"]',
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
				'selector' => '{{WRAPPER}} .elmpath-ninja-forms .submit-container input[type="button"]',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'elmpath_cf_button_border',
				'label'    => esc_html__( 'Border', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-ninja-forms .submit-container input[type="button"]',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'elmpath_cf_button_title_shadow',
				'selector' => '{{WRAPPER}} .elmpath-ninja-forms .submit-container input[type="button"]',
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
					'{{WRAPPER}} .elmpath-ninja-forms .submit-container input[type="button"]:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'elmpath_cf_button_hover_background',
				'label'    => esc_html__( 'Background', 'element-path' ),
				'types'    => [ 'classic', 'gradient', ],
				'selector' => '{{WRAPPER}} .elmpath-ninja-forms .submit-container input[type="button"]:hover',
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
				'selector' => '{{WRAPPER}} .elmpath-ninja-forms .submit-container input[type="button"]:hover',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'elmpath_cf_button_border_hover',
				'label'    => esc_html__( 'Border', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-ninja-forms .submit-container input[type="button"]:hover',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'elmpath_cf_button_title_shadow_hover',
				'selector' => '{{WRAPPER}} .elmpath-ninja-forms .submit-container input[type="button"]:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();


	}

}
