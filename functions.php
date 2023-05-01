<?php

	// vars

		$google_maps_key = 'AIzaSyDWoSM3uHPncI05dg05dAN1GGsRC80BOxE';
		$google_maps_link = 'https://maps.googleapis.com/maps/api/js?key=' . $google_maps_key;
		
    // includes

		include 'functions/reset.php';
		include 'functions/script.php'; 
		include 'functions/style.php';

		include 'functions/acf.php';
		// include 'functions/app.php';
		include 'functions/block.php';
		include 'functions/cron.php';
		include 'functions/debug.php'; // console log / console_warn / write_log
		include 'functions/facebook.php';
		include 'functions/form.php';
		include 'functions/image.php';
		include 'functions/taxonomy.php';
		include 'functions/post.php';
		include 'functions/prettify.php';
		include 'functions/security.php';
		include 'functions/shortcode.php';
		include 'functions/theme.php'; // theme support / login logo / admin footer message

	// emply

		// do a sql query
		function emply_sql_query($query) {
			global $wpdb;
			$results = $wpdb->get_results($query, ARRAY_A);
			return $results;
		}
		// emply_sql_query('DELETE FROM `wp_icl_translations` WHERE `element_id` LIKE 100000219');

		if (!wp_next_scheduled('update_products_cron_hook')) {
			wp_schedule_event(strtotime('03:00:00'), 'daily', 'update_products_cron_hook');
		}

	// custom css for wp admin

		add_action('admin_head', 'switch_admin_styles');

		function switch_admin_styles() {
		echo '<style>
			@media (min-width: 782px) {
				.interface-complementary-area {
					width: max(250px, 25vw);
				}
			}
		</style>';
		}
?>