<?php
/**
 * Widget: Table
 */

use Elementor\Controls_Manager;

defined( 'ABSPATH' ) || die();

class ELMPATH_Table extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-table';
	}

	/**
	 * Get dependent stylesheet
	 */
	public function get_style_depends() {
		return [ 'elmpath-table' ];
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
			'_table',
			[
				'label'       => esc_html__( 'Select Table', 'element-path' ),
				'type'        => Controls_Manager::SELECT,
				'options'     => $this->elmpath_get_post_type( 'tablepress_table' ),
			]
		);

		$this->end_controls_section();

	}

}
