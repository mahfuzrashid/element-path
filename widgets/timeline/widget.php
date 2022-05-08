<?php
/**
 * Widget: Timeline
 */

use Elementor\Controls_Manager;
use Elementor\Repeater;

defined( 'ABSPATH' ) || die();

class ELMPATH_Timeline extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-timeline';
	}

	/**
	 * Get dependent stylesheet
	 */
	public function get_style_depends() {
		return [ 'elmpath-timeline' ];
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

		$this->add_control(
			'btn_text',
			[
				'label'       => esc_html__( 'Button Text', 'element-path' ),
				'placeholder' => esc_html__( 'Read More', 'element-path' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_icons',
			[
				'label' => esc_html__( 'Icon', 'element-path' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition'        => [
					'style' => '4',
				],
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

		$this->end_controls_section();

	}

}
