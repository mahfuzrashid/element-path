<?php
/**
 * Widget: Products Carousel
 */

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

defined( 'ABSPATH' ) || die();

class ELMPATH_Products_Carousel extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-products-carousel';
	}

	/**
	 * Get dependent stylesheet
	 */
	public function get_style_depends() {
		return [ 'elmpath-products-grid' ];
	}

	/**
	 * Get dependent scripts
	 */
	public function get_script_depends() {
		return [ 'products-carousel' ];
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
			'posts_per_page',
			[
				'label'       => esc_html__( 'Total Items', 'element-path' ),
				'type'        => Controls_Manager::NUMBER,
				'placeholder' => - 1,
			]
		);

		$this->add_control(
			'show',
			[
				'label'   => esc_html__( 'Display', 'element-path' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					''         => esc_html__( 'All products', 'element-path' ),
					'featured' => esc_html__( 'Featured products', 'element-path' ),
					'onsale'   => esc_html__( 'On-sale products', 'element-path' ),
				],
			]
		);

		$this->add_control(
			'orderby',
			[
				'label'   => esc_html__( 'Order by', 'element-path' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'date'  => esc_html__( 'Date', 'element-path' ),
					'price' => esc_html__( 'Price', 'element-path' ),
					'rand'  => esc_html__( 'Random', 'element-path' ),
					'sales' => esc_html__( 'Sales', 'element-path' ),
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label'   => esc_html__( 'Order by', 'element-path' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'desc',
				'options' => array(
					'asc'  => esc_html__( 'ASC', 'element-path' ),
					'desc' => esc_html__( 'DESC', 'element-path' ),
				),
			]
		);

		$this->add_control(
			'hide_free',
			[
				'label'        => esc_html__( 'Hide Free Products', 'element-path' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'element-path' ),
				'label_off'    => esc_html__( 'Hide', 'element-path' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'show_hidden',
			[
				'label'        => esc_html__( 'Show hidden products', 'element-path' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'element-path' ),
				'label_off'    => esc_html__( 'Hide', 'element-path' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);


		$this->end_controls_section();


		$this->start_controls_section(
			'section_slider_settings',
			[
				'label' => esc_html__( 'Slider Settings', 'element-path' ),
			]
		);

		$slides_to_show = range( 1, 10 );
		$slides_to_show = array_combine( $slides_to_show, $slides_to_show );

		$this->add_responsive_control(
			'slides_to_show',
			[
				'label'              => __( 'Slides to Show', 'elementor' ),
				'type'               => Controls_Manager::SELECT,
				'options'            => [
					                        '' => __( 'Default', 'elementor' ),
				                        ] + $slides_to_show,
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label'   => esc_html__( 'Autoplay', 'element-path' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'autoplay_speed',
			[
				'label'     => esc_html__( 'Autoplay Speed', 'element-path' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 4000,
				'condition' => [
					'autoplay' => 'yes',
				],
			]
		);

		$this->add_control(
			'loop',
			[
				'label'   => esc_html__( 'Loop', 'element-path' ),
				'default' => 'yes',
				'type'    => Controls_Manager::SWITCHER,
			]
		);

		$this->add_control(
			'pauseonhover',
			[
				'label' => esc_html__( 'Pause on Hover', 'element-path' ),
				'type'  => Controls_Manager::SWITCHER,
			]
		);

		$this->add_control(
			'infinite',
			[
				'label'   => esc_html__( 'Infinite Loop', 'element-path' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'speed',
			[
				'label'   => esc_html__( 'Animation Speed', 'element-path' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 500,
			]
		);

		$this->add_control(
			'space_between',
			[
				'label'   => esc_html__( 'Space Between', 'element-path' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 30,
			]
		);

		$this->add_control(
			'observer',
			[
				'label'       => esc_html__( 'Observer', 'element-path' ),
				'description' => esc_html__( 'When you use carousel in any hidden place (in tabs, accordion etc) keep it yes.', 'element-path' ),
				'type'        => Controls_Manager::SWITCHER,
			]
		);

		$this->add_control(
			'centered_slide',
			[
				'label'       => esc_html__( 'Centered Slide', 'element-path' ),
				'type'        => Controls_Manager::SWITCHER,
				'description' => esc_html__( 'If you turn on this option so set column even number for good looking', 'element-path' ),
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'products_grid_style',
			[
				'label' => esc_html__( 'Global', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_common_controls();


		$this->end_controls_section();


		$this->start_controls_section(
			'products_title_style',
			[
				'label' => esc_html__( 'Title', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} [class*="elmpath-products"] .product-title a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'title_hover_color',
			[
				'label'     => esc_html__( 'Hover Color', 'element-path' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} [class*="elmpath-products"] .product-title a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'typography_title',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} [class*="elmpath-products"] .product-title',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'products_desc_style',
			[
				'label' => esc_html__( 'Description', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} [class*="elmpath-products"] .short-desc' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => esc_html__( 'Typography', 'element-path' ),
				'name'     => 'typography_desc',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} [class*="elmpath-products"] .short-desc',
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'products_button_style',
			[
				'label' => esc_html__( 'Button', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'btn_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} [class*="elmpath-products"] .product-button > a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'btn_background',
				'label'    => esc_html__( 'Background', 'element-path' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} [class*="elmpath-products"] .product-button > a',
			]
		);

		$this->add_control(
			'btn_hover_color',
			[
				'label'     => esc_html__( 'Hover Color', 'element-path' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} [class*="elmpath-products"] .product-button > a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'btn_hover_background',
				'label'    => esc_html__( 'Hover Background', 'element-path' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} [class*="elmpath-products"] .product-button > a:hover',
			]
		);

		$this->end_controls_section();

	}

}
