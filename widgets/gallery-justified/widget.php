<?php
/**
 * Widget: Gallery Justified
 */

use Elementor\Controls_Manager;
use Elementor\Repeater;

defined( 'ABSPATH' ) || die();

class ELMPATH_Gallery_Justified extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-gallery-justified';
	}

	/**
	 * Get dependent stylesheet
	 */
	public function get_style_depends() {
		return [ 'elmpath-gallery-justified' ];
	}

	/**
	 * Get dependent scripts
	 */
	public function get_script_depends() {
		return [ 'justifiedGallery', 'elmpath-gallery-justified' ];
	}

	/**
	 * Register content related controls
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'section_gallery_content',
			[
				'label' => esc_html__( 'Content', 'element-path' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
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

		$this->add_control(
			'gallery',
			[
				'label'       => esc_html__( 'Gallery', 'element-path' ),
				'show_label'  => false,
				'type'        => Controls_Manager::REPEATER,
				'separator'   => 'before',
				'title_field' => '{{ title }}',
				'dynamic'     => [
					'active' => true,
				],
				'default'     => [
					[
						'title' => esc_html__( 'Gallery Image', 'element-path' ),
					],
				],
				'fields'      => $repeater->get_controls(),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_additional_settings',
			[
				'label' => esc_html__( 'Additional Settings', 'element-path' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'img_height',
			[
				'label' => esc_html__( 'Number', 'element-path' ),
				'type'  => Controls_Manager::NUMBER,
			]
		);

		$this->add_control(
			'margins',
			[
				'label' => esc_html__( 'Gutter Gap', 'element-path' ),
				'type'  => Controls_Manager::NUMBER,
			]
		);

		$this->add_control(
			'last_row',
			[
				'label'   => esc_html__( 'Last Row', 'element-path' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'nojustify',
				'options' => [
					'nojustify' => esc_html__( 'No Justify', 'element-path' ),
					'justify'   => esc_html__( 'Justify', 'element-path' ),
					'hide'      => esc_html__( 'Hide', 'element-path' ),
					'center'    => esc_html__( 'Center', 'element-path' ),
					'right'     => esc_html__( 'Right', 'element-path' ),
				],
			]
		);

		$this->add_control(
			'captions',
			[
				'label'        => esc_html__( 'Captions', 'element-path' ),
				'type'         => Controls_Manager::SWITCHER,
			]
		);

		$this->end_controls_section();

	}
}
