<?php
/**
 * Widget: Countdown
 */

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;

defined( 'ABSPATH' ) || die();

class ELMPATH_Countdown extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-countdown';
	}

	/**
	 * Get dependent stylesheet
	 */
	public function get_style_depends() {
		return [ 'elmpath-countdown' ];
	}

	/**
	 * Register content related controls
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Icon', 'element-path' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'date_time',
			[
				'type'        => Controls_Manager::TEXT,
				'label'       => esc_html__( 'Date & Time', 'element-path' ),
				'default' => esc_html( '08 Oct 2020 01:51 pm' ),
				'label_block' => true
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_infobox_style',
			[
				'label' => esc_html__( 'Style', 'element-path' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_common_controls();

		$this->add_control(
			'num_color',
			[
				'label'     => esc_html__( 'Number Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-countdown .count-number' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_color',
			[
				'label'     => esc_html__( 'Text Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-countdown .count-text' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .elmpath-countdown-1 > span, {{WRAPPER}} .elmpath-countdown-2 > span' => 'border-right-color: {{VALUE}};',
					'{{WRAPPER}} .elmpath-countdown-3 > span' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .elmpath-countdown-4 > span' => 'border-left-color: {{VALUE}};',
				],
				'condition' => [
					'style' => [ '1', '2', '3', '4' ],
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
					'{{WRAPPER}} .elmpath-countdown-4 > span' => 'border-right-color: {{VALUE}};',
				],
				'condition' => [
					'style' => [ '4' ],
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'wrap_bg',
				'label'    => esc_html__( 'Background', 'element-path' ),
				'types'    => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .elmpath-countdown-5 > span',
				'condition' => [
					'style' => [ '5' ],
				],
			]
		);


		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'     => esc_html__( 'Number Size', 'element-path' ),
				'name'     => 'typography_number',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} .elmpath-countdown .count-number',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'     => esc_html__( 'Text Size', 'element-path' ),
				'name'     => 'typography_text',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} .elmpath-countdown .count-text',
			]
		);

		$this->add_responsive_control(
			'item_margin',
			[
				'label'      => esc_html__( 'Item Margin', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-countdown > span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'item_padding',
			[
				'label'      => esc_html__( 'Item Padding', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-countdown > span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

}
