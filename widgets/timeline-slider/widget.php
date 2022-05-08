<?php
/**
 * Widget: Timeline Slider
 */

use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Scheme_Color;

defined( 'ABSPATH' ) || die();

class ELMPATH_Timeline_Slider extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-timeline-slider';
	}

	/**
	 * Get dependent stylesheet
	 */
	public function get_style_depends() {
		return [ 'elmpath-timeline-slider' ];
	}

	/**
	 * Get dependent scripts
	 */
	public function get_script_depends() {
		return [ 'banner-slider', 'elmpath-timeline' ];
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
			'posts_per_page',
			[
				'label' => esc_html__( 'Total Items', 'element-path' ),
				'type' => Controls_Manager::NUMBER,
				'placeholder' => -1,
			]
		);

		$this->add_control(
			'excerpt_length',
			[
				'label' => esc_html__( 'Excerpt Length', 'element-path' ),
				'placeholder' => 20,
				'type' => Controls_Manager::NUMBER,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'_icon',
			[
				'label'   => esc_html__( 'Choose Icon', 'element-path' ),
				'type'             => Controls_Manager::ICONS,
				'fa4compatibility' => 'social_icon',
				'default' => [
					'value' => 'far fa-heart',
					'library' => 'fa-regular',
				],
			]
		);

		$this->add_control(
			'timeline_icons',
			[
				'type'    => Controls_Manager::REPEATER,
				'fields'  => array_values( $repeater->get_controls() ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Global Style', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
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
				'selectors'  => [
					'{{WRAPPER}} .elmpath-timeline-horizontal .timeline__content, {{WRAPPER}} .timeline:not(.timeline--horizontal):before, {{WRAPPER}} .elmpath-timeline-horizontal.timeline--horizontal .timeline-divider' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .elmpath-timeline-horizontal.timeline--horizontal .timeline__item--top .timeline__content:before' => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .elmpath-timeline-horizontal.timeline--horizontal .timeline__item--bottom .timeline__content:before' => 'border-bottom-color: {{VALUE}};',
					'{{WRAPPER}} .elmpath-timeline-horizontal .timeline__item:after, {{WRAPPER}} .elmpath-timeline-horizontal .timeline-nav-button' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .elmpath-timeline-horizontal .timeline-nav-button:before' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'secondary_color',
			[
				'label'     => esc_html__( 'Text Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-timeline-horizontal .timeline__content *' => 'color: {{VALUE}};'
				],
			]
		);

		$this->end_controls_section();

	}

}
