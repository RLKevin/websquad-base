<?php 

// create custom taxonomy

add_action( 'init', 'teamswitch_custom_taxonomies');
function teamswitch_custom_taxonomies() {

	function create_taxonomy($slug, $en, $nl, $type, $hidden = false) {

		register_taxonomy(strtolower($slug), 
		array($type), 
		array(
			'hierarchical' => true, 
			'label' => $en,
			'nl' => $nl,
			'en' => $en,
			'query_var' => true, 
			'rewrite' => true,
			'show_admin_column' => !$hidden
			) 
		);
	}

	// vacancies
	// create_taxonomy('Locations', 'Locations', 'Locatie', 'Vacancy');
}

?>