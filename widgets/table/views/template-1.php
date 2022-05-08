<?php
/**
 * Widget Render: Tablepress Table
 *
 * @package widgets/table/views/template-1.php
 * @copyright Pluginbazar 2020
 */

$unique_id     = uniqid();
$table_post_id = elmpath()->get_settings_atts( '_table' );

$tablepress_tables = json_decode( elmpath()->get_option( 'tablepress_tables' ), true );

$tables    = isset( $tablepress_tables['table_post'] ) ? (array) $tablepress_tables['table_post'] : array();
$table_id  = array_search( $table_post_id, $tables );
$shortcode = sprintf( '[table id="%s"/]', $table_id );

printf( '<div class="elmpath-table">%s</div>', do_shortcode( $shortcode ) );
