<?php
/**
 * Widget Render: Tutor LMS
 *
 * @package widgets/tutor/views/template-1.php
 * @copyright Pluginbazar 2020
 */

global $product;

use Elementor\Icons_Manager;

$unique_id = uniqid();

$style         = elmpath()->get_settings_atts( 'style', '1' );
$items_per_row = elmpath()->get_settings_atts( 'items_per_row', '3' );
$content_type  = elmpath()->get_settings_atts( 'content_type', 'by_latest_courses' );

if ( $content_type == 'by_courses_category' ) {
	$courses_ids = get_posts( array(
		'posts_per_page' => -1,
		'offset'         => 0,
		'orderby'        => 'post_date',
		'fields'         => 'ids',
		'order'          => 'DESC',
		'post_type'      => 'courses',
		'post_status'    => 'publish',
		'tax_query'      => array(
			array(
				'taxonomy' => 'course-category',
				'field'    => 'term_id',
				'terms'    => elmpath()->get_settings_atts( '_category' ),
			),
		)
	) );
} elseif ( $content_type == 'by_courses_tags' ) {
	$courses_ids = get_posts( array(
		'post_type'      => 'courses',
		'posts_per_page' => - 1,
		'fields'         => 'ids',
		'tax_query'      => array(
			array(
				'taxonomy' => 'course-tag',
				'field'    => 'term_id',
				'terms'    => elmpath()->get_settings_atts( 'tag_ids' ),
			),
		)
	) );
} elseif ( $content_type == 'by_latest_courses' ) {
	$courses_ids = get_posts( array(
		'posts_per_page' => - 1,
		'offset'         => 0,
		'orderby'        => 'post_date',
		'fields'         => 'ids',
		'order'          => 'DESC',
		'post_type'      => 'courses',
		'post_status'    => 'publish'
	) );

} elseif ( $content_type == 'by_courses' ) {
	$courses_ids = elmpath()->get_settings_atts( 'courses_ids' );
} elseif ( $content_type == 'by_custom' ) {
	$courses_ids = explode( ',', elmpath()->get_settings_atts( 'custom_courses_ids' ) );
} else {
	$courses_ids = get_posts( array(
		'posts_per_page' => - 1,
		'offset'         => 0,
		'orderby'        => 'post_date',
		'fields'         => 'ids',
		'order'          => 'DESC',
		'post_type'      => 'courses',
		'post_status'    => 'publish'
	) );

}

$courses_ids = array_unique( $courses_ids );
$length      = elmpath()->get_settings_atts( 'posts_per_page', count( $courses_ids ) );
$courses_ids = array_slice( $courses_ids, 0, $length );


?>

<div class="elmpath-tutor-<?php echo esc_attr( $style ); ?>">

    <div class="pb-row">
		<?php foreach ( $courses_ids as $index => $courses_id ) :

			global $post;

			$post = get_post( $courses_id );

			setup_postdata( $post );

			?>

            <div class="pb-col-lg-<?php echo esc_attr( $items_per_row ); ?>">

                <div class="<?php tutor_course_loop_wrap_classes(); ?>">
	                <?php tutor_course_loop_header(); ?>

                    <div class="tutor-loop-course-container">
		                <?php tutor_course_loop_rating(); ?>
		                <?php tutor_course_loop_title(); ?>
		                <?php tutor_course_loop_meta(); ?>
                    </div>
	                <?php tutor_course_loop_footer(); ?>
                </div>
            </div>
			<?php wp_reset_postdata();
		endforeach; ?>
    </div>
</div>

