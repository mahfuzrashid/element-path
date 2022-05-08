<?php
/**
 * Widget: Testimonial
 */

use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Utils;

defined( 'ABSPATH' ) || die();

class ELMPATH_Testimonial extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-testimonial';
	}

	/**
	 * Get dependent stylesheet
	 */
	public function get_style_depends() {
		return [ 'elmpath-testimonial' ];
	}

	/**
	 * Register content related controls
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Testimonial', 'element-path' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'_image',
			[
				'label'   => esc_html__( 'Choose Image', 'element-path' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'_name',
			[
				'label'       => esc_html__( 'Name', 'element-path' ),
				'placeholder' => esc_html__( 'James Smith', 'element-path' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'designation',
			[
				'label'       => esc_html__( 'Designation', 'element-path' ),
				'placeholder' => esc_html__( 'Director', 'element-path' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'recommended',
			[
				'label'       => esc_html__( 'Recommended', 'element-path' ),
				'placeholder' => esc_html__( '90% Recommended', 'element-path' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'condition'   => [
					'style' => '2'
				]
			]
		);

		$this->add_control(
			'review_text',
			[
				'label' => esc_html__( 'Review Text', 'element-path' ),
				'type'  => Controls_Manager::TEXTAREA,
			]
		);

		$this->add_control(
			'rating',
			[
				'label'   => esc_html__( 'Rating', 'element-path' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '0',
				'options' => [
					'0'   => esc_html__( 'No Rating', 'element-path' ),
					'1'   => esc_html__( '1', 'element-path' ),
					'1.5' => esc_html__( '1.5', 'element-path' ),
					'2'   => esc_html__( '2', 'element-path' ),
					'2.5' => esc_html__( '2.5', 'element-path' ),
					'3'   => esc_html__( '3', 'element-path' ),
					'3.5' => esc_html__( '3.5', 'element-path' ),
					'4'   => esc_html__( '4', 'element-path' ),
					'4.5' => esc_html__( '4.5', 'element-path' ),
					'5'   => esc_html__( '5', 'element-path' ),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_testimonial_style',
			[
				'label' => esc_html__( 'Global Style', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_common_controls();

		$this->add_control(
			'rating_color',
			[
				'label'     => esc_html__( 'Rating Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-testimonial .elmpath-testi-rating i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'elmpath_wrapper_box_shadow',
				'label'    => esc_html__( 'Box Shadow', 'element-path' ),
				'selector' => '{{WRAPPER}} .elmpath-testimonial-1 .elmpath-testi-desc, 
				{{WRAPPER}} .elmpath-testimonial-2, 
				{{WRAPPER}} .elmpath-testimonial-4, 
				{{WRAPPER}} .elmpath-testimonial-4',
			]
		);

		$this->add_control(
			'global_primary',
			[
				'label'     => esc_html__( 'Primary Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-testimonial-4:after' => 'border-color: {{VALUE}};',
					'body:not(.rtl) {{WRAPPER}} .elmpath-testimonial-5 .elmpath-testi-desc' => 'border-left-color: {{VALUE}};',
					'.rtl {{WRAPPER}} .elmpath-testimonial-5 .elmpath-testi-desc' => 'border-right-color: {{VALUE}};',
				],
				'condition' => [
					'style' => ['4', '5'],
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
					'style' => ['3'],
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
					'style' => ['3'],
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_name_style',
			[
				'label' => esc_html__( 'Name', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'name_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-testimonial .elmpath-testi-name' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'typography_name',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .elmpath-testimonial .elmpath-testi-name',
			]
		);

		$this->add_responsive_control(
			'name_margin',
			[
				'label'      => esc_html__( 'Margin', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-testimonial .elmpath-testi-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_designation_style',
			[
				'label' => esc_html__( 'Designation', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'designation_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-testimonial .elmpath-testi-designation' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'typography_designation',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .elmpath-testimonial .elmpath-testi-designation',
			]
		);

		$this->add_responsive_control(
			'designation_margin',
			[
				'label'      => esc_html__( 'Margin', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-testimonial .elmpath-testi-designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_review_text_style',
			[
				'label' => esc_html__( 'Review Text', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-testimonial .elmpath-testi-desc p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'typography_desc',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .elmpath-testimonial .elmpath-testi-desc p',
			]
		);

		$this->add_responsive_control(
			'desc_margin',
			[
				'label'      => esc_html__( 'Margin', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-testimonial .elmpath-testi-desc p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_quote_style',
			[
				'label' => esc_html__( 'Quote', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'style' => '4'
				]
			]
		);

		$this->add_control(
			'quote_color',
			[
				'label'     => esc_html__( 'Quote Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-testimonial-4 .elmpath-testi-desc > .elmpath-quote' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'quote_size',
			[
				'label' => esc_html__( 'Size', 'element-path' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 5,
					],
					'em' => [
						'min' => 0,
						'max' => 20,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 101,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-testimonial-4 .elmpath-testi-desc > .elmpath-quote' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

}
