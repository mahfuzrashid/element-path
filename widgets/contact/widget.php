<?php
/**
 * Widget: Contact Form7
 */

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

defined( 'ABSPATH' ) || die();

class ELMPATH_Contact_Form extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-contact';
	}

	/**
	 * Get dependent stylesheet
	 */
	public function get_style_depends() {
		return [ 'elmpath-cf7' ];
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
			'contact_form7',
			[
				'label'   => esc_html__( 'Select Form', 'element-path' ),
				'type'    => Controls_Manager::SELECT,
				'options' => $this->elmpath_get_post_type( 'wpcf7_contact_form' ),
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
			'elmpath_cf_align',
			[
				'label'     => esc_html__( 'Form Alignment', 'element-path' ),
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
				'default'   => '',
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_wrapper_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-cf7-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .elmpath-cf7-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .elmpath-cf7-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'elmpath_cf_wrapper_background',
				'label'    => esc_html__( 'Background', 'element-path' ),
				'types'    => [ 'classic', 'gradient', ],
				'selector' => '{{WRAPPER}} .elmpath-cf7-wrapper',
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
				'selector' => '{{WRAPPER}} .elmpath-cf7-wrapper',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'elmpath_cf_wrapper_border',
				'label'    => esc_html__( 'Border', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-cf7-wrapper',
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
				'selector' => '{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form label',
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_input_label_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form label' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-not-valid-tip',
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_input_label_hint_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#777777',
				'selectors' => [
					'{{WRAPPER}} .elmpath-cf7-wrapper .elmpath-cf7-wrapper .wpcf7-not-valid-trip .wpcf7-not-valid-tip' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input:not([type="submit"]):not([type="checkbox"]):not([type="radio"]), {{WRAPPER}} .elmpath-cf7-wrapper .select2-container--default .select2-selection--single' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .elmpath-cf7-wrapper .select2-container--default .select2-selection--single'                                                                                                                   => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .elmpath-cf7-wrapper' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input:not([type="submit"]):not([type="checkbox"]):not([type="radio"]), {{WRAPPER}} .elmpath-cf7-wrapper .select2-container--default .select2-selection--single' => 'height: {{SIZE}}px;',
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form textarea'                                                                                                                                                     => 'height: {{SIZE}}px;',
					'{{WRAPPER}} .elmpath-cf7-wrapper .select2-container--default .select2-selection--single .select2-selection__rendered'                                                                                      => 'line-height: {{SIZE}}px;',
					'{{WRAPPER}} .elmpath-cf7-wrapper .select2-container .select2-selection--single'                                                                                                                            => 'height: {{SIZE}}px;',
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
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form .wpcf7-form-control-wrap' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form textarea' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_input_style_padding_textarea',
			[
				'label'      => esc_html__( 'Padding', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input:not([type="submit"]):not([type="checkbox"]):not([type="radio"]) ,{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form textarea, {{WRAPPER}} .elmpath-cf7-wrapper .select2-container--default .select2-selection--single',
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
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input:not([type="submit"]):not([type="checkbox"]):not([type="radio"]), {{WRAPPER}} .elmpath-cf7-wrapper .select2-container--default .select2-selection--single' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form textarea'                                                                                                                                                     => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'elmpath_cf_input_style_border',
				'label'    => esc_html__( 'Border', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input:not([type="submit"]):not([type="checkbox"]):not([type="radio"]), {{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form textarea, {{WRAPPER}} .elmpath-cf7-wrapper .select2-container--default .select2-selection--single, {{WRAPPER}} .elmpath-cf7-wrapper .select2-container--default .select2-selection--single',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'elmpath_cf_input_style_box_shadow',
				'label'    => esc_html__( 'Box Shadow', 'element-path' ),
				'selector' => '
                            {{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input:not([type="submit"]):not([type="checkbox"]):not([type="radio"]),
                            {{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form textarea, {{WRAPPER}} .elmpath-cf7-wrapper .select2-container--default .select2-selection--single'
				,
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
				'selector' => '{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input:not([type="submit"]):not([type="checkbox"]):not([type="radio"]):hover ,{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form textarea:hover, {{WRAPPER}} .elmpath-cf7-wrapper .select2-container--default .select2-selection--single:hover',
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
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input:not([type="submit"]):not([type="checkbox"]):not([type="radio"]):hover, {{WRAPPER}} .elmpath-cf7-wrapper .select2-container--default .select2-selection--single:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form textarea:hover'                                                                                                                                                           => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'elmpath_cf_input_hover_style_border',
				'label'    => esc_html__( 'Border', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input:not([type="submit"]):not([type="checkbox"]):not([type="radio"]):hover, {{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form textarea:hover, {{WRAPPER}} .elmpath-cf7-wrapper .select2-container--default .select2-selection--single:hover',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'elmpath_cf_input_hover_style_box_shadow',
				'label'    => esc_html__( 'Box Shadow', 'element-path' ),
				'selector' => '
                            {{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input:not([type="submit"]):not([type="checkbox"]):not([type="radio"]):hover,
                            {{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form textarea:hover, {{WRAPPER}} .elmpath-cf7-wrapper .select2-container--default .select2-selection--single:hover'
				,
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
				'selector' => '{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input:not([type="submit"]):not([type="checkbox"]):not([type="radio"]):focus ,{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form textarea:focus, {{WRAPPER}} .elmpath-cf7-wrapper .select2-container--default .select2-selection--single:focus',
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
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input:not([type="submit"]):not([type="checkbox"]):not([type="radio"]):focus, {{WRAPPER}} .elmpath-cf7-wrapper .select2-container--default .select2-selection--single:focus' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form textarea:focus'                                                                                                                                                           => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'elmpath_cf_input_focus_style_border',
				'label'    => esc_html__( 'Border', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input:not([type="submit"]):not([type="checkbox"]):not([type="radio"]):focus, {{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form textarea:focus, {{WRAPPER}} .elmpath-cf7-wrapper .select2-container--default .select2-selection--single:focus',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'elmpath_cf_input_focus_style_box_shadow',
				'label'    => esc_html__( 'Box Shadow', 'element-path' ),
				'selector' => '
                            {{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input:not([type="submit"]):not([type="checkbox"]):not([type="radio"]):focus,
                            {{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form textarea:focus, {{WRAPPER}} .elmpath-cf7-wrapper .select2-container--default .select2-selection--single:focus'
				,
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
				'selector' => '{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input:not([type="submit"]):not([type="checkbox"]):not([type="radio"]), .wpcf7-form input:not([type="submit"]):not([type="checkbox"]):not([type="radio"]), .wpcf7-form textarea, .ekit-wid-con .elmpath-cf7-wrapper .wpcf7-form textarea, {{WRAPPER}} .elmpath-cf7-wrapper .select2-container--default .select2-selection--single',
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_input_style_font_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input:not([type="submit"]):not([type="checkbox"]):not([type="radio"]), {{WRAPPER}} .elmpath-cf7-wrapper .select2-container--default .select2-selection--single' => 'color: {{VALUE}}',
					'{{WRAPPER}} .wpcf7-form textarea'                                                                                                                                                                        => 'color: {{VALUE}}',
					'{{WRAPPER}} ..ekit-wid-con .elmpath-cf7-wrapper .wpcf7-form textarea'                                                                                                                                      => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input:not([type="submit"]):not([type="checkbox"]):not([type="radio"])::-webkit-input-placeholder' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input:not([type="submit"]):not([type="checkbox"]):not([type="radio"])::-moz-placeholder'          => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input:not([type="submit"]):not([type="checkbox"]):not([type="radio"]):-ms-input-placeholder'      => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input:not([type="submit"]):not([type="checkbox"]):not([type="radio"]):-moz-placeholder'           => 'font-size: {{SIZE}}{{UNIT}};',

					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form textarea::-webkit-input-placeholder' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form textarea::-moz-placeholder'          => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form textarea:-ms-input-placeholder'      => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form textarea:-moz-placeholder'           => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input:not([type="submit"]):not([type="checkbox"]):not([type="radio"])::-webkit-input-placeholder' => 'color: {{VALUE}}',
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input:not([type="submit"]):not([type="checkbox"]):not([type="radio"])::-moz-placeholder'          => 'color: {{VALUE}}',
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input:not([type="submit"]):not([type="checkbox"]):not([type="radio"]):-ms-input-placeholder'      => 'color: {{VALUE}}',
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input:not([type="submit"]):not([type="checkbox"]):not([type="radio"]):-moz-placeholder'           => 'color: {{VALUE}}',

					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form textarea::-webkit-input-placeholder' => 'color: {{VALUE}}',
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form textarea::-moz-placeholder'          => 'color: {{VALUE}}',
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form textarea:-ms-input-placeholder'      => 'color: {{VALUE}}',
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form textarea:-moz-placeholder'           => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form > p' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'elmpath_cf_button_typography',
				'label'    => esc_html__( 'Typography', 'element-path' ),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input[type="submit"]',
			]
		);

		$this->add_responsive_control(
			'elmpath_cf_button_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input[type="submit"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input[type="submit"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input[type="submit"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input[type="submit"]' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input[type="submit"]' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input[type="submit"]' => 'line-height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input[type="submit"]' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'elmpath_cf_button_background',
				'label'    => esc_html__( 'Background', 'element-path' ),
				'types'    => [ 'classic', 'gradient', ],
				'selector' => '{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input[type="submit"]',
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
				'selector' => '{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input[type="submit"]',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'elmpath_cf_button_border',
				'label'    => esc_html__( 'Border', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input[type="submit"]',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'elmpath_cf_button_title_shadow',
				'selector' => '{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input[type="submit"]',
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
					'{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input[type="submit"]:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'elmpath_cf_button_hover_background',
				'label'    => esc_html__( 'Background', 'element-path' ),
				'types'    => [ 'classic', 'gradient', ],
				'selector' => '{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input[type="submit"]:hover',
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
				'selector' => '{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input[type="submit"]:hover',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'elmpath_cf_button_border_hover',
				'label'    => esc_html__( 'Border', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input[type="submit"]:hover',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'elmpath_cf_button_title_shadow_hover',
				'selector' => '{{WRAPPER}} .elmpath-cf7-wrapper .wpcf7-form input[type="submit"]:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();


	}

}
