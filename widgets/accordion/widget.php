<?php
/**
 * Widget: Accordion
 */

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Repeater;

defined( 'ABSPATH' ) || die();

class ELMPATH_Accordion extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-accordion';
	}

	/**
	 * Get dependent stylesheet
	 */
	public function get_style_depends() {
		return [ 'elmpath-accordion' ];
	}

	/**
	 * Get dependent scripts
	 */
	public function get_script_depends() {
		return [ 'elmpath-accordion' ];
	}

	/**
	 * Register content related controls
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'section_accordion_content',
			[
				'label' => esc_html__( 'Accordion Items', 'element-path' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'title', [
				'label'       => esc_html__( 'Title', 'element-path' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$repeater->add_control(
			'content', [
				'label'       => esc_html__( 'Description', 'element-path' ),
				'type'        => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'accordions',
			[
				'label'       => esc_html__( 'Content', 'element-path' ),
				'show_label'  => false,
				'type'        => Controls_Manager::REPEATER,
				'separator'   => 'before',
				'title_field' => '{{ title }}',
				'dynamic'     => [
					'active' => true,
				],
				'default'     => [
					[
						'title'   => esc_html__( 'How to Change my Photo from Admin Dashboard? ', 'element-path' ),
						'content' => esc_html__( 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast', 'element-path' ),
					],
					[
						'title'   => esc_html__( 'How to Change my Password easily?', 'element-path' ),
						'content' => esc_html__( 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast', 'element-path' ),
					],
					[
						'title'   => esc_html__( 'How to Change my Subscription Plan using PayPal', 'element-path' ),
						'content' => esc_html__( 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast', 'element-path' ),
					],
				],
				'fields'      => $repeater->get_controls(),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_accordion_style',
			[
				'label' => esc_html__( 'Style', 'element-path' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_common_controls();

		$this->add_responsive_control(
			'acdn_item_margin',
			[
				'label'      => esc_html__( 'Item Margin', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-accordion .elmpath-accordion-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'background',
				'label'     => esc_html__( 'Background', 'element-path' ),
				'types'     => [ 'gradient' ],
				'selector'  => '{{WRAPPER}} .elmpath-accordion-3 .elmpath-accordion-item.active .elmpath-accordion-title',
				'condition' => [
					'style' => [ '3' ],
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
				'selectors' => [
					'{{WRAPPER}} .elmpath-accordion .elmpath-accordion-inner' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .elmpath-accordion .toggle-arrow-bg' => 'fill: {{VALUE}};',
				],
				'condition' => [
					'style' => [ '4', '5' ],
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
				'selectors' => [
					'{{WRAPPER}} .elmpath-accordion-5 .elmpath-accordion-item' => 'background-color: {{VALUE}};'
				],
				'condition' => [
					'style' => [ '4', '5' ],
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
					'{{WRAPPER}} .elmpath-accordion .elmpath-accordion-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_active_color',
			[
				'label'     => esc_html__( 'Title Active Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-accordion .elmpath-accordion-item.active .elmpath-accordion-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'typography_title',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .elmpath-accordion .elmpath-accordion-title',
			]
		);

		$this->add_responsive_control(
			'title_margin',
			[
				'label'      => esc_html__( 'Margin', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-accordion .elmpath-accordion-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .elmpath-accordion .elmpath-accordion-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_toggle_icon_style',
			[
				'label' => esc_html__( 'Toggle Icon', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'toggle_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-accordion .toggle-icon:after, {{WRAPPER}} .elmpath-accordion .toggle-icon:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .elmpath-accordion .toggle-icon svg .toggle-arrow'                                       => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'toggle_active_color',
			[
				'label'     => esc_html__( 'Active Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-accordion  .elmpath-accordion-item.active .toggle-icon:after, {{WRAPPER}} .elmpath-accordion .elmpath-accordion-item.active .toggle-icon:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .elmpath-accordion  .elmpath-accordion-item.active .toggle-icon svg .toggle-arrow'                                                                    => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'toggle_open_bg',
			[
				'label'     => esc_html__( 'Open Background', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-accordion-6 .onoffswitch-label' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'style' => [ '6' ],
				]
			]
		);

		$this->add_control(
			'toggle_close_bg',
			[
				'label'     => esc_html__( 'Close Background', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-accordion-6 .elmpath-accordion-item.active .onoffswitch-label' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'style' => [ '6' ],
				]
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
					'{{WRAPPER}} .elmpath-accordion .elmpath-accordion-content, {{WRAPPER}} .elmpath-accordion .elmpath-accordion-content > *' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'typography_desc',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} .elmpath-accordion .elmpath-accordion-content, {{WRAPPER}} .elmpath-accordion .elmpath-accordion-content > *',
			]
		);

		$this->add_responsive_control(
			'desc_margin',
			[
				'label'      => esc_html__( 'Margin', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-accordion .elmpath-accordion-content, {{WRAPPER}} .elmpath-accordion .elmpath-accordion-content > *' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}
}
