<?php
/**
 * Widget: Charts
 */

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;

defined( 'ABSPATH' ) || die();

class ELMPATH_Charts extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-charts';
	}

	/**
	 * Register content related controls
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Icon', 'element-path' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_common_controls();

		$this->add_control(
			'chart_type',
			[
				'label'   => esc_html__( 'Select Type', 'element-path' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'line',
				'options' => [
					'line'  => esc_html__( 'Line', 'element-path' ),
					'bar'   => esc_html__( 'Bar / Column', 'element-path' ),
					'pie'   => esc_html__( 'Pie', 'element-path' ),
					'donut' => esc_html__( 'Donut', 'element-path' ),
				],
			]
		);

		$this->add_control(
			'series_label',
			[
				'label'   => esc_html__( 'Data Label', 'element-path' ),
				'type'    => Controls_Manager::TEXT,
				'condition' => [
					'style' => [ 'line', 'bar' ],
				],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'data_label', [
				'label'       => esc_html__( 'Label', 'element-path' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'data_value', [
				'label'       => esc_html__( 'Value', 'element-path' ),
				'type'        => Controls_Manager::NUMBER,
				'label_block' => true,
			]
		);

		$this->add_control(
			'chart_data',
			[
				'label'       => esc_html__( 'Chart Data', 'element-path' ),
				'show_label'  => false,
				'type'        => Controls_Manager::REPEATER,
				'separator'   => 'before',
				'title_field' => '{{ data_label }}',
				'dynamic'     => [
					'active' => true,
				],
				'default'     => [
					[
						'data_label' => esc_html__( 'Leo Messi', 'element-path' ),
						'data_value' => 500,
					],
					[
						'data_label' => esc_html__( 'Chris Ronaldo', 'element-path' ),
						'data_value' => 800,
					],
					[
						'data_label' => esc_html__( 'EM Buppe', 'element-path' ),
						'data_value' => 380,
					],
				],
				'fields'      => $repeater->get_controls(),
			]
		);

		$this->end_controls_section();

	}

}
