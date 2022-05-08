<?php
/**
 * Widget: Marquee
 */

use Elementor\Controls_Manager;
defined( 'ABSPATH' ) || die();

class ELMPATH_Marquee extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-marquee';
	}

	/**
	 * Get dependent stylesheet
	 */
	public function get_style_depends() {
		return [ 'elmpath-marquee' ];
	}

	/**
	 * Get dependent scripts
	 */
	public function get_script_depends() {
		return [ 'jConveyorTicker', 'elmpath-marquee' ];
	}

	/**
	 * Register content related controls
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'section_marquee_content',
			[
				'label' => esc_html__( 'Posts Query', 'element-path' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'content_type',
			[
				'label'   => esc_html__( 'Content Type', 'element-path' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'by_latest_posts',
				'options' => array(
					'by_latest_posts'   => esc_html__( 'By Latest Posts', 'element-path' ),
					'by_posts_category' => esc_html__( 'By Posts Category', 'element-path' ),
					'by_posts_tags'     => esc_html__( 'By Posts Tags', 'element-path' ),
					'by_posts'          => esc_html__( 'By Posts', 'element-path' ),
					'by_custom'         => esc_html__( 'By Custom', 'element-path' ),
				),
			]
		);


		$this->add_control(
			'_category',
			[
				'label'       => esc_html__( 'Category', 'element-path' ),
				'type'        => Controls_Manager::SELECT2,
				'multiple'    => true,
				'label_block' => true,
				'options'     => $this->elmpath_get_taxonomies( 'category' ),
				'condition'   => [
					'content_type' => 'by_posts_category',
				],
			]
		);

		$this->add_control(
			'tag_ids',
			[
				'label'       => esc_html__( 'Tags', 'element-path' ),
				'type'        => Controls_Manager::SELECT2,
				'multiple'    => true,
				'label_block' => true,
				'options'     => $this->elmpath_get_taxonomies( 'post_tag' ),
				'condition'   => [
					'content_type' => 'by_posts_tags',
				],
			]
		);

		$this->add_control(
			'posts_ids',
			[
				'label'       => esc_html__( 'Posts List', 'element-path' ),
				'type'        => Controls_Manager::SELECT2,
				'multiple'    => true,
				'label_block' => true,
				'options'     => $this->elmpath_get_post_type( 'post' ),
				'condition'   => [
					'content_type' => 'by_posts',
				],
			]
		);

		$this->add_control(
			'custom_posts_ids',
			[
				'label'       => esc_html__( 'Custom Posts IDs', 'element-path' ),
				'description' => esc_html__( 'Add any post IDs of any post types. If multiple use comma to separate them. Example: 1023,201,239', 'element-path' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html( '1023,201,239' ),
				'condition'   => [
					'content_type' => 'by_custom',
				],
			]
		);

		$this->add_control(
			'_label',
			[
				'label'       => esc_html__( 'Label', 'element-path' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html( 'Latest News' ),
			]
		);

		$this->add_control(
			'posts_per_page',
			[
				'label'       => esc_html__( 'Items Limit', 'element-path' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html( '-1' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_marquee_styles',
			[
				'label' => esc_html__( 'Styles', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_common_controls();

		$this->end_controls_section();

	}
}
