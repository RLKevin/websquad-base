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
	create_taxonomy('Locations', 'Locations', 'Locatie', 'Vacancy');
	create_taxonomy('Divisions', 'Divisions', 'Waar wil je werken', 'Vacancy');
	create_taxonomy('Departments', 'Departments', 'Departementen', 'Vacancy', true);
	create_taxonomy('Employment', 'Employment', 'Soort dienstverband', 'Vacancy');
	create_taxonomy('Company', 'Company', 'Bedrijf', 'Vacancy', true);
	create_taxonomy('Function', 'Function', 'Afdeling', 'Vacancy');
	create_taxonomy('Address', 'Address', 'Adres', 'Vacancy', true);

	// emply
	create_taxonomy('Locations', 'Locations', 'Locatie', 'Emply');
	create_taxonomy('Divisions', 'Divisions', 'Waar wil je werken', 'Emply');
	create_taxonomy('Departments', 'Departments', 'Departementen', 'Emply', false);
	create_taxonomy('Employment', 'Employment', 'Soort dienstverband', 'Emply');
	create_taxonomy('Company', 'Company', 'Bedrijf', 'Emply', false);
	create_taxonomy('Function', 'Function', 'Vakgebied', 'Emply');
	create_taxonomy('Address', 'Address', 'Adres', 'Emply', true);
	create_taxonomy('Education', 'Education', 'Opleidingsniveau', 'Emply', true);
}

// reset the count of a taxonomy, after deleting posts via SQL, the count is not correct

add_filter('update_post_term_count_statuses', function($post_statuses, $taxonomy) {
    // Intercept
    if($taxonomy->name === 'Locations') {
        foreach(array(
            // Some post statuses to be included in the count ...
            'mort-custom-post-status',
            'draft',
            'pending',
            'private'
        ) as $v) {
            // Check to ensure another call hasn't already added the status.
            if(!in_array($v, $post_statuses)) {
                $post_statuses[] = $v;
            }
        }
    }
    // Return
    return $post_statuses;
}, 10, 2);

function get_vacancy_terms($id, $taxonomy) {
	$terms = get_the_terms($id, $taxonomy);
	if (!$terms) {
		return false;
	}
	$terms = array_map(function($term) {
		return $term->name;
	}, $terms);
	$terms = implode(', ', $terms);
	return $terms;
}

function get_vacancy_terms_array($id, $taxonomy) {
	$terms = get_the_terms($id, $taxonomy);
	if (!$terms) {
		return false;
	}
	$terms = array_map(function($term) {
		// return term id
		return $term->term_id;
	}, $terms);
	return $terms;
}

?>