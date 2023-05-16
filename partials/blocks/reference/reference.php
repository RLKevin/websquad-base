<?php

// vars

$background = get_field('background');
$id = get_field('id');

?>

<section id="<?php echo $id; ?>" class="reference reference--<?php echo $background; ?>">

	<div class="wrapper">

	<?php

		if( have_rows('repeater', 'options') ): 

			?>

			<div class="reference__slider slider">

				<?php 
				
				while ( have_rows('repeater', 'options') ) : the_row();

					// vars

					$reference = get_sub_field('reference');
					$rating = get_sub_field('rating');
					$image = get_sub_field('image');
					$name = get_sub_field('name');
					$function = get_sub_field('function');
					// $phone = get_sub_field('phone', 'option');
					// $phone_stripped = str_replace([' ', '-'], '', $phone);
					// $email = get_sub_field('email', 'option');

					?>
							
					<div class="reference__container">

						<?php

						if ($rating != '0'):
						
							?>

							<div class="reference__rating reference__rating--<?php the_sub_field('rating'); ?>">

								<ul>

									<li></li>
									<li></li>
									<li></li>
									<li></li>
									<li></li>

								</ul>

							</div>

							<?php 
						
						endif; 
						
						?>

						<?php

						if ($reference):

							?>

							<div class="reference__text wysiwyg">
								
								<?php echo $reference; ?>

								<h3><?php echo $name; ?></h3>
							
							</div>

							<?php

						endif;

						?>

						<div class="reference__person">

							<div class="reference__image">

								<img src="<?php echo $image['sizes']['640-1-1']; ?>" alt="<?php echo $image['title']; ?>">

							</div>

						</div>

					</div>

					<?php 
			
				endwhile; 
				
				?>

			</div>

			<?php 

		endif;

		?>

	</div>
</section>

<?php

// ACF

if ( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_5c191b82ed147',
		'title' => 'Block: Reference',
		'fields' => array(
			array(
				'key' => 'field_5d0ba7b722081',
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
				'key' => 'field_5d4d324956b12',
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
					'value' => 'switch/reference',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'field',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	));
	
endif;

?>