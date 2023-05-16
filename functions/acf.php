<?php 

add_action('acf/init', 'teamswitch_acf_init');
function teamswitch_acf_init() {

	// disable gutenberg

	// add_filter('use_block_editor_for_post', '__return_false');

	// basic wysiwyg - https://www.tiny.cloud/docs-3x/reference/buttons/

	add_filter("mce_buttons", "base_extended_editor_mce_buttons", 0);
	function base_extended_editor_mce_buttons($buttons) {
		return array('formatselect', 'bold', 'italic', 'strikethrough', 'bullist', 'link', 'unlink', 'blockquote');
	}

	add_filter('tiny_mce_before_init', 'base_custom_mce_format');
	function base_custom_mce_format($init) {
		$init['block_formats'] = 'Paragraph=p;Title=h2;Subtitle=h3;';
		return $init;
	}
	
	// google maps			
	global $google_maps_key;
	acf_update_setting('google_api_key', $google_maps_key);

	// options page

	if( function_exists('acf_add_options_page') ) {				
		acf_add_options_page(array(
			'page_title' 	=> 'Options',
			'menu_title'	=> 'Options',
			'menu_slug' 	=> 'theme-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));
	}

	// use options globally from default language	

	// add_filter( 'acf/validate_post_id', function( $post_id, $original_post_id ){
	// 	if( strpos($post_id, 'options_') === 0 ){ // postfix detection
	// 		$post_id = 'options';
	// 	}
	// 	return $post_id; // filter must return
	// }, 10, 2 );

	// return acf data in rest api

	add_filter( 'acf/settings/rest_api_format', function () {
		return 'standard';
	});


    // populate select fields

        // populate dropdown with all custom post types
		
		function acf_load_post_field_choices( $field ) {
                
			// reset choices
			$field['choices'] = array();
			
			$blacklist = array('post', 'page', 'revision', 'attachment', 'nav_menu_item', 'acf-field-group', 'acf-field', 'acf-post-type', 'acf-taxonomy', 'custom_css', 'customize_changeset', 'oembed_cache', 'user_request', 'wp_block', 'wp_template', 'wp_template_part', 'wp_global_styles', 'wp_navigation');
			foreach ( get_post_types( '', 'names' ) as $post_type ) {
				if ( ! in_array( $post_type, $blacklist ) ) {
					$field['choices'][ $post_type ] = ucfirst($post_type);
				}
			}
			return $field;
		}
		
		add_filter('acf/load_field/name=card_post_type', 'acf_load_post_field_choices');

		// populate dropdown with custom posts

		function acf_load_custom_posts_choices( $field ) {

			// reset choices
			$field['choices'] = array();
			// $field['choices'][ 0 ] = 'Default';

			$args = array(
				'post_type' => 'news',
				'post_status' => 'publish',
				'posts_per_page' => -1,
				'orderby' => 'title',
				'order' => 'ASC'
			);

			$post_query = new WP_Query($args);

			while ( $post_query->have_posts() ) {
				$post_query->the_post();
				$id = get_the_ID('id');
				$title = esc_html__( get_the_title('title') );
				$field['choices'][ $id ] = $title;
			} 
			return $field;
		}
		add_filter('acf/load_field/name=news_dropdown', 'acf_load_custom_posts_choices');

		// populate dropdown with all created forms

		function acf_load_form_field_choices( $field ) {
		
			// reset choices
			$field['choices'] = array();

			// get all gravity forms
			$forms = GFAPI::get_forms();
		
			$blacklist = array();
			foreach ($forms as $key => $form) {
				if ( ! in_array( $form['id'], $blacklist ) ) {
					$field['choices'][ $form['id'] ] = $form['title'];
				}
			}
			return $field;
		}
		
		add_filter('acf/load_field/name=form_id', 'acf_load_form_field_choices');

		// populate dropdown with all available roles

		function acf_load_user_role_field_choices( $field ) {

			// reset choices
			$field['choices'] = array();
			
			if(!is_admin()) return $field; // if not in admin area, return default field
			$roles = get_editable_roles();

			foreach ($roles as $key => $role) {
				$field['choices'][ strtolower($role['name']) ] = $role['name'];
			}
			return $field;
		}

		add_filter('acf/load_field/name=user_roles', 'acf_load_user_role_field_choices');

		// populate dropdown with all available companies

		function acf_load_company_field_choices( $field ) {

			// reset choices
			$field['choices'] = array();
			
			if(!is_admin()) return $field; // if not in admin area, return default field
			$terms = get_terms( 'company', 'hide_empty=0' );
            if ( !empty( $terms ) ) {
                foreach ( $terms as $term ) {
                    $title = $term->name;
					$field['choices'][ $term->term_id ] = $term->name;
				}
			}
			return $field;
		}

		add_filter('acf/load_field/name=vacancies_filter_company', 'acf_load_company_field_choices');

}

?>