<?php

// vars
$id = get_field('id');

?>

<section id="<?php echo $id; ?>" class="gallery">

	<?php
	
	if( have_rows('repeater') ):

		?>
		
		<div class="gallery__slider slider">

			<?php 
			
			while ( have_rows('repeater') ) : the_row();

				// vars

				$image = get_sub_field('image');

				?>

				<img src="<?php echo $image['sizes']['1280-16-9']; ?>" alt="<?php echo $image['title']; ?>">

				<?php 
			
			endwhile; 
			
			?>
			
		</div>

		<?php 

	else:

		?> <p>No content added.</p> <?php
		
	endif;

	?>

</section>

<?php

// ACF

if ( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_5c51e04515e2b',
		'title' => 'Block: Gallery',
		'fields' => array(
			array(
				'key' => 'field_5c51e04519f9d',
				'label' => 'Repeater',
				'name' => 'repeater',
				'aria-label' => '',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 10,
				'layout' => 'block',
				'button_label' => 'Add Row',
				'rows_per_page' => 20,
				'sub_fields' => array(
					array(
						'key' => 'field_5d403d9aa1c13',
						'label' => 'Image',
						'name' => 'image',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => 'Minimaal 1280 x 720 px',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'array',
						'preview_size' => 'thumbnail',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'parent_repeater' => 'field_5c51e04519f9d',
					),
				),
			),
			array(
				'key' => 'field_5d4d31adeac4b',
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
					'value' => 'switch/gallery',
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