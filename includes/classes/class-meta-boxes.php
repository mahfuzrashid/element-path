<?php
/**
 * Metaboxes Class
 */


class ELMPATH_Meta_boxes {


	/**
	 * ELMPATH_Meta_boxes constructor.
	 */
	function __construct() {

		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_meta_data' ) );
		add_action( 'wp_ajax_add_social_item', array( $this, 'add_social_item' ) );
	}


	/**
	 * Return the html content through ajax call
	 */
	function add_social_item() {
		wp_send_json_success( $this->get_team_social_item() );
	}


	/**
	 * Return team social icon single item html content
	 *
	 * @param false $unique_id
	 * @param array $args
	 *
	 * @return string
	 */
	function get_team_social_item( $unique_id = false, $args = array() ) {

		$unique_id  = empty( $unique_id ) || ! $unique_id ? time() : $unique_id;
		$args       = ! is_array( $args ) ? array() : $args;
		$icon_class = elmpath()->get_settings_atts( 'icon', '', $args );
		$icon_url   = elmpath()->get_settings_atts( 'url', '', $args );

		ob_start();

		// Icon class selection
		printf( '<label>%s<input type="text" name="team_social[%s][icon]" placeholder="%s" value="%s"></label>',
			esc_html__( 'Icon Class', 'element-path' ), $unique_id, esc_attr( 'fa fa-facebook' ), $icon_class
		);

		// Profile URL Selection
		printf( '<label>%s<input type="text" name="team_social[%s][url]" placeholder="%s" value="%s"></label>',
			esc_html__( 'Profile URL', 'element-path' ), $unique_id, esc_url( 'https://facebook.com/my-username', 'element-path' ), $icon_url
		);

		// Control Icons
		printf( '<div class="controls"><span class="dashicons dashicons-move"></span><span class="dashicons dashicons-trash"></span></div>' );


		return sprintf( '<div class="elmpath-social-single">%s</div>', ob_get_clean() );
	}


	/**
	 * Return team meta data as array
	 *
	 * @return array[]
	 */
	function get_team_meta() {
		return array(
			array(
				'id'          => '_text',
				'title'       => esc_html__( 'Text', 'wp-poll' ),
				'placeholder' => esc_html__( 'Text here', 'wp-poll' ),
				'details'     => esc_html__( 'Text here', 'wp-poll' ),
				'type'        => 'text',
			),
			array(
				'id'      => '_image',
				'title'   => esc_html__( 'Image', 'wp-poll' ),
				'details' => esc_html__( 'Image hre', 'wp-poll' ),
				'type'    => 'media',
			),
		);
	}


	/**
	 * Render team data box
	 *
	 * @param $post
	 */
	function render_team_meta( WP_Post $post ) {

		wp_nonce_field( 'team_meta_nonce', 'team_meta_nonce_val' );

		// Rendering team meta fields
		elmpath()->PB_Settings()->generate_fields( array( array( 'options' => $this->get_team_meta() ) ), $post->ID );

		// Retrieving social items and print them
		$team_social  = elmpath()->get_meta( 'team_social', array() );
		$social_items = array_map( function ( $social_item, $social_item_id ) {
			return $this->get_team_social_item( $social_item_id, $social_item );
		}, $team_social, array_keys( $team_social ) );

		// Adding social profile items
		printf( '<div class="wps-field elmpath-team-profiles"><label class="wps-field-inline wps-field-title">%s</label><div class="wps-field-inline wps-field-inputs">%s<div class="elmpath-social-items">%s</div></div></div>',
			esc_html__( 'Social Profiles', 'element-path' ),
			sprintf( '<div class="button-primary">%s</div>', esc_html__( 'Add Social Profile', 'element-path' ) ),
			implode( '', $social_items )
		);
	}


	/**
	 * Saving meta data
	 *
	 * @param $post_id
	 */
	function save_meta_data( $post_id ) {

        $posted_data = sanitize_text_field( serialize( $_POST ) );
        $posted_data = unserialize( $posted_data );
		$nonce       = sanitize_text_field(elmpath()->get_settings_atts( 'team_meta_nonce_val', '', $posted_data ));

		if ( wp_verify_nonce( $nonce, 'team_meta_nonce' ) ) {
			// save here
			foreach ( $this->get_team_meta() as $meta_field ) {

				$field_id = elmpath()->get_settings_atts( 'id', '', $meta_field );
				$meta_val = elmpath()->get_settings_atts( $field_id, '', $posted_data );

				update_post_meta( $post_id, $field_id, $meta_val );
			}

			// Saving profile meta items
			$team_social = elmpath()->get_settings_atts( 'team_social', array(), $posted_data );
			update_post_meta( $post_id, 'team_social', $team_social );
		}
	}


	/**
	 * Add meta box
	 *
	 * @param $post_type
	 */
	function add_meta_boxes( $post_type ) {
		if ( in_array( $post_type, array( 'team' ) ) ) {
			add_meta_box( 'team-metabox', esc_html__( 'Team Data', 'element-path' ), array( $this, 'render_team_meta' ), $post_type, 'normal', 'high' );
		}
	}
}

new ELMPATH_Meta_boxes();