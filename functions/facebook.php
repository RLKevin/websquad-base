<?php

// get and save facebook posts to custom post type
// don't forget to add a custom post type called 'facebook'

add_action( 'every_ten_minutes', 'update_facebook' );
// add_action( 'init', 'update_facebook' ); // only for testing
function update_facebook() {

	// vars
	$fb_page = '';
	$fb_access_token = '';

	if ($fb_page && $fb_access_token) {
		
		// vars
		$fb_json = 'https://graph.facebook.com/v12.0/' . $fb_page . '/posts?access_token=' . $fb_access_token . '&fields=id,created_time,full_picture,message,status_type,permalink_url&limit=36';
		$fb_results = json_decode(file_get_contents($fb_json),true);

		// console_log($fb_results['data']);
		foreach ($fb_results['data'] as $fbResult) {

			// vars
			$id = $fbResult['id'];
			$created_time = new DateTime($fbResult['created_time']);
			$created_time = $created_time->setTimezone(new DateTimeZone("Europe/Amsterdam"));
			$date_time = $created_time->format('Y-m-d H:i:s');
			$type = $fbResult['status_type'];
			if (strpos($type, 'video') !== false) { $type = 'video'; }
			if (strpos($type, 'photo') !== false) { $type = 'photo'; }		
			$image = $fbResult['full_picture'] ? $fbResult['full_picture'] : null;
			$text = $fbResult['message'] ? $fbResult['message'] : '';
			$text = str_replace("\n", '<br/>', $text);
			$text = str_replace("'", "\&#39;", $text);
			$link = $fbResult['permalink_url'];

			// add post to database
			if (null == get_page_by_title($id, 'OBJECT', 'facebook') && strlen($text) > 0 && $link) {

				$post_id = wp_insert_post(
					array(
						'post_name'		=>	$id,
						'post_title'	=>	$id,
						'post_status'	=>	'publish',
						'post_type'		=>	'facebook',
						'post_date'		=>	$date_time,
					)
				);

				// upload image
				require_once(ABSPATH . 'wp-admin/includes/media.php');
				require_once(ABSPATH . 'wp-admin/includes/file.php');
				require_once(ABSPATH . 'wp-admin/includes/image.php');
				$image_attachment = media_sideload_image($image, $post_id, $text, 'src');

				// save to post
				update_post_meta($post_id, 'facebook_type', $type);
				update_post_meta($post_id, 'facebook_image', $image_attachment);		
				update_post_meta($post_id, 'facebook_text', $text);
				update_post_meta($post_id, 'facebook_link', $link);
			}
		}
	} else {
		return;
	}
}

?>