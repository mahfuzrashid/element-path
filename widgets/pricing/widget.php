<?php
/**
 * Widget: Pricing
 */

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Repeater;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Utils;

defined( 'ABSPATH' ) || die();

class ELMPATH_Pricing extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-pricing';
	}

	/**
	 * Get dependent stylesheet
	 */
	public function get_style_depends() {
		return [ 'elmpath-pricing' ];
	}

	/**
	 * Register content related controls
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Pricing', 'element-path' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'choose_media',
			[
				'label'     => esc_html__( 'Select Icon', 'element-path' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'choose_icon',
				'options'   => [
					'choose_icon'  => esc_html__( 'Icon', 'element-path' ),
					'choose_image' => esc_html__( 'Image', 'element-path' ),
				],
				'condition' => [
					'style' => array( '1', '2', '3' ),
				],
			]
		);

		$this->add_control(
			'_image',
			[
				'label'     => esc_html__( 'Choose Image', 'element-path' ),
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'default'   => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'choose_media' => 'choose_image',
					'style'        => array( '1', '2', '3' )
				],
			]
		);

		$this->add_control(
			'_icon',
			[
				'label'            => esc_html__( 'Choose Icon', 'element-path' ),
				'type'             => Controls_Manager::ICONS,
				'fa4compatibility' => 'fa4_icon',
				'condition'        => [
					'choose_media' => 'choose_icon',
					'style'        => array( '1', '2', '3' )
				],
			]
		);

		$this->add_control(
			'highlighted_text',
			[
				'label'       => esc_html__( 'Highlighted Text', 'element-path' ),
				'placeholder' => esc_html__( 'Basic Plan', 'element-path' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'sale_price',
			[
				'label' => esc_html__( 'Sale Price', 'element-path' ),
				'type'  => Controls_Manager::NUMBER,
			]
		);

		$this->add_control(
			'regular_price',
			[
				'label' => esc_html__( 'Regular Price', 'element-path' ),
				'type'  => Controls_Manager::NUMBER,
			]
		);

		$this->add_control(
			'currency',
			[
				'label' => esc_html__( 'Currency', 'element-path' ),
				'type'  => Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'short_desc',
			[
				'label' => esc_html__( 'Short Description', 'element-path' ),
				'type'  => Controls_Manager::TEXTAREA,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'feature_text',
			[
				'label' => esc_html__( 'Title', 'element-path' ),
				'type'  => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'feature_in',
			[
				'label'        => esc_html__( 'Feature in', 'element-path' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'element-path' ),
				'label_off'    => esc_html__( 'No', 'element-path' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'features',
			[
				'type'    => Controls_Manager::REPEATER,
				'fields'  => array_values( $repeater->get_controls() ),
				'default' => [
					[
						'feature_text' => 'Access to mobile app',
						'feature_in'   => 'yes',
					],
					[
						'feature_text' => 'Responsive Design',
						'feature_in'   => 'yes',
					],
					[
						'feature_text' => 'Unlimited MySQL Databases',
						'feature_in'   => 'no',
					],
					[
						'feature_text' => 'Unlimited Email',
						'feature_in'   => 'no',
					],
				],

				'title_field' => '{{{ feature_text }}}',
			]
		);


		$this->add_control(
			'btn_text',
			[
				'label'       => esc_html__( 'Button Text', 'element-path' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'btn_url',
			[
				'label'         => esc_html__( 'Button URL', 'element-path' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => esc_html__( 'https://your-link.com', 'element-path' ),
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_testimonial_style',
			[
				'label' => esc_html__( 'Global Style', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_common_controls();

		$this->add_control(
			'_featured',
			[
				'label'        => esc_html__( 'Is Featured?', 'element-path' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'element-path' ),
				'label_off'    => esc_html__( 'No', 'element-path' ),
				'return_value' => 'yes',
				'default'      => 'no',
			]
		);

		$this->add_control(
			'primary_color',
			[
				'label'     => esc_html__( 'Primary Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-pricing-1.is-featured' => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .elmpath-pricing-4 .pricing-footer > a' => 'border-color: {{VALUE}};color: {{VALUE}};',
					'{{WRAPPER}} .elmpath-pricing-1 .pricing-footer > a, 
					{{WRAPPER}} .elmpath-pricing-2 .pricing-footer > a, 
					{{WRAPPER}} .elmpath-pricing-3.is-featured:before, 
					{{WRAPPER}} .elmpath-pricing-4 .pricing-head, 
					{{WRAPPER}} .elmpath-pricing-5:hover .pricing-head, 
					{{WRAPPER}} .elmpath-pricing-5.is-featured .pricing-head, 
					{{WRAPPER}} .elmpath-pricing-5 .pricing-footer > a, 
					{{WRAPPER}} .elmpath-pricing-4 .pricing-footer > a:hover, 
					{{WRAPPER}} .elmpath-pricing-4 .pricing-footer > a:focus, 
					{{WRAPPER}} .elmpath-pricing-3 .pricing-footer > a:hover' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'style' => [ '1', '2', '3', '4', '5' ],
				],
			]
		);

		$this->add_control(
			'secondary_color',
			[
				'label'     => esc_html__( 'Secondary Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-pricing-1 .pricing-footer > a:hover, 
					{{WRAPPER}} .elmpath-pricing-2 .pricing-footer > a:hover, 
					{{WRAPPER}} .elmpath-pricing-3 .pricing-footer > a' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .elmpath-pricing-4 .pricing-footer > a:hover, 
					{{WRAPPER}} .elmpath-pricing-4 .pricing-footer > a:focus' => 'color: {{VALUE}};',
				],
				'condition' => [
					'style' => [ '1', '2', '3', '4', '5' ],
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'background',
				'label'     => esc_html__( 'Gradient Color', 'element-path' ),
				'types'     => [ 'gradient' ],
				'selector'  => '{{WRAPPER}} .elmpath-pricing-3:after, {{WRAPPER}} .elmpath-pricing-3 .pricing-duration,
				 {{WRAPPER}} .elmpath-pricing-3 .pricing-duration:before',
				'condition' => [
					'style' => [ '3' ],
				],
			]
		);

		$this->end_controls_section();

	}

}
