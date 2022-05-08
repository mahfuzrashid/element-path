<?php
/**
 * Widget Render: Charts
 *
 * @package widgets/charts/views/template-1.php
 * @copyright Pluginbazar 2020
 */


$options     = array();
$series_data = array();
$unique_id   = uniqid();
$chart_type  = elmpath()->get_settings_atts( 'chart_type', 'line' );
$chart_data  =  elmpath()->get_settings_atts( 'chart_data' );

foreach ( $chart_data as $data ) {

	$data_label = isset( $data['data_label'] ) ? $data['data_label'] : '';
	$data_value = isset( $data['data_value'] ) ? $data['data_value'] : '';

	if ( ! empty( $data_label ) && ! empty( $data_value ) ) {
		$series_data[] = array(
			'x' => $data_label,
			'y' => $data_value,
		);
	}
}

$options['chart']['type'] = $chart_type;
$options['series'][]      = array(
	'name' => elmpath()->get_settings_atts( 'series_label' ),
	'data' => $series_data,
);

$options = json_encode( $options );
$options = preg_replace( '/"([^"]+)"\s*:\s*/', '$1:', $options );

?>

<div id="elmpath-charts-<?php echo esc_attr( $unique_id ); ?>"
     class="elmpath-charts-<?php echo esc_attr( $chart_type ); ?>">
</div>

<script>
    let chart_<?php echo esc_attr( $unique_id ); ?> = new ApexCharts(document.querySelector("#elmpath-charts-<?php echo esc_attr( $unique_id ); ?>"), <?php echo $options; ?>);
    chart_<?php echo esc_attr( $unique_id ); ?>.render();
</script>