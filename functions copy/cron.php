<?php 

// cron every 10 minutes

add_filter( 'cron_schedules', 'every_ten_minutes' );
function every_ten_minutes( $schedules ) {
	$schedules['ten_minutes'] = array(
		'interval' => 600,
		'display'  => esc_html__( 'Every ten minutes' ),
	);
	return $schedules;
}

if ( ! wp_next_scheduled( 'every_ten_minutes' ) ) {
	wp_schedule_event( time(), 'ten_minutes', 'every_ten_minutes' );
}

?>