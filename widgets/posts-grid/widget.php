<?php
/**
 * Widget: Posts Grid
 */

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

defined( 'ABSPATH' ) || die();

class ELMPATH_Posts_Grid extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-posts-grid';
	}

	/**
	 * Get dependent stylesheet
	 */
	public function get_style_depends() {
		return [ 'elmpath-posts-grid' ];
	}

	/**
	 * Register content related controls
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Query', 'element-path' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'content_type',
			[
				'label'   => esc_html__( 'Content Type', 'element-path' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'by_latest_posts',
				'options' => array(
					'by_latest_posts'   => esc_html__( 'By Latest Posts', 'element-path' ),
					'by_posts_category' => esc_html__( 'By Posts Category', 'element-path' ),
					'by_posts_tags'     => esc_html__( 'By Posts Tags', 'element-path' ),
					'by_posts'          => esc_html__( 'By Posts', 'element-path' ),
					'by_custom'            => esc_html__( 'By Custom', 'element-path' ),
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
			'post_ids',
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
			'custom_post_ids',
			[
				'label'       => esc_html__( 'Custom Posts IDs', 'element-path' ),
				'description'       => esc_html__( 'Add any post ids of post types. If multiple use comma to separate them. Example: 1023,201,239', 'element-path' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html( '1023,201,239' ),
				'condition'   => [
					'content_type' => 'by_custom',
				],
			]
		);

		$this->add_control(
			'posts_per_page',
			[
				'label'       => esc_html__( 'Total Items', 'element-path' ),
				'type'        => Controls_Manager::NUMBER,
				'placeholder' => - 1,
			]
		);

		$this->add_control(
			'items_per_row',
			[
				'label'   => esc_html__( 'Item (s) Per Row', 'element-path' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '4',
				'options' => [
					'12' => esc_html__( '1 Column', 'element-path' ),
					'6'  => esc_html__( '2 Column', 'element-path' ),
					'4'  => esc_html__( '3 Column', 'element-path' ),
					'3'  => esc_html__( '4 Column', 'element-path' ),
				],
			]
		);

		$this->add_control(
			'show_pagination',
			[
				'label' => esc_html__( 'Show Pagination', 'element-path' ),
				'type'  => Controls_Manager::SWITCHER,
			]
		);

		$this->add_control(
			'excerpt_length',
			[
				'label' => esc_html__( 'Excerpt Length', 'element-path' ),
				'type'  => Controls_Manager::NUMBER,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'posts_grid_style',
			[
				'label' => esc_html__( 'Global', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_common_controls();


		$this->end_controls_section();

	}

}
