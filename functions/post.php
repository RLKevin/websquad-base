<?php 

// create custom post type

add_action( 'init', 'teamswitch_custom_post_types' );
function teamswitch_custom_post_types() {
	function create_post_type($name, $slug = '', $template = null) {
		$slug = $slug === '' ? strtolower($name) : $slug;
		register_post_type( $name,
			array(
			'labels'                => array(
				'name'                => $name,
				'singular_name'       => $name,
				'menu_name'           => $name,
				'add_new'             => 'New',
				'add_new_item'        => 'New',
				'new_item'            => 'New',
				'edit'                => 'Edit',
				'edit_item'           => 'Edit',
				'view'                => 'View',
				'view_item'           => 'View',
				'search_items'        => 'Search',
				'not_found'           => 'Not found',
				'not_found_in_trash'  => 'Not found in trash',
			),
			'public'                => true,
			'menu_position'         => 10,
			'taxonomies'			=> ($name == 'Vacancy') || ($name == 'Emply') ? array( 'locations', 'divisions', 'departments', 'employment', 'companies', 'address', 'company', 'function', 'education' ) : array( 'category' ),
			'supports'           	=> array( 'title', 'editor', 'revisions', 'thumbnail', 'page-attributes'),
			'show_in_rest' 			=> true,
			'rewrite'               => array('slug' => $slug),
			'template'				=> $template,
			)
		);
	}
	create_post_type('Blog', 'blog', array(
		// array(
		// 	'switch/blockname',
		// ),
	));
	create_post_type('References', 'reference', array(
		// array(
		// 	'switch/blockname',
		// ),
	));

}

// remove default post type

add_action( 'admin_menu', 'teamswitch_remove_post_type' );
function teamswitch_remove_post_type(){
	remove_menu_page( 'edit.php' );
}

?>