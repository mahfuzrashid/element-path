<?php
/**
 * Widget: Tutor LMS
 */

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

defined( 'ABSPATH' ) || die();

class ELMPATH_Tutor extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-tutor';
	}

	/**
	 * Get dependent stylesheet
	 */
	public function get_style_depends() {
		return [ 'elmpath-tutor' ];
	}

	/**
	 * Register content related controls
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'section_tutor_content',
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
				'default' => 'by_latest_courses',
				'options' => array(
					'by_latest_courses'   => esc_html__( 'By Latest Courses', 'element-path' ),
					'by_courses_category' => esc_html__( 'By Courses Category', 'element-path' ),
					'by_courses_tags'     => esc_html__( 'By Courses Tags', 'element-path' ),
					'by_courses'          => esc_html__( 'By Courses', 'element-path' ),
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
				'options'     => $this->elmpath_get_taxonomies( 'course-category' ),
				'condition'   => [
					'content_type' => 'by_courses_category',
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
				'options'     => $this->elmpath_get_taxonomies( 'course-tag' ),
				'condition'   => [
					'content_type' => 'by_courses_tags',
				],
			]
		);

		$this->add_control(
			'courses_ids',
			[
				'label'       => esc_html__( 'Courses List', 'element-path' ),
				'type'        => Controls_Manager::SELECT2,
				'multiple'    => true,
				'label_block' => true,
				'options'     => $this->elmpath_get_post_type( 'courses' ),
				'condition'   => [
					'content_type' => 'by_courses',
				],
			]
		);

		$this->add_control(
			'custom_courses_ids',
			[
				'label'       => esc_html__( 'Custom Courses IDs', 'element-path' ),
				'description'       => esc_html__( 'Add any course ids of Tutor LMS post types. If multiple use comma to separate them. Example: 1023,201,239', 'element-path' ),
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
				'default' => '6',
				'options' => [
					'12' => esc_html__( '1 Column', 'element-path' ),
					'6'  => esc_html__( '2 Column', 'element-path' ),
					'4'  => esc_html__( '3 Column', 'element-path' ),
					'3'  => esc_html__( '4 Column', 'element-path' ),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'courses_grid_style',
			[
				'label' => esc_html__( 'Global', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_common_controls();


		$this->end_controls_section();

	}

}
