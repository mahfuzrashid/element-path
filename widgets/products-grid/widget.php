<?php
/**
 * Widget: Products Grid
 */

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

defined( 'ABSPATH' ) || die();

class ELMPATH_Products_Grid extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-products-grid';
	}

	/**
	 * Get dependent stylesheet
	 */
	public function get_style_depends() {
		return [ 'elmpath-products-grid' ];
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
				'name'      => 'btn_background',
				'label'     => esc_html__( 'Background', 'element-path' ),
				'types'     => [ 'classic', 'gradient' ],
				'selector'  => '{{WRAPPER}} [class*="elmpath-products"] .product-button > a',
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
				'name'      => 'btn_hover_background',
				'label'     => esc_html__( 'Hover Background', 'element-path' ),
				'types'     => [ 'classic', 'gradient' ],
				'selector'  => '{{WRAPPER}} [class*="elmpath-products"] .product-button > a:hover',
			]
		);

		$this->end_controls_section();

	}

}
