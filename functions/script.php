<?php

	// fire js in website
	add_action( 'wp_enqueue_scripts', 'teamswitch_adding_scripts', 999 );
	function teamswitch_adding_scripts() {  
		global $google_maps_link;

		wp_enqueue_script('jquery', get_template_directory_uri() . '/js/vendor/jquery-3.6.1.min.js');
		wp_enqueue_script('owl', get_template_directory_uri() . '/js/vendor/owl.carousel.min.js', array('jquery'), wp_get_theme()->parent()->get('Version'));
		wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js', array(), wp_get_theme()->parent()->get('Version'));
		wp_enqueue_script('google-maps-api', $google_maps_link);
		wp_enqueue_script('google-maps-settings', get_template_directory_uri() . '/js/vendor/google-maps-settings.js', array(), wp_get_theme()->parent()->get('Version'));
		wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), wp_get_theme()->parent()->get('Version'));
		wp_enqueue_script('tiny-slider', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/min/tiny-slider.js', array(), wp_get_theme()->parent()->get('Version'));
	}

	// fire js in gutenberg
	add_action( 'enqueue_block_editor_assets', 'teamswitch_adding_gutenberg_scripts' );
	function teamswitch_adding_gutenberg_scripts() {  
		global $google_maps_link;

		// wp_enqueue_script('jquery', get_template_directory_uri() . '/js/vendor/jquery-3.6.1.min.js');
		// wp_enqueue_script('owl', get_template_directory_uri() . '/js/vendor/owl.carousel.min.js', array('jquery'), wp_get_theme()->parent()->get('Version'));
		// wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js', array(), wp_get_theme()->parent()->get('Version'));
		// wp_enqueue_script('google-maps-api', $google_maps_link);
		// wp_enqueue_script('google-maps-settings', get_template_directory_uri() . '/js/vendor/google-maps-settings.js', array(), wp_get_theme()->parent()->get('Version'));
		// wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), wp_get_theme()->parent()->get('Version'));
		// wp_enqueue_script('tiny-slider', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/min/tiny-slider.js', array(), wp_get_theme()->parent()->get('Version'));
	}

?>