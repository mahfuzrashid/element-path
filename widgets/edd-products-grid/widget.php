<?php
/**
 * Widget: EDD Products Grid
 */

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

defined( 'ABSPATH' ) || die();

class ELMPATH_EDD_Products_Grid extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-edd-products-grid';
	}

	/**
	 * Get dependent stylesheet
	 */
	public function get_style_depends() {
		return [ 'elmpath-edd-products' ];
	}

	/**
	 * Get dependent scripts
	 */
	public function get_script_depends() {
		return [ 'elmpath-accordion' ];
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
				'default' => 'by_latest_products',
				'options' => array(
					'by_latest_products'   => esc_html__( 'By Latest Products', 'element-path' ),
					'by_products_category' => esc_html__( 'By Products Category', 'element-path' ),
					'by_products_tags'     => esc_html__( 'By Products Tags', 'element-path' ),
					'by_products'          => esc_html__( 'By Products', 'element-path' ),
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
				'options'     => $this->elmpath_get_taxonomies( 'download_category' ),
				'condition'   => [
					'content_type' => 'by_products_category',
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
				'options'     => $this->elmpath_get_taxonomies( 'download_tag' ),
				'condition'   => [
					'content_type' => 'by_products_tags',
				],
			]
		);

		$this->add_control(
			'product_ids',
			[
				'label'       => esc_html__( 'Products List', 'element-path' ),
				'type'        => Controls_Manager::SELECT2,
				'multiple'    => true,
				'label_block' => true,
				'options'     => $this->elmpath_get_post_type( 'download' ),
				'condition'   => [
					'content_type' => 'by_products',
				],
			]
		);

		$this->add_control(
			'custom_product_ids',
			[
				'label'       => esc_html__( 'Custom Products IDs', 'element-path' ),
				'description'       => esc_html__( 'Add any product ids of EDD download post types. If multiple use comma to separate them. Example: 1023,201,239', 'element-path' ),
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
					'{{WRAPPER}} [class*="elmpath-edd-products"] .edd-product-title a' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} [class*="elmpath-edd-products"] .edd-product-title a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'typography_title',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} [class*="elmpath-edd-products"] .edd-product-title',
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
					'{{WRAPPER}} [class*="elmpath-edd-products"] .edd-product-content' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => esc_html__( 'Typography', 'element-path' ),
				'name'     => 'typography_desc',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} [class*="elmpath-edd-products"] .edd-product-content',
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
					'{{WRAPPER}} [class*="elmpath-edd-products"] .edd-product-item .edd-submit.button' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'btn_background',
				'label'    => esc_html__( 'Background', 'element-path' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} [class*="elmpath-edd-products"] .edd-product-item .edd-submit.button, 
				{{WRAPPER}} [class*="elmpath-edd-products"] .edd_price',
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
					'{{WRAPPER}} [class*="elmpath-edd-products"] .edd-product-item .edd-submit.button:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'btn_hover_background',
				'label'    => esc_html__( 'Hover Background', 'element-path' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} [class*="elmpath-edd-products"] .edd-product-item .edd-submit.button:hover',
			]
		);

		$this->add_control(
			'rc_bg_color',
			[
				'label'     => esc_html__( 'Radio/Checkbox Background', 'element-path' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} [class*="elmpath-edd-products"] .edd_price_options input:hover:before, {{WRAPPER}} [class*="elmpath-edd-products"] .edd_price_options input:checked:before' => 'background-color: {{VALUE}};border-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

	}

}
