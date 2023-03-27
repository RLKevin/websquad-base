<?php

include 'functions/block.php';



// variables scss

	add_action( 'acf/save_post', 'generate_variables_scss', 20 );
	function generate_variables_scss() {
		$theme = get_stylesheet_directory();
		ob_start();
		require($theme . '/scss/assets/variables.php');
		$scss = ob_get_clean();
		file_put_contents($theme . '/scss/assets/_variables.scss', $scss, LOCK_EX);
		touch($theme . '/scss/style.scss');
	}

// scripts

	add_action( 'wp_enqueue_scripts', 'switchreclamebureau_adding_scripts', 999 );	
	function switchreclamebureau_adding_scripts() {
		wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), filemtime(get_stylesheet_directory() . '/js/main.js'));
		wp_enqueue_script('owl', get_template_directory_uri() . '/js/vendor/owl.carousel.min.js', array(), filemtime(get_stylesheet_directory() . '/js/vendor/owl.carousel.min.js'));
		wp_enqueue_script('dotdotdot', get_template_directory_uri() . '/js/vendor/dotdotdot.js', array(), filemtime(get_stylesheet_directory() . '/js/vendor/dotdotdot.js'));
		wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js', array(), filemtime(get_stylesheet_directory() . '/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js'));
		wp_enqueue_script('google-maps-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDWoSM3uHPncI05dg05dAN1GGsRC80BOxE');
		wp_enqueue_script('google-maps-settings', get_template_directory_uri() . '/js/vendor/google-maps-settings.js', array(), filemtime(get_stylesheet_directory() . '/js/vendor/google-maps-settings.js'));
	}

// styles
	
	add_action('wp_enqueue_scripts', 'switchreclamebureau_adding_styles' );	
	function switchreclamebureau_adding_styles() {
		wp_enqueue_style('ff-primary', get_field('options_font_family_primary_url', 'option') ? get_field('options_font_family_primary_url', 'option') : 'https://use.typekit.net/kll4grl.css');
		wp_enqueue_style('ff-secondary', get_field('options_font_family_secondary_url', 'option') ? get_field('options_font_family_secondary_url', 'option') : 'https://fonts.googleapis.com/css?family=Lato:300,400,700,900');
		wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css', array(), filemtime( get_stylesheet_directory() . '/css/style.css' ));
	}


// acf

	add_action('acf/init', 'my_acf_init');
	function my_acf_init() {

		// acf - basic wysiwyg - https://www.tiny.cloud/docs-3x/reference/buttons/

		add_filter("mce_buttons", "base_extended_editor_mce_buttons", 0);
		function base_extended_editor_mce_buttons($buttons) {
			return array('formatselect', 'bold', 'italic', 'strikethrough', 'bullist', 'link', 'unlink', 'blockquote');
		}

		add_filter('tiny_mce_before_init', 'base_custom_mce_format' );
		function base_custom_mce_format($init) {
			$init['block_formats'] = 'Paragraph=p;Subtitle=h3;Title=h2;';
			return $init;
		}
		
		// acf - google maps			
		
		acf_update_setting('google_api_key', 'AIzaSyDWoSM3uHPncI05dg05dAN1GGsRC80BOxE');

		// acf - options page

		if( function_exists('acf_add_options_page') ) {

			acf_add_options_page(array(
				'page_title' 	=> 'Options',
				'menu_title'	=> 'Options',
				'menu_slug' 	=> 'theme-general-settings',
				'capability'	=> 'edit_posts',
				'redirect'		=> false
			));
		
		}
	}

// image

	// image - resize

	add_image_size( '640-16-9', 640, 360, true );
	add_image_size( '640-4-3', 640, 480, true );
	add_image_size( '640-1-1', 640, 640, true );
	add_image_size( '960-16-9', 960, 540, true );
	add_image_size( '960-4-3', 960, 720, true );
	add_image_size( '960-1-1', 960, 960, true );
	add_image_size( '1280-16-9', 1280, 720, true );
	add_image_size( '1280-4-3', 1280, 960, true );
	add_image_size( '1920-16-9', 1920, 1080, true );

// menu

	// menu - register

	add_action( 'init', 'register_menu' );
	function register_menu() {
		register_nav_menu('menu',__( 'Primary Menu' ));
	}

