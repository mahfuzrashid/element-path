<?php
/**
 * Widget Render: Marquee
 *
 * @package widgets/marquee/views/template-1.php
 * @copyright Pluginbazar 2020
 */

$unique_id    = uniqid();
$style        = elmpath()->get_settings_atts( 'style' );
$content_type = elmpath()->get_settings_atts( 'content_type', 'by_latest_posts' );
$_label        = elmpath()->get_settings_atts( '_label', esc_html__( 'Latest News', 'element-plus' ) );

if ( $content_type == 'by_posts_category' ) {
	$posts_ids = get_posts( array(
		'posts_per_page' => - 1,
		'offset'         => 0,
		'orderby'        => 'post_date',
		'fields'         => 'ids',
		'order'          => 'DESC',
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'tax_query'      => array(
			array(
				'taxonomy' => 'category',
				'field'    => 'term_id',
				'terms'    => elmpath()->get_settings_atts( '_category' ),
			),
		)
	) );
} elseif ( $content_type == 'by_posts_tags' ) {
	$posts_ids = get_posts( array(
		'post_type'      => 'post',
		'posts_per_page' => - 1,
		'fields'         => 'ids',
		'tax_query'      => array(
			array(
				'taxonomy' => 'post_tag',
				'field'    => 'term_id',
				'terms'    => elmpath()->get_settings_atts( 'tag_ids' ),
			),
		)
	) );
} elseif ( $content_type == 'by_latest_posts' ) {
	$posts_ids = get_posts( array(
		'posts_per_page' => - 1,
		'offset'         => 0,
		'orderby'        => 'post_date',
		'fields'         => 'ids',
		'order'          => 'DESC',
		'post_type'      => 'post',
		'post_status'    => 'publish'
	) );

} elseif ( $content_type == 'by_posts' ) {
	$posts_ids = elmpath()->get_settings_atts( 'posts_ids' );
} elseif ( $content_type == 'by_custom' ) {
	$posts_ids = explode( ',', elmpath()->get_settings_atts( 'custom_posts_ids' ) );
} else {
	$posts_ids = get_posts( array(
		'posts_per_page' => - 1,
		'offset'         => 0,
		'orderby'        => 'post_date',
		'fields'         => 'ids',
		'order'          => 'DESC',
		'post_type'      => 'post',
		'post_status'    => 'publish'
	) );

}

$posts_ids = array_unique( $posts_ids );
$length    = elmpath()->get_settings_atts( 'posts_per_page', count( $posts_ids ) );
$posts_ids = array_slice( $posts_ids, 0, $length );


?>

<div id="elmpath-marquee<?php echo esc_attr( $unique_id ); ?>"
     class="elmpath-marquee elmpath-marquee-<?php echo esc_attr( $style ); ?>">
    <span class="elmpath-marquee-label"><?php echo esc_html( $_label ); ?></span>
    <ul class="elmpath-marquee-wrap">
		<?php foreach ( $posts_ids as $posts_id ) : ?>
            <li class="elmpath-marquee-single">
                <a href="<?php echo esc_url( get_the_permalink( $posts_id ) ); ?>"><?php echo esc_html( get_the_title( $posts_id ) ); ?></a>
            </li>
		<?php endforeach; ?>
    </ul>
</div>