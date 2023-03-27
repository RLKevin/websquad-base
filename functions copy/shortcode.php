<?php 

add_shortcode('get_parameter', 'get_parameter');
function get_parameter($attributes) {
	if (isset($_GET[$attributes['key']])) {
		return $_GET[$attributes['key']];
	}
}

?>