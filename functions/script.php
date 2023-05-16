<?php

	// fire js in gutenberg
	add_action( 'enqueue_block_editor_assets', 'teamswitch_adding_scripts' );

	// fire js in website
	add_action( 'wp_enqueue_scripts', 'teamswitch_adding_scripts', 999 );

	function teamswitch_adding_scripts() {  

		global $google_maps_link;

		wp_enqueue_script('jquery', get_template_directory_uri() . '/js/vendor/jquery-3.6.1.min.js');
		wp_enqueue_script('owl', get_template_directory_uri() . '/js/vendor/owl.carousel.min.js', array('jquery'), wp_get_theme()->parent()->get('Version'));
		wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js', array(), wp_get_theme()->parent()->get('Version'));
		// wp_enqueue_script('google-maps-api', $google_maps_link);
		// wp_enqueue_script('google-maps-settings', get_template_directory_uri() . '/js/vendor/google-maps-settings.js', array(), wp_get_theme()->parent()->get('Version'));
		wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), wp_get_theme()->parent()->get('Version'));
		// wp_enqueue_script('tiny-slider', get_template_directory_uri() . '/js/vendor/tiny-slider.js', wp_get_theme()->parent()->get('Version'));
		wp_enqueue_script('tiny-slider', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js', array(), wp_get_theme()->parent()->get('Version'));
		wp_enqueue_style('tiny-slider', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css' , array(), wp_get_theme()->parent()->get('Version'));
	}

	function myguten_enqueue() {
	// 	wp_enqueue_script('jquery', get_template_directory_uri() . '/js/vendor/jquery-3.6.1.min.js');
	// 	wp_enqueue_script('owl', get_template_directory_uri() . '/js/vendor/owl.carousel.min.js', array('jquery'), filemtime(get_stylesheet_directory() . '/js/vendor/owl.carousel.min.js'));
	// 	wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js', array(), filemtime(get_stylesheet_directory() . '/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js'));
	// 	wp_enqueue_script('google-maps-api', $google_maps_link);
	// 	wp_enqueue_script('google-maps-settings', get_template_directory_uri() . '/js/vendor/google-maps-settings.js', array(), filemtime(get_stylesheet_directory() . '/js/vendor/google-maps-settings.js'));
	// 	wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery', 'owl'), filemtime(get_stylesheet_directory() . '/js/main.js'));
	// 	wp_enqueue_script('tiny-slider', get_template_directory_uri() . '/js/vendor/tiny-slider.js', filemtime(get_stylesheet_directory() . '/js/vendor/tiny-slider.js'));
	// 	wp_enqueue_style('tiny-slider', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css' , array(), wp_get_theme()->get('Version') );

		wp_enqueue_script('jquery', get_template_directory_uri() . '/js/vendor/jquery-3.6.1.min.js');
		wp_enqueue_script('owl', get_template_directory_uri() . '/js/vendor/owl.carousel.min.js', array('jquery'), wp_get_theme()->parent()->get('Version'));
		wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js', array(), wp_get_theme()->parent()->get('Version'));
		// wp_enqueue_script('google-maps-api', $google_maps_link);
		// wp_enqueue_script('google-maps-settings', get_template_directory_uri() . '/js/vendor/google-maps-settings.js', array(), wp_get_theme()->parent()->get('Version'));
		wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), wp_get_theme()->parent()->get('Version'));
		// wp_enqueue_script('tiny-slider', get_template_directory_uri() . '/js/vendor/tiny-slider.js', wp_get_theme()->parent()->get('Version'));
		wp_enqueue_script('tiny-slider', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js', array(), wp_get_theme()->parent()->get('Version'));
		wp_enqueue_style('tiny-slider', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css' , array(), wp_get_theme()->parent()->get('Version'));
		
		// wp_enqueue_style('font-primary', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap');
		// wp_enqueue_style('font-secondary', 'https://use.typekit.net/tnf8jkx.css');
		// wp_enqueue_style('style', get_template_directory_uri() . '/css/style.min.css', array(), filemtime( get_stylesheet_directory() . '/css/style.min.css' ) );
		// wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/css/style.min.css' , array('style'), wp_get_theme()->get('Version') );
	}

?>