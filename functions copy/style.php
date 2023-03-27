<?php

add_action('wp_enqueue_scripts', 'teamswitch_adding_styles', 999 );	
function teamswitch_adding_styles() {
	wp_enqueue_style('font-primary', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap');
	wp_enqueue_style('font-secondary', 'https://use.typekit.net/tnf8jkx.css');
	wp_enqueue_style('style', get_template_directory_uri() . '/css/style.min.css', array(), filemtime( get_stylesheet_directory() . '/css/style.min.css' ) );
}

?>