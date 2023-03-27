<?php 

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'wp_head', 'feed_links_extra', 3 ); // remove rss feed links
remove_action( 'wp_head', 'feed_links', 2 ); // remove rss feed links

add_action( 'wp_footer', function(){
	wp_dequeue_script( 'wp-embed' ); // remove wp-embed
});

add_action( 'wp_enqueue_scripts', function(){
	wp_dequeue_style( 'wp-block-library' ); // remove block library css 
	wp_dequeue_script( 'comment-reply' ); // remove comment reply js
});

?>