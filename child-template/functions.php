<?php

$child_blocks = array(
    'custom',
);

// add google font
function add_google_fonts() {
    wp_enqueue_style( 'cormorant_infant', 'https://fonts.googleapis.com/css2?family=Cormorant+Infant:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap', false );
    wp_enqueue_style( 'lato', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'add_google_fonts' );

// register custom blocks

add_action('init', 'register_child_acf_blocks', 5);

function register_child_acf_blocks() {

    global $child_blocks;

    foreach ($child_blocks as $block) {
        // console_log(register_block_type( get_theme_file_path( 'partials/blocks/' . $block ) ));
        register_block_type( get_theme_file_path( 'partials/blocks/' . $block ) );
    }
}

// add custom blocks to whitelist

add_filter( 'allowed_block_types_all', 'switch_child_allowed_block_types', 20, 2 );
function switch_child_allowed_block_types( $allowed_blocks ) {

    global $child_blocks;

    // $allowed_blocks = array();

    foreach ($child_blocks as $block) {
        $allowed_blocks[] = 'switch/' . $block;
    }

    console_log($allowed_blocks);

    return $allowed_blocks;
}