<?php
		
// vars

$page_not_found_id = (get_page_by_path('pagina-niet-gevonden'))->ID;
$search_id = (get_page_by_path('zoeken'))->ID;
$thanks_id = (get_page_by_path('bedankt'))->ID;
$exclude = $page_not_found_id . ', ' . $search_id . ', ' . $thanks_id . ', ' . get_field('exclude');
$search = $_GET["keyword"];
$the_query = new WP_Query(
	array(
		's' => $search, 
		'posts_per_page'		=> $items,
		'post_type'				=> array('page', 'blog', 'news', 'projects', 'vacancies'),
		'post__not_in' 			=> explode(',', $exclude),
		'posts_per_page'		=> '-1',
		'orderby' 				=> 'menu_order',
		'order' 				=> 'asc',
	) 
);
$count = $the_query -> post_count;
$align = get_field('align');
$background = get_field('background');
$id = get_field('id');

?>

<section id="<?php echo $id; ?>" class="search search--<?php echo $align; ?> search--<?php echo $background; ?>">

	<div class="wrapper">
	
		<h2>Resultaten voor <?php echo $search; ?></h2>

		<h3>

			<?php
			
			if ($count === 0):

				echo 'Helaas, er zijn geen resultaten gevonden';

			elseif ($count === 1):

				echo 'Er is één resultaat gevonden';

			else: 

				echo 'Er zijn ' . $count . ' resultaten gevonden';

			endif;

			?>

		</h3>

		<?php 

		while ($the_query -> have_posts()): $the_query -> the_post();

			// vars

			$link = get_the_permalink();
			$title = get_the_title();

			?>

			<a href="<?php echo $link; ?>"><?php echo $title; ?>
				<svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="arrow-right" class="svg-inline--fa fa-arrow-right fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M218.101 38.101L198.302 57.9c-4.686 4.686-4.686 12.284 0 16.971L353.432 230H12c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h341.432l-155.13 155.13c-4.686 4.686-4.686 12.284 0 16.971l19.799 19.799c4.686 4.686 12.284 4.686 16.971 0l209.414-209.414c4.686-4.686 4.686-12.284 0-16.971L235.071 38.101c-4.686-4.687-12.284-4.687-16.97 0z"></path></svg>
			</a>

			<?php

		endwhile;

		?>

	</div>
</section>

<?php

// ACF

if ( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_5c5aba23b5c1b',
		'title' => 'Block: Search',
		'fields' => array(
			array(
				'key' => 'field_5c5ad56b7fe03',
				'label' => 'Exclude',
				'name' => 'exclude',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => 'Comma separated ID\'s',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5d02040ce64aa',
				'label' => 'Align',
				'name' => 'align',
				'aria-label' => '',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'left' => 'Left',
					'center' => 'Center',
				),
				'default_value' => 'left',
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'return_format' => 'value',
				'ajax' => 0,
				'placeholder' => '',
			),
			array(
				'key' => 'field_5d0203ede64a9',
				'label' => 'Background',
				'name' => 'background',
				'aria-label' => '',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'white' => 'White',
					'grey' => 'Grey',
					'black' => 'Black',
					'primary' => 'Primary',
					'secondary' => 'Secondary',
				),
				'default_value' => 'white',
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'return_format' => 'value',
				'ajax' => 0,
				'placeholder' => '',
			),
			array(
				'key' => 'field_5d4d32519fe28',
				'label' => 'Id',
				'name' => 'id',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'block',
					'operator' => '==',
					'value' => 'switch/search',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	));
	
endif;

?>