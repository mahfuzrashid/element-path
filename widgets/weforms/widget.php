<?php
/**
 * Widget: weForms
 */

use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;

defined( 'ABSPATH' ) || die();

class ELMPATH_weForms extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-weforms';
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
			'form_id',
			[
				'label'   => esc_html__( 'Select Form', 'element-path' ),
				'type'    => Controls_Manager::SELECT,
				'options' => $this->elmpath_get_post_type( 'wpuf_contact_form' ),
			]
		);

		$this->end_controls_section();

	}

}
