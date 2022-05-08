<?php
/**
 * Widget Render: Charts
 *
 * @Style Pie | Donut
 *
 * @package widgets/charts/views/template-2.php
 * @copyright Pluginbazar 2020
 */




$options     = array();
$data_labels = array();
$data_series = array();
$unique_id   = uniqid();
$chart_type  = elmpath()->get_settings_atts( 'chart_type', 'line' );
$chart_data  =  elmpath()->get_settings_atts( 'chart_data' );

foreach ( $chart_data as $data ) {

	if ( isset( $data['data_label'] ) && ! empty( $data['data_label'] ) ) {
		$data_labels[] = $data['data_label'];
	}

	if ( isset( $data['data_value'] ) && ! empty( $data['data_value'] ) ) {
		$data_series[] = (int) $data['data_value'];
	}
}


$options['chart']['type'] = $chart_type;
$options['labels']        = $data_labels;
$options['series']        = $data_series;

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