// custom post types

	// custom post types - add featured image

	add_theme_support( 'post-thumbnails' );

	// custom post types - create custom post type

	add_action( 'init', 'create_post_types' );
	function create_post_types() {

		function create_post_type($name) {
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
				'supports'           	=> array( 'title', 'editor', 'revisions', 'thumbnail' ),
				'show_in_rest' 			=> true,
				)
			);
		}
		create_post_type('Blog');
		create_post_type('News');
		create_post_type('Projects');
		create_post_type('Vacancies');
		create_post_type('Facebook');
	}

	// custom post types - remove default post type

	add_action( 'admin_menu', 'remove_post_type' );
	function remove_post_type(){
		remove_menu_page( 'edit.php' );
	}


// gravity forms

	// gravity forms - change submit input to button

	add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );
	function form_submit_button( $button, $form ) {
		return "
			<button class='button' id='gform_submit_button_{$form['id']}'>
				{$form['button']['text']}
			</button>
		";				
	}

	// gravity forms - change position currency for price field

	add_filter( 'gform_currencies', 'gw_modify_currencies' );
	function gw_modify_currencies( $currencies ) {
		$currencies['EUR'] = array(
			'name'               => esc_html__( 'Euro', 'gravityforms' ),
			'symbol_left'        => '&#8364;',
			'symbol_right'       => '',
			'symbol_padding'     => ' ',
			'thousand_separator' => '.',
			'decimal_separator'  => ',',
			'decimals'           => 2
		);
		return $currencies;
	}

	// gravity forms - change submit button spinner

	add_filter( 'gform_ajax_spinner_url', 'tgm_io_custom_gforms_spinner' );
	function tgm_io_custom_gforms_spinner( $src ) {
		return get_stylesheet_directory_uri() . '/img/icons/loading.svg';
	}

	// gravity forms - validation error

	// add_filter( 'gform_validation_message', 'change_message', 10, 2 );
	// function change_message( $message, $form ) {
	// 	return "<div class='validation_error'>Niet alle verplichte velden zijn (correct) ingevuld.</div>";
	// }
	
