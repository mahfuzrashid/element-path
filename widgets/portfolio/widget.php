<?php
/**
 * Widget: Portfolio
 */

use Elementor\Controls_Manager;
use Elementor\Repeater;

defined( 'ABSPATH' ) || die();

class ELMPATH_Portfolio extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-portfolio';
	}

	/**
	 * Get dependent stylesheet
	 */
	public function get_style_depends() {
		return [ 'elmpath-portfolio' ];
	}

	/**
	 * Register content related controls
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'section_portfolio_content',
			[
				'label' => esc_html__( 'Content', 'element-path' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_common_controls();

		$this->add_control(
			'items_per_row',
			[
				'label'   => esc_html__( 'Item (s) Per Row', 'element-path' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '6',
				'options' => [
					'12' => esc_html__( '1 Column', 'element-path' ),
					'6'  => esc_html__( '2 Column', 'element-path' ),
					'4'  => esc_html__( '3 Column', 'element-path' ),
					'3'  => esc_html__( '4 Column', 'element-path' ),
				],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'img_id',
			[
				'label'   => esc_html__( 'Select Image', 'element-path' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
			]
		);

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
			'p_link', [
				'label'       => esc_html__( 'Link', 'element-path' ),
				'type'        => Controls_Manager::URL,
			]
		);

		$repeater->add_control(
			'category', [
				'label'       => esc_html__( 'Category', 'element-path' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'author', [
				'label'       => esc_html__( 'Author Name', 'element-path' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'author_url', [
				'label'       => esc_html__( 'Author URL(s)', 'element-path' ),
				'type'        => Controls_Manager::URL,
			]
		);

		$repeater->add_control(
			'btn_hire_text', [
				'label'       => esc_html__( 'Hire Me Text', 'element-path' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'btn_hire_url', [
				'label'       => esc_html__( 'Hire Me URL(s)', 'element-path' ),
				'type'        => Controls_Manager::URL,
				'label_block' => true,
			]
		);

		$this->add_control(
			'portfolios',
			[
				'label'       => esc_html__( 'Portfolios', 'element-path' ),
				'show_label'  => false,
				'type'        => Controls_Manager::REPEATER,
				'separator'   => 'before',
				'title_field' => '{{ title }}',
				'dynamic'     => [
					'active' => true,
				],
				'default'     => [
					[
						'title' => esc_html__( 'Mockup Design', 'element-path' ),
					],
				],
				'fields'      => $repeater->get_controls(),
			]
		);

		$this->end_controls_section();

	}
}
