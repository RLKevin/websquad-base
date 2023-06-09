<!doctype html>
<html class="no-js websquad-html"> 
  
  	<head>
    
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    
		<title><?php wp_title('|',1,'right'); ?> <?php bloginfo('name'); ?></title>
		<?php $favicon = get_field('options_favicon', 'option') ?>
		<link rel="icon" type="image/x-icon" href="<?= $favicon ? $favicon['url'] : '' ?>">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta property="og:title" content="<?php bloginfo('name'); ?>" />
		<meta property="og:description" content="<?php bloginfo('description'); ?>">
		<meta property="og:url" content="<?= get_site_url(); ?>" />
		<meta property="og:image" content="<?= get_site_icon_url(); ?>" />
		<meta property="og:image:secure_url" content="<?= get_site_icon_url(); ?>" />

    
    	<?php wp_head(); ?>
    
		<script type="text/javascript">
			var lang_code = "<?= apply_filters( 'wpml_current_language', NULL ) ?>";
			var site_url = "<?= get_site_url(); ?>";
			var page_id = "<?= get_the_ID(); ?>";
			var template = '<?= get_template_directory_uri(); ?>';

		</script>
		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css"> -->
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script> -->
		<?php 

			// vars

			$tag_manager_head = get_field('options_tag_manager_head', 'option');

			if ($tag_manager_head):

				echo $tag_manager_head;

			endif;

		?>

  	</head>
  
  	<body <?= body_class(); ?>>

		<?php 

			// vars
			
			$tag_manager_body = get_field('options_tag_manager_body', 'option');

			if ($tag_manager_body):

				echo $tag_manager_body;

			endif;

		?>

		<?php get_template_part('partials/header'); ?>