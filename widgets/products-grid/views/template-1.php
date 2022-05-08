<?php
/**
 * Widget Render: Timeline
 *
 * @package widgets/timeline/views/template-1.php
 * @copyright Pluginbazar 2020
 */

global $product;

use Elementor\Icons_Manager;

$unique_id = uniqid();

$style                       = elmpath()->get_settings_atts( 'style', '1' );
$number                      = elmpath()->get_settings_atts( 'posts_per_page', '-1' );
$items_per_row               = elmpath()->get_settings_atts( 'items_per_row', '6' );
$show                        = sanitize_title( elmpath()->get_settings_atts( 'show' ) );
$orderby                     = sanitize_title( elmpath()->get_settings_atts( 'orderby' ) );
$order                       = sanitize_title( elmpath()->get_settings_atts( 'order' ) );
$hide_free                   = elmpath()->get_settings_atts( 'hide_free' );
$show_hidden                 = elmpath()->get_settings_atts( 'show_hidden' );
$product_visibility_term_ids = wc_get_product_visibility_term_ids();

$query_args = array(
	'posts_per_page' => $number,
	'post_status'    => 'publish',
	'post_type'      => 'product',
	'no_found_rows'  => 1,
	'order'          => $order,
	'meta_query'     => array(),
	'tax_query'      => array(
		'relation' => 'AND',
	),
); // WPCS: slow query ok.

if ( empty( $show_hidden ) ) {
	$query_args['tax_query'][] = array(
		'taxonomy' => 'product_visibility',
		'field'    => 'term_taxonomy_id',
		'terms'    => is_search() ? $product_visibility_term_ids['exclude-from-search'] : $product_visibility_term_ids['exclude-from-catalog'],
		'operator' => 'NOT IN',
	);
	$query_args['post_parent'] = 0;
}

if ( ! empty( $hide_free ) ) {
	$query_args['meta_query'][] = array(
		'key'     => '_price',
		'value'   => 0,
		'compare' => '>',
		'type'    => 'DECIMAL',
	);
}

if ( 'yes' === get_option( 'woocommerce_hide_out_of_stock_items' ) ) {
	$query_args['tax_query'][] = array(
		array(
			'taxonomy' => 'product_visibility',
			'field'    => 'term_taxonomy_id',
			'terms'    => $product_visibility_term_ids['outofstock'],
			'operator' => 'NOT IN',
		),
	); // WPCS: slow query ok.
}

switch ( $show ) {
	case 'featured':
		$query_args['tax_query'][] = array(
			'taxonomy' => 'product_visibility',
			'field'    => 'term_taxonomy_id',
			'terms'    => $product_visibility_term_ids['featured'],
		);
		break;
	case 'onsale':
		$product_ids_on_sale    = wc_get_product_ids_on_sale();
		$product_ids_on_sale[]  = 0;
		$query_args['post__in'] = $product_ids_on_sale;
		break;
}

switch ( $orderby ) {
	case 'price':
		$query_args['meta_key'] = '_price'; // WPCS: slow query ok.
		$query_args['orderby']  = 'meta_value_num';
		break;
	case 'rand':
		$query_args['orderby'] = 'rand';
		break;
	case 'sales':
		$query_args['meta_key'] = 'total_sales'; // WPCS: slow query ok.
		$query_args['orderby']  = 'meta_value_num';
		break;
	default:
		$query_args['orderby'] = 'date';
}

$products = wc_get_products( $query_args );


?>


<div id="elmpath-products-<?php echo esc_attr( $unique_id ); ?>"
     class="elmpath-products-<?php echo esc_attr( $style ); ?>">

    <div class="pb-row">
		<?php foreach ( $products as $index => $product_id ) :

			$product = wc_get_product( $product_id );

			$product_image = $product->get_image( 'full' );

			$product_price = ! empty( $product->get_price() ) ? wp_kses_post( $product->get_price_html() ) : esc_html__( 'Free', 'element-path' );

			?>

            <div class="pb-col-lg-<?php echo esc_attr( $items_per_row ); ?> pb-col-md-6">
                <div class="elmpath-product-item">

					<?php if ( ! empty( $product_image ) ) : ?>
                        <div class="product-image">
                            <a href="<?php echo esc_url( $product->get_permalink() ); ?>">
								<?php echo wp_kses_post( $product_image ); ?>
                            </a>
                        </div>
					<?php endif; ?>

                    <div class="product-body">
                        <h3 class="product-title">
                            <a href="<?php echo esc_url( $product->get_permalink() ); ?>"><?php echo esc_html( $product->get_title() ); ?></a>
                        </h3>
                        <p class="short-desc">
							<?php echo esc_html( $product->get_short_description() ); ?>
                        </p>
                        <div class="price-wrap">
							<?php echo wp_kses_post( $product_price ); ?>
                        </div>
                        <div class="product-button">
                            <a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                                    <g transform="translate(-1.076)">
                                        <path d="M24.917,8.559a.912.912,0,0,0-.747-.388H21.906a2.66,2.66,0,0,0-.163-2.129,2.728,2.728,0,0,0-1.862-1.4V2.706A2.667,2.667,0,0,0,19.028.754,2.75,2.75,0,0,0,17.137,0H15.449a2.751,2.751,0,0,0-1.892.754A2.658,2.658,0,0,0,12.7,2.706v1.94a2.728,2.728,0,0,0-1.862,1.4,2.659,2.659,0,0,0-.163,2.129H8.429L6.386,5.934a1.216,1.216,0,0,0-.9-.395h-3.2a1.192,1.192,0,1,0,0,2.383H4.95L6.6,9.727l3.492,8.953a.906.906,0,0,0,.846.573h9.608a.9.9,0,0,0,.846-.573l3.625-9.295A.882.882,0,0,0,24.917,8.559ZM12.767,7.032a.574.574,0,0,1,.508-.3h1.6V2.706a.57.57,0,0,1,.573-.565h1.69a.57.57,0,0,1,.573.565V6.728h1.6a.574.574,0,0,1,.508.3.556.556,0,0,1-.038.585l-3.017,4.265a.577.577,0,0,1-.47.241h0a.577.577,0,0,1-.47-.241L12.805,7.617A.556.556,0,0,1,12.767,7.032Z"
                                              fill="#fff"></path>
                                        <path d="M193.852,413.565a1.878,1.878,0,1,0,1.878,1.878A1.878,1.878,0,0,0,193.852,413.565Z"
                                              transform="translate(-181.505 -393.322)" fill="#fff"></path>
                                        <path d="M328.356,413.565a1.878,1.878,0,1,0,1.878,1.878A1.878,1.878,0,0,0,328.356,413.565Z"
                                              transform="translate(-309.391 -393.322)" fill="#fff"></path>
                                    </g>
                                </svg>
                                <span class="cart-tooltip"><?php echo esc_html( $product->add_to_cart_text() ); ?></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

		<?php endforeach; ?>
    </div>
</div>

