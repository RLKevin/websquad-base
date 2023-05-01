<?php

add_action( 'wp_enqueue_scripts', 'teamswitch_adding_scripts', 999 );
function teamswitch_adding_scripts() {

	global $google_maps_link;
	
	wp_enqueue_script('owl', get_template_directory_uri() . '/js/vendor/owl.carousel.min.js', array('jquery'), filemtime(get_stylesheet_directory() . '/js/vendor/owl.carousel.min.js'));
	wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js', array(), filemtime(get_stylesheet_directory() . '/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js'));
	wp_enqueue_script('google-maps-api', $google_maps_link);
	wp_enqueue_script('google-maps-settings', get_template_directory_uri() . '/js/vendor/google-maps-settings.js', array(), filemtime(get_stylesheet_directory() . '/js/vendor/google-maps-settings.js'));
	// wp_enqueue_script('google-maps-clusterer', get_template_directory_uri() . '/js/vendor/google-maps-clusterer.js', array(), filemtime(get_stylesheet_directory() . '/js/vendor/google-maps-clusterer.js'));
	wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery', 'owl'), filemtime(get_stylesheet_directory() . '/js/main.js'));
}

?>