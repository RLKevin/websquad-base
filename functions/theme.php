<?php 

// theme support
add_action( 'after_setup_theme', 'teamswitch_theme_setup');
function teamswitch_theme_setup() {
	add_theme_support( 'post-thumbnails' ); // enable featured images for default post type
	// add_theme_support( 'title-tag' ); // dynamic title tag in head, probably needed with yoast seo
	add_theme_support( 'menus' );
	add_theme_support( 'editor-styles' );
	// include( get_template_directory_uri().'/img' );

	add_editor_style( get_template_directory_uri().'/css/style.css' );
	add_editor_style( 'css/style.css' );
}

// theme login logo
add_action('login_head', 'teamswitch_loginlogo');
function teamswitch_loginlogo() {
	echo '<style type="text/css"> h1 a { margin: 0px !important; background-size: 100% !important; width: 280px !important; height: 120px !important; position: relative !important; left: 50% !important; margin-left: -140px !important; margin-bottom: 40px !important; background-image: url('.get_bloginfo('template_directory').'/img/template-logo.png) !important; } </style>';
}

// theme admin footer message
add_filter('admin_footer_text', 'switch_change_footer_admin');
function switch_change_footer_admin () {
	echo 'Created by <a href="http://www.teamswitch.nl" target="_blank">Team Switch</a></p>';
}

?>