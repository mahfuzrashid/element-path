<?php
/**
 * Widget: Social Profile
 */

use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;

defined( 'ABSPATH' ) || die();

class ELMPATH_Social_Profile extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-social-profile';
	}

	/**
	 * Get dependent stylesheet
	 */
	public function get_style_depends() {
		return [ 'elmpath-social-profile' ];
	}

	/**
	 * Register content related controls
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'social_content_section',
			[
				'label' => esc_html__( 'Social Items', 'element-path' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$repeater = new Repeater();

		$repeater->add_control(
			'choose_media',
			[
				'label'   => esc_html__( 'Select Icon', 'element-path' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'choose_icon',
				'options' => [
					'choose_icon'  => esc_html__( 'Icon', 'element-path' ),
					'choose_image' => esc_html__( 'Image', 'element-path' ),
				],
			]
		);

		$repeater->add_control(
			'_image',
			[
				'label'     => esc_html__( 'Choose Image', 'element-path' ),
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'default'   => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'choose_media' => 'choose_image',
				],
			]
		);

		$repeater->add_control(
			'_icon',
			[
				'label'            => esc_html__( 'Choose Icon', 'element-path' ),
				'type'             => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'condition'        => [
					'choose_media' => 'choose_icon',
				],
			]
		);

		$repeater->add_control(
			'_label',
			[
				'label'       => esc_html__( 'Label', 'element-path' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'social_url',
			[
				'label' => esc_html__( 'Custom Link', 'element-path' ),
				'type'  => \Elementor\Controls_Manager::URL,
			]
		);

		$repeater->add_control(
			'_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
			]
		);

		$this->add_control(
			'social_items',
			[
				'label'       => esc_html__( 'Content', 'element-path' ),
				'show_label'  => false,
				'type'        => Controls_Manager::REPEATER,
				'title_field' => '{{ _label }}',
				'dynamic'     => [
					'active' => true,
				],
				'default'     => [
					[
						'_label'   => esc_html__( 'Facebook', 'element-path' ),
						'btn_link' => '#'
					],
					[
						'_label'   => esc_html__( 'Twitter', 'element-path' ),
						'btn_link' => '#',
					],
					[
						'_label'   => esc_html__( 'Linkedin', 'element-path' ),
						'btn_link' => '#',
					],
				],
				'fields'      => $repeater->get_controls(),
			]
		);


		$this->end_controls_section();


		$this->start_controls_section(
			'section_social_style',
			[
				'label' => esc_html__( 'Global Style', 'element-path' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_common_controls();

		$this->add_control(
			'primary',
			[
				'label'     => esc_html__( 'Primary Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
			]
		);

		$this->add_control(
			'secondary',
			[
				'label'     => esc_html__( 'Secondary Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'condition'        => [
					'style' => array( '1', '3', '4', '5' ),
				],
			]
		);

		$this->end_controls_section();

	}

}
