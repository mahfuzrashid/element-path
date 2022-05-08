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

class ELMPATH_Team extends ELMPATH_Widget_base {

	/**
	 * Get element name.
	 */
	public function get_name() {
		return 'elmpath-team';
	}

	/**
	 * Get dependent stylesheet
	 */
	public function get_style_depends() {
		return [ 'elmpath-team' ];
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
			'_image',
			[
				'label'   => esc_html__( 'Choose Image', 'element-path' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'_name',
			[
				'label'       => esc_html__( 'Name', 'element-path' ),
				'placeholder' => esc_html__( 'James Smith', 'element-path' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'designation',
			[
				'label'       => esc_html__( 'Designation', 'element-path' ),
				'placeholder' => esc_html__( 'CEO & Founder', 'element-path' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'tel_no',
			[
				'label'       => esc_html__( 'Tel: Number', 'element-path' ),
				'placeholder' => esc_html__( '+1401201203', 'element-path' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'condition' => [
					'style' => ['1'],
				],
			]
		);

		$this->add_control(
			'email',
			[
				'label'       => esc_html__( 'Enter Email Address', 'element-path' ),
				'placeholder' => esc_html__( 'your@site.com', 'element-path' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'condition' => [
					'style' => ['1'],
				],
			]

		);

		$this->add_control(
			'rating',
			[
				'label'   => esc_html__( 'Rating', 'element-path' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '0',
				'options' => [
					'0'    => esc_html__( 'No Rating', 'element-path' ),
					'1'   => esc_html__( '1', 'element-path' ),
					'1.5' => esc_html__( '1.5', 'element-path' ),
					'2'   => esc_html__( '2', 'element-path' ),
					'2.5' => esc_html__( '2.5', 'element-path' ),
					'3'   => esc_html__( '3', 'element-path' ),
					'3.5' => esc_html__( '3.5', 'element-path' ),
					'4'   => esc_html__( '4', 'element-path' ),
					'4.5' => esc_html__( '4.5', 'element-path' ),
					'5'   => esc_html__( '5', 'element-path' ),
				],
				'condition' => [
					'style' => ['6'],
				],
			]
		);

		$this->add_control(
			'review_ctext',
			[
				'label'       => esc_html__( 'Review Count Text', 'element-path' ),
				'placeholder' => esc_html__( '455+ Review', 'element-path' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'condition' => [
					'style' => ['6'],
				],
			]

		);

		$this->add_control(
			'experience',
			[
				'label'       => esc_html__( 'Experience', 'element-path' ),
				'placeholder' => esc_html__( '12+ Years', 'element-path' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'condition' => [
					'style' => ['6'],
				],
			]

		);

		$this->add_control(
			'_content',
			[
				'label' => esc_html__( 'Short Description', 'element-path' ),
				'type'  => Controls_Manager::TEXTAREA,
				'condition' => [
					'style' => ['1'],
				],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'social_link_title',
			[
				'label'   => esc_html__( 'Title', 'element-path' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Facebook',
			]
		);

		$repeater->add_control(
			'social_link',
			[
				'label'   => esc_html__( 'Link', 'element-path' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( '#', 'element-path' ),
			]
		);

		$repeater->add_control(
			'social_share_icon',
			[
				'label'   => esc_html__( 'Choose Icon', 'element-path' ),
				'type'             => Controls_Manager::ICONS,
				'fa4compatibility' => 'social_icon',
				'default' => [
					'value' => 'fab fa-facebook-f',
					'library' => 'fa-solid',
				],
			]
		);

		$this->add_control(
			'social_link_list',
			[
				'type'    => Controls_Manager::REPEATER,
				'fields'  => array_values( $repeater->get_controls() ),
				'default' => [
					[
						'social_link'        => esc_html__( '#', 'element-path' ),
						'social_share_icon'  => ['value' => 'fab fa-facebook-f', 'library' => 'fa-solid'],
						'social_link_title'  => 'Facebook',
					],
					[
						'social_link'        => esc_html__( '#', 'element-path' ),
						'social_share_icon'  => ['value' => 'fab fa-twitter', 'library' => 'fa-solid'],
						'social_link_title'  => 'Twitter',
					],
					[
						'social_link'        => esc_html__( '#', 'element-path' ),
						'social_share_icon'  => ['value' => 'fab fa-linkedin-in', 'library' => 'fa-solid'],
						'social_link_title'  => 'Linkedin',
					],
				],
				'title_field' => '{{{ social_link_title }}}',
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
			'primary_color',
			[
				'label'     => esc_html__( 'Primary Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-team-5 .elmpath-team-img:after, {{WRAPPER}} .elmpath-team-5 .elmpath-team-social > li > a, {{WRAPPER}} .elmpath-team-6:before, {{WRAPPER}} .elmpath-team-6:after' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'style' => ['4', '5', '6'],
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
				'condition' => [
					'style' => ['4'],
				],
			]
		);

		$this->add_control(
			'divider_color',
			[
				'label'     => esc_html__( 'Divider Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-team .elmpath-team-title-wrap:before' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'style' => ['1'],
				],
			]
		);

		$this->add_control(
			'contact_color',
			[
				'label'     => esc_html__( 'Email/Phone Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-team .elmpath-team-contact > a' => 'color: {{VALUE}};',
				],
				'condition' => [
					'style' => ['1'],
				],
			]
		);

		$this->add_control(
			'overlay_bg',
			[
				'label'     => esc_html__( 'Overlay Background', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-team .elmpath-team-img:before' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'style' => ['1'],
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__('Background', 'element-path' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .elmpath-team-3:before',
				'condition' => [
					'style' => ['3'],
				],
			]
		);

		$this->add_control(
			'social_primary',
			[
				'label'     => esc_html__( 'Social Primary', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-team-social > li > a' => 'color: {{VALUE}};border-color: {{VALUE}};',
					'{{WRAPPER}} .elmpath-team-social > li > a:hover' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'style' => ['1'],
				],
			]
		);

		$this->add_control(
			'social_color',
			[
				'label'     => esc_html__( 'Social Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-team-social > li > a' => 'color: {{VALUE}};',
				],
				'condition' => [
					'style' => ['2'],
				],
			]
		);

		$this->add_control(
			'social_hover_color',
			[
				'label'     => esc_html__( 'Social Hover Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-team-social > li > a:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'style' => ['2'],
				],
			]
		);

		$this->add_control(
			'social_secondary',
			[
				'label'     => esc_html__( 'Social Secondary', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-team-social > li > a:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'style' => ['1'],
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Name', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-team .elmpath-team-name' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'typography_title',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .elmpath-team .elmpath-team-name',
			]
		);

		$this->add_responsive_control(
			'title_margin',
			[
				'label'      => esc_html__( 'Margin', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-team .elmpath-team-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_designation_style',
			[
				'label' => esc_html__( 'Job Title', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'designation_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-team .elmpath-team-designation' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'typography_designation',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .elmpath-team .elmpath-team-designation',
			]
		);

		$this->add_responsive_control(
			'designation_margin',
			[
				'label'      => esc_html__( 'Margin', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-team .elmpath-team-designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_description_style',
			[
				'label' => esc_html__( 'Description', 'element-path' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'style' => '1'
				]
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label'     => esc_html__( 'Color', 'element-path' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elmpath-team .elmpath-team-short-desc' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'typography_desc',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .elmpath-team .elmpath-team-short-desc',
			]
		);

		$this->add_responsive_control(
			'desc_margin',
			[
				'label'      => esc_html__( 'Margin', 'element-path' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .elmpath-team .elmpath-team-short-desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

}
