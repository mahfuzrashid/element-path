<?php
/**
 * Widget: Image Compare
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;

defined( 'ABSPATH' ) || die();

class ELMPATH_Image_Compare extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-image-compare';
	}

	/**
	 * Get dependent stylesheet
	 */
	public function get_style_depends() {
		return [ 'elmpath-image-compare' ];
	}

	/**
	 * Get dependent scripts
	 */
	public function get_script_depends() {
		return [ 'image-compare-viewer', 'elmpath-image-compare' ];
	}

	/**
	 * Register content related controls
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content_layout',
			[
				'label' => esc_html__( 'Layout', 'element-path' ),
			]
		);

		$this->add_control(
			'before_image',
			[
				'label'   => esc_html__( 'Before Image', 'element-path' ),
				'description' => esc_html__( 'Use same size image for before and after for better preview.', 'element-path' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'dynamic' => [ 'active' => true ],
			]
		);

		$this->add_control(
			'after_image',
			[
				'label'   => esc_html__( 'After Image', 'element-path' ),
				'description' => esc_html__( 'Use same size image for before and after for better preview.', 'element-path' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'dynamic' => [ 'active' => true ],
			]
		);

		$this->add_control(
			'before_label',
			[
				'label'       => esc_html__( 'Before Label', 'element-path' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Before Label', 'element-path' ),
				'default'     => esc_html__( 'Before', 'element-path' ),
				'label_block' => true,
				'dynamic'     => [ 'active' => true ],
			]
		);

		$this->add_control(
			'after_label',
			[
				'label'       => esc_html__( 'After Label', 'element-path' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'After Label', 'element-path' ),
				'default'     => esc_html__( 'After', 'element-path' ),
				'label_block' => true,
				'dynamic'     => [ 'active' => true ],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_additional_settings',
			[
				'label' => esc_html__( 'Additional', 'element-path' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'orientation',
			[
				'label'   => esc_html__( 'Orientation', 'element-path' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'horizontal',
				'options' => [
					'horizontal' => esc_html__( 'Horizontal', 'element-path' ),
					'vertical'   => esc_html__( 'Vertical', 'element-path' ),
				],
			]
		);

		$this->add_control(
			'default_offset_pct',
			[
				'label'   => esc_html__( 'Before Image Visibility', 'element-path' ),
				'type'    => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0.7,
				],
				'range' => [
					'px' => [
						'max'  => 1,
						'min'  => 0.1,
						'step' => 0.1,
					],
				],
			]
		);

		$this->add_control(
			'no_overlay',
			[
				'label'       => esc_html__( 'Overlay', 'element-path' ),
				'description' => esc_html__( 'Do not show the overlay with before and after.', 'element-path' ),
				'type'        => Controls_Manager::SWITCHER,
				'default'     => 'yes',
			]
		);

		$this->add_control(
			'move_slider_on_hover',
			[
				'label'       => esc_html__( 'Slide on Hover', 'wid cget-pack' ),
				'description' => esc_html__( 'Move slider on mouse hover?', 'element-path' ),
				'type'        => Controls_Manager::SWITCHER,
			]
		);

		$this->add_control(
			'move_with_handle_only',
			[
				'label'       => esc_html__( 'Handle Only', 'element-path' ),
				'description' => esc_html__( 'Allow a user to swipe anywhere on the image to control slider movement.', 'element-path' ),
				'type'        => Controls_Manager::SWITCHER,
				'default'     => 'yes',
			]
		);

		$this->add_control(
			'click_to_move',
			[
				'label'       => esc_html__( 'Click to Move', 'element-path' ),
				'description' => esc_html__( 'Allow a user to click (or tap) anywhere on the image to move the slider to that location.', 'element-path' ),
				'type'        => Controls_Manager::SWITCHER,
			]
		);

		$this->add_control(
			'on_hover',
			[
				'label'       => esc_html__( 'On Hover?', 'element-path' ),
				'type'        => Controls_Manager::SWITCHER,
				'default'     => 'yes',
				'condition'   => [
					'no_overlay' => 'yes'
				]
			]
		);

		$this->add_control(
			'add_circle',
			[
				'label'       => esc_html__( 'Add Circle In Bar?', 'element-path' ),
				'type'        => Controls_Manager::SWITCHER,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'add_circle_blur',
			[
				'label'       => esc_html__( 'add Circle Blur?', 'element-path' ),
				'type'        => Controls_Manager::SWITCHER,
				'condition'   => [
					'add_circle' => 'yes'
				],
			]
		);

		$this->add_control(
			'add_circle_shadow',
			[
				'label'       => esc_html__( 'Circle Shadow?', 'element-path' ),
				'type'        => Controls_Manager::SWITCHER,
				'condition'   => [
					'add_circle' => 'yes'
				],
			]
		);

		$this->add_control(
			'smoothing',
			[
				'label'       => esc_html__( 'Smoothing?', 'element-path' ),
				'type'        => Controls_Manager::SWITCHER,
				'default'     => 'yes',
				'separator' => 'before'
			]
		);

		$this->add_control(
			'smoothing_amount',
			[
				'label'   => esc_html__( 'Smoothing Amount', 'element-path' ),
				'type'    => Controls_Manager::SLIDER,
				'default' => [
					'size' => 400,
				],
				'range' => [
					'px' => [
						'max'  => 1000,
						'min'  => 100,
						'step' => 10,
					],
				],
				'condition'   => [
					'smoothing' => 'yes'
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_style',
			[
				'label' => esc_html__( 'Style', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'overlay_color',
			[
				'label'     => esc_html__( 'Overlay Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elmpath-image-compare .elmpath-image-compare-overlay:before' => 'background: {{VALUE}};',
				],
				'condition'   => [
					'no_overlay' => 'yes'
				]
			]
		);

		$this->start_controls_tabs( 'tabs_image_compare_style' );

		$this->start_controls_tab(
			'tab_image_compare_before_style',
			[
				'label' => esc_html__( 'Before', 'element-path' ),
			]
		);

		$this->add_control(
			'before_background',
			[
				'label'     => esc_html__( 'Background', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elmpath-image-compare .icv__label.icv__label-before' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'before_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elmpath-image-compare .icv__label.icv__label-before' => 'color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_tab();



		$this->start_controls_tab(
			'tab_image_compare_after_style',
			[
				'label' => esc_html__( 'After', 'element-path' ),
			]
		);

		$this->add_control(
			'after_background',
			[
				'label'     => esc_html__( 'Background', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elmpath-image-compare .icv__label.icv__label-after' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'after_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elmpath-image-compare .icv__label.icv__label-after' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_image_compare_bar_style',
			[
				'label' => esc_html__( 'Bar', 'element-path' ),
			]
		);

		$this->add_control(
			'bar_color',
			[
				'label'     => esc_html__( 'Bar Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#fff',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();


		$this->add_responsive_control(
			'after_before_padding',
			[
				'label'      => esc_html__( 'Padding', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-image-compare .icv__label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'after_before_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-image-compare .icv__label' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'after_before_typography',
				'label'     => esc_html__( 'Typography', 'element-path' ),
				'selector'  => '{{WRAPPER}} .elmpath-image-compare .icv__label',
			]
		);

		$this->end_controls_section();

	}

}
