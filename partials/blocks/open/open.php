<?php
		
// vars

$background = get_field('background');
$order_by = get_field('order_by');
$id = get_field('id');

?>

<section id="<?php echo $id; ?>" class="open open--<?php echo $order_by; ?> open--<?php echo $background; ?>">

	<div class="wrapper">

		<?php
		
		if( have_rows('repeater') ):

			?>

			<ul>

				<?php

				while ( have_rows('repeater') ) : the_row();

					// vars

					$day = get_sub_field('day');
					$from = get_sub_field('from');
					$to = get_sub_field('to');

					?>

					<li>

						<p>
						
							<span>
								<?php echo $day ?>
							</span>
						
							<?php echo $from ? $from : "Gesloten" ?>
							
							<?php echo $to ? " - " . $to . " uur" : "" ?>

						</p>
					
					</li>

					<?php

				endwhile;

				?>

			</ul>

			<?php

		else:

	?> <p>No open added.</p> <?php

	endif; 

		?>

	</div>
</section>

<?php

// ACF

if ( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_5cb5d0a020f6b',
		'title' => 'Block: Open',
		'fields' => array(
			array(
				'key' => 'field_5cb5d1e557da7',
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
				'max' => 7,
				'layout' => 'block',
				'button_label' => 'Add Row',
				'rows_per_page' => 20,
				'sub_fields' => array(
					array(
						'key' => 'field_5cb5d1fb57da8',
						'label' => 'Day',
						'name' => 'day',
						'aria-label' => '',
						'type' => 'select',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '25',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							'ma' => 'Mo',
							'di' => 'Tu',
							'wo' => 'We',
							'do' => 'Th',
							'vr' => 'Fr',
							'za' => 'Sa',
							'zo' => 'Su',
						),
						'default_value' => false,
						'allow_null' => 0,
						'multiple' => 0,
						'ui' => 0,
						'return_format' => 'value',
						'ajax' => 0,
						'placeholder' => '',
						'parent_repeater' => 'field_5cb5d1e557da7',
					),
					array(
						'key' => 'field_5d2485b63993f',
						'label' => 'Open',
						'name' => 'open',
						'aria-label' => '',
						'type' => 'true_false',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '25',
							'class' => '',
							'id' => '',
						),
						'message' => '',
						'default_value' => 0,
						'ui' => 1,
						'ui_on_text' => '',
						'ui_off_text' => '',
						'parent_repeater' => 'field_5cb5d1e557da7',
					),
					array(
						'key' => 'field_5cb5d25057da9',
						'label' => 'From',
						'name' => 'from',
						'aria-label' => '',
						'type' => 'time_picker',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_5d2485b63993f',
									'operator' => '==',
									'value' => '1',
								),
							),
						),
						'wrapper' => array(
							'width' => '25',
							'class' => '',
							'id' => '',
						),
						'display_format' => 'H:i',
						'return_format' => 'H:i',
						'parent_repeater' => 'field_5cb5d1e557da7',
					),
					array(
						'key' => 'field_5d24824b81f30',
						'label' => 'To',
						'name' => 'to',
						'aria-label' => '',
						'type' => 'time_picker',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_5d2485b63993f',
									'operator' => '==',
									'value' => '1',
								),
							),
						),
						'wrapper' => array(
							'width' => '25',
							'class' => '',
							'id' => '',
						),
						'display_format' => 'H:i',
						'return_format' => 'H:i',
						'parent_repeater' => 'field_5cb5d1e557da7',
					),
				),
			),
			array(
				'key' => 'field_6421b5f691d9f',
				'label' => 'Order by',
				'name' => 'order_by',
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
					'left_right' => 'Left to right',
					'top_bottom' => 'Top to bottom',
				),
				'default_value' => false,
				'return_format' => 'value',
				'multiple' => 0,
				'allow_null' => 0,
				'ui' => 0,
				'ajax' => 0,
				'placeholder' => '',
			),
			array(
				'key' => 'field_5cb5d0a02790f',
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
				'key' => 'field_5d4d322a7c97c',
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
					'value' => 'switch/open',
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