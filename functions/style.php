<?php

	add_action('wp_enqueue_scripts', 'teamswitch_adding_styles', 999 );	
	function teamswitch_adding_styles() {
		wp_enqueue_style('font-primary', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap');
		wp_enqueue_style('font-secondary', 'https://use.typekit.net/tnf8jkx.css');
		wp_enqueue_style('style', get_template_directory_uri() . '/css/style.min.css', array(), wp_get_theme()->parent()->get('Version') );
		wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/css/style.min.css' , array('style'), wp_get_theme()->get('Version') );
		wp_enqueue_style('tiny-slider', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css' , array(), wp_get_theme()->parent()->get('Version'));
	}

	// function myguten_enqueue() {
	// 	wp_enqueue_style('font-primary', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap');
	// 	wp_enqueue_style('font-secondary', 'https://use.typekit.net/tnf8jkx.css');
	// 	wp_enqueue_style('style', get_template_directory_uri() . '/css/style.min.css', array(), filemtime( get_stylesheet_directory() . '/css/style.min.css' ) );
	// 	wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/css/style.min.css' , array('style'), wp_get_theme()->get('Version') );
	// }

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