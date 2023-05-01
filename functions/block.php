<?php

$blocks = array(
    'cards',
    'content',
    'faq',
    'form',
    'file',
    'gallery',
    'hero',
    'intro',
    'map',
    'open',
    'reference',
    'search',
    'spacer',
    'table',
    'usp'
);

add_action('init', 'register_acf_blocks', 5);

function register_acf_blocks() {

    global $blocks;

    foreach ($blocks as $block) {
        // console_log(register_block_type( get_theme_file_path( 'partials/blocks/' . $block ) ));
        register_block_type( get_theme_file_path( 'partials/blocks/' . $block ) );
    }
}

add_action('acf/init', 'my_acf_init');

function my_acf_init() {

    // acf - gutenberg full width

    add_action('admin_head', 'editor_full_width_gutenberg');
    function editor_full_width_gutenberg() {
        echo 
        '<style>
            .wp-block {
                max-width: none !important;
            }
        </style>';
    }

    // acf - create block categories

    add_filter( 'block_categories_all', function( $categories, $post ) {
        return array_merge(
            $categories,
            array(
                array(
                    'slug' => 'switch-blocks',
                    'title' => __( 'Switch Blocks', 'switch-blocks' ),
                ),
            )
        );
    }, 10, 2 );

    // only allow switch blocks

    add_filter( 'allowed_block_types_all', 'switch_allowed_block_types' );
    function switch_allowed_block_types( $allowed_blocks ) {

        global $blocks;

        $allowed_blocks = array();

        foreach ($blocks as $block) {
            $allowed_blocks[] = 'switch/' . $block;
        }

        return $allowed_blocks;
    }
}

?>