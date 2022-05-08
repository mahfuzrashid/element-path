<?php
/**
 * Widget: Team
 */

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Repeater;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Utils;

defined( 'ABSPATH' ) || die();

class ELMPATH_Team_details extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-team-details';
	}

	/**
	 * Get dependent stylesheet
	 */
	public function get_style_depends() {
		return [ 'elmpath-team-details' ];
	}

	/**
	 * Register content related controls
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Team', 'element-path' ),
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
					'by_team_cat' => esc_html__( 'By Team Categories', 'element-path' ),
					'by_team_ids'     => esc_html__( 'By Team Selection', 'element-path' ),
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
				'options'     => $this->elmpath_get_taxonomies( 'team_cat' ),
				'condition'   => [
					'content_type' => 'by_team_cat',
				],
			]
		);

		$this->add_control(
			'post_team_ids',
			[
				'label'       => esc_html__( 'Team Selection', 'element-path' ),
				'type'        => Controls_Manager::SELECT2,
				'multiple'    => true,
				'label_block' => true,
				'options'     => $this->elmpath_get_post_type( 'team' ),
				'condition'   => [
					'content_type' => 'by_team_ids',
				],
			]
		);

		$this->end_controls_section();

	}

}
