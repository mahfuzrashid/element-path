<?php
/**
 * Widget: Info Box
 */

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;

defined( 'ABSPATH' ) || die();

class ELMPATH_Info_Box extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-info-box';
	}

	/**
	 * Get dependent stylesheet
	 */
	public function get_style_depends() {
		return [ 'elmpath-info-box' ];
	}

	/**
	 * Register content related controls
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'icon_section',
			[
				'label' => esc_html__( 'Icon', 'element-path' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'choose_media',
			[
				'label'   => esc_html__( 'Select Icon', 'element-path' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'choose_icon',
				'options' => [
					'choose_icon'  => esc_html__( 'Icon', 'element-path' ),
					'choose_image' => esc_html__( 'Image', 'element-path' ),
				],
			]
		);

		$this->add_control(
			'info_image',
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
			'info_icon',
			[
				'label'            => esc_html__( 'Choose Icon', 'element-path' ),
				'type'             => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'condition'        => [
					'choose_media' => 'choose_icon',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'title_section',
			[
				'label' => esc_html__( 'Title', 'element-path' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'info_count',
			[
				'label' => esc_html__( 'Info Count', 'element-path' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'style' => '3',
				],
			]
		);

		$this->add_control(
			'title',
			[
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'description_section',
			[
				'label' => esc_html__( 'Description', 'element-path' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'description',
			[
				'type'        => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Type your description here', 'element-path' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'buttons_section',
			[
				'label' => esc_html__( 'Buttons', 'element-path' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'btn_text',
			[
				'label'       => esc_html__( 'Button Text', 'element-path' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Get Started', 'element-path' ),
			]
		);

		$this->add_control(
			'btn_url',
			[
				'label'         => esc_html__( 'Button URL', 'element-path' ),
				'type'          => \Elementor\Controls_Manager::URL,
				'placeholder'   => esc_html__( 'https://your-link.com', 'element-path' ),
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				],
				'separator'     => 'after',
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
			'primary_color',
			[
				'label'     => esc_html__( 'Primary Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'condition' => [
					'style' => ['4', '5'],
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
					'style' => ['4', '5'],
				],
			]
		);

		$this->add_control(
			'is_featured',
			[
				'label' => esc_html__('Featured?', 'element-path' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Yes', 'element-path' ),
				'label_off' => esc_html__('No', 'element-path' ),
				'return_value' => 'yes',
				'default' => 'no',
				'condition' => [
					'style' => ['4', '2'],
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
					'{{WRAPPER}} .elmpath-info-box .icon-wrap img' => 'min-width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .elmpath-info-box .icon-wrap > i' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .elmpath-info-box .icon-wrap > i' => 'width: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'choose_media' => 'choose_icon',
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
					'{{WRAPPER}} .elmpath-info-box .icon-wrap > i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elmpath-info-box-5 .icon-wrap:before' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_bg',
			[
				'label'     => esc_html__( 'Background Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-info-box .icon-wrap > i' => 'background-color: {{VALUE}};box-shadow: 0 0 0 1px {{VALUE}};',
				],
				'condition' => [
					'style' => '2',
				],
			]
		);

		$this->add_control(
			'icon_bg_common',
			[
				'label'     => esc_html__( 'Background Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-info-box .icon-wrap > i' => 'background-color: {{VALUE}};box-shadow: 0 0 0 1px {{VALUE}};',
				],
				'condition' => [
					'style' => ['1', '3'],
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
				'label'     => esc_html__( 'Title Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-info-box .elmpath-info-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'typography_title',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .elmpath-info-box .elmpath-info-title',
			]
		);

		$this->add_responsive_control(
			'title_margin',
			[
				'label'      => esc_html__( 'Margin', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-info-box .elmpath-info-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'title_padding',
			[
				'label'      => esc_html__( 'Padding', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-info-box .elmpath-info-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_desc_style',
			[
				'label' => esc_html__( 'Description', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label'     => esc_html__( 'Description Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-info-box .elmpath-info-desc > *' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'typography_desc',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} .elmpath-info-box .elmpath-info-desc > *',
			]
		);

		$this->add_responsive_control(
			'desc_margin',
			[
				'label'      => esc_html__( 'Margin', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-info-box .elmpath-info-desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_buttons_style',
			[
				'label' => esc_html__( 'Buttons', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'btn_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elmpath-info-box .elmpath-info-btn'          => 'color: {{VALUE}};',
					'{{WRAPPER}} .elmpath-info-box .elmpath-info-btn svg path' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'btn_bg_color',
			[
				'label'     => esc_html__( 'Background', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elmpath-info-box .elmpath-info-btn' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'btn_hover_color',
			[
				'label'     => esc_html__( 'Hover Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elmpath-info-box .elmpath-info-btn:hover'          => 'color: {{VALUE}};',
					'{{WRAPPER}} .elmpath-info-box .elmpath-info-btn:hover svg path' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_hover_bg_color',
			[
				'label'     => esc_html__( 'Hover Background', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elmpath-info-box .elmpath-info-btn:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'btn_padding',
			[
				'label'      => esc_html__( 'Padding', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-info-box .elmpath-info-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'btn_radius',
			[
				'label'      => esc_html__( 'Radius', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-info-box .elmpath-info-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

}
