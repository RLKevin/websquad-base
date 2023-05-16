<?php
		
// vars

$background = get_field('background');
$id = get_field('id');

?>

<section id="<?php echo $id; ?>" class="table table--<?php echo $background; ?>">

	<div class="wrapper">

		<?php

		if( have_rows('repeater') ):
			
			?>

			<ul>

			<?php
	
			while ( have_rows('repeater') ) : the_row();

				// vars

				$type = get_sub_field('type');
				$left = get_sub_field('left_column');
				$right = get_sub_field('right_column');

				?>

					<li class="table__row table__row--<?php echo $type; ?>">
						
						<?php if ($left): ?>

							<span class="table__col table__col--left"><?php echo $left; ?></span>
						
						<?php endif; ?>

						<?php if ($right): ?>

							<span class="table__col table__col--right"><?php echo $right; ?></span>
							
						<?php endif; ?>
						
					</li>

				<?php

			endwhile;

			?>

			</ul>

			<?php
		
		else: ?> 
		<p>No table added.</p> <?php

		endif; 

		?>

	</div>
</section>

<?php

// ACF

if ( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_5cf906708cc81',
		'title' => 'Block: Table',
		'fields' => array(
			array(
				'key' => 'field_5cf90693731d5',
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
				'max' => 0,
				'layout' => 'block',
				'button_label' => 'Add Row',
				'rows_per_page' => 20,
				'sub_fields' => array(
					array(
						'key' => 'field_5cf906aa731d6',
						'label' => 'Type',
						'name' => 'type',
						'aria-label' => '',
						'type' => 'select',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '20',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							'normal' => 'Normal',
							'title' => 'Title',
							'note' => 'Note',
						),
						'default_value' => 'normal',
						'allow_null' => 0,
						'multiple' => 0,
						'ui' => 0,
						'return_format' => 'value',
						'ajax' => 0,
						'placeholder' => '',
						'parent_repeater' => 'field_5cf90693731d5',
					),
					array(
						'key' => 'field_5cf906c4731d7',
						'label' => 'Left column',
						'name' => 'left_column',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '40',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'parent_repeater' => 'field_5cf90693731d5',
					),
					array(
						'key' => 'field_5cf906d0731d8',
						'label' => 'Right column',
						'name' => 'right_column',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_5cf906aa731d6',
									'operator' => '==',
									'value' => 'normal',
								),
							),
						),
						'wrapper' => array(
							'width' => '40',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'parent_repeater' => 'field_5cf90693731d5',
					),
				),
			),
			array(
				'key' => 'field_5cf9071e731da',
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
				'default_value' => 'Grey',
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'return_format' => 'value',
				'ajax' => 0,
				'placeholder' => '',
			),
			array(
				'key' => 'field_5d4d329e3f4f5',
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
					'value' => 'switch/table',
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