// custom

	// custom - websquad login logo

	add_action('login_head', 'custom_loginlogo');
	function custom_loginlogo() {
		echo '<style type="text/css"> h1 a { margin: 0px !important; background-size: 100% !important; width: 280px !important; height: 120px !important; position: relative !important; left: 50% !important; margin-left: -140px !important; margin-bottom: 40px !important; background-image: url('.get_bloginfo('template_directory').'/img/template-logo.png) !important; } </style>';
	}
		
	// custom - allow upload svg

	function cc_mime_types($mimes) {
		$mimes['svg'] = 'image/svg';
		return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');

// post load more

	// post load more - tutorial: https://weichie.com/blog/ajax-load-more-posts-wordpress/

	// post load more - result: http://localhost/websquad/wordpress/wp-json/websquad/posts?post-type=news&post-per-page=1&post-current-page=1

	// post load more - register route

	add_action( 'rest_api_init', function () {

		register_rest_route( 'websquad', '/posts', array(
			'methods' => array('GET'),
			'callback' => 'post_load',
			'permission_callback' => function() { return ''; },
		) );

	});

	// post load more - set function

	function post_load( WP_REST_Request $request ) {

		// vars

		$post_data = array();
		$post_type = $request->get_param('post-type');
		$post_per_page = $request->get_param('post-per-page');
		$post_current_page = $request->get_param('post-current-page');
		$post_current_page = (isset($post_current_page) || !(empty($post_current_page))) ? $post_current_page : 1;
		$post_query = new WP_Query(
			array(
				'post_type' => $post_type,
				'post_status' => 'publish',
				'orderby' => array(
					'post_date' => 'desc', 
				),
				'posts_per_page' => $post_per_page,
				'paged' => $post_current_page
			)
		);

		while ( $post_query->have_posts() ) : $post_query->the_post();

			// vars
			
			$id = get_the_ID();

			if ($post_type == 'facebook'):

				$type = get_field('facebook_type', $id);
				$image = get_field('facebook_image', $id);
				$title = get_the_date('d.m.Y', $id);
				$text = get_field('facebook_text', $id);
				$button = get_field('facebook_link', $id);

			elseif ($post_type == 'projects'):

				$post = get_post($id);
				$blocks = parse_blocks($post->post_content);
				$type = '';
				$image = get_the_post_thumbnail_url($id, '960-1-1');
				$title = $blocks[0]['attrs']['data']['title'];
				$date = get_the_date('d.m.Y', $id);
				$text = $blocks[0]['attrs']['data']['text'];
				$button = $blocks[0]['attrs']['data']['button_left']['url'];

			else:

				$type = '';
				$image = get_the_post_thumbnail_url($id, '960-1-1');
				$title = get_the_title($id);
				$text = '';
				$button = get_the_permalink($id);

			endif;

			// $type = $post_type != 'facebook' ? '' : get_field('facebook_type', $id);
			// $image = $post_type != 'facebook' ? get_the_post_thumbnail_url($id, '960-1-1') : get_field('facebook_image', $id);
			// $title = $post_type != 'facebook' ? get_the_title($id) : get_the_date('d.m.Y', $id);
			// $text = $post_type != 'facebook' ? '' : get_field('facebook_text', $id);
			// $button = $post_type != 'facebook' ? get_the_permalink($id) : get_field('facebook_link', $id);

			// data

			$post_data[] = (object)array(

				'id' => $id,
				'type' => $type,
				'image' => $image,
				'title' => $title,
				'date' => $date,
				'text' => $text,
				'button' => $button,
			
			);

		endwhile;

		wp_reset_postdata(); 

		return $post_data;

	}

// facebook

	// facebook - disable gutenberg

	add_filter('use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2);
	function prefix_disable_gutenberg($current_status, $post_type) {
		// Use your post type key instead of 'product'
		if ($post_type === 'facebook') return false;
		return $current_status;
	}

	// facebook - cron schedule 10 minutes

	add_filter( 'cron_schedules', 'every_ten_minutes' );
	function every_ten_minutes( $schedules ) {
		$schedules['ten_minutes'] = array(
			'interval' => 600,
			'display'  => esc_html__( 'Every ten minutes' ),
		);
		return $schedules;
	}

	if ( ! wp_next_scheduled( 'every_ten_minutes' ) ) {
		wp_schedule_event( time(), 'ten_minutes', 'every_ten_minutes' );
	}

	// facebook - get posts every ten minutes

	// add_action( 'every_ten_minutes', 'update_facebook' );

	// facebook - get post immediately

	// add_action( 'init', 'update_facebook' );

	function update_facebook() {

		// vars

		$fb_page = get_field('options_footer_facebook_page', 'option');
		$fb_access_token = get_field('options_footer_facebook_access_token', 'option');

		if ($fb_page && $fb_access_token) {

			// vars

			$fb_posts_url = 'https://graph.facebook.com/v11.0/' . $fb_page . '/posts?access_token=' . $fb_access_token . '&fields=id,created_time,full_picture,message,status_type,permalink_url&limit=32';
			$fb_posts_get = file_get_contents($fb_posts_url, false, stream_context_create(array("ssl"=>array("verify_peer"=>false,"verify_peer_name"=>false))));
			$fb_posts = json_decode($fb_posts_get, true);

			foreach ($fb_posts['data'] as $fb_post) {

				// vars

				$id = $fb_post['id'];
				$created_time = new DateTime($fb_post['created_time']);
				$created_time = $created_time->setTimezone(new DateTimeZone("Europe/Amsterdam"));
				$date_time = $created_time->format('Y-m-d H:i:s');
				$type = $fb_post['status_type'];
				if (strpos($type, 'video') !== false) { $type = 'video'; }
				if (strpos($type, 'photo') !== false) { $type = 'photo'; }		
				$image = $fb_post['full_picture'];
				$text = isset($fb_post['message']) ? $fb_post['message'] : '';
				$text = str_replace("\n", '<br/>', $text);
				$text = str_replace("'", "\&#39;", $text);
				$link = $fb_post['permalink_url'];
				
				// add post to database

				if (null == get_page_by_title($id, 'OBJECT', 'facebook') && $type != 'shared_story' && strlen($text) > 0 && !empty($image)) {

					$post_id = wp_insert_post(
						array(
							'post_name'		=>	$id,
							'post_title'	=>	$id,
							'post_status'	=>	'publish',
							'post_type'		=>	'facebook',
							'post_date'		=>	$date_time,
						)
					);

					// upload image

					require_once(ABSPATH . 'wp-admin/includes/media.php');
					require_once(ABSPATH . 'wp-admin/includes/file.php');
					require_once(ABSPATH . 'wp-admin/includes/image.php');
					$image_attachment = media_sideload_image($image, $post_id, $text, 'src');

					// save to post
					
					update_post_meta($post_id, 'facebook_type', $type);
					update_post_meta($post_id, 'facebook_image', $image_attachment);		
					update_post_meta($post_id, 'facebook_text', $text);
					update_post_meta($post_id, 'facebook_link', $link);
				}

			}

		} else {

			return;

		}
	}
	
?>