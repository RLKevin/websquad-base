<?php

// vars

$background = get_field('background');
$type = get_field('usp_type');
$title = get_field('title');
$id = get_field('id');
$unique_id = wp_unique_id('slider-');

?>

<section id="<?php echo $id; ?>" class="usp usp--<?php echo $background; ?> usp--<?= $type ?>">

	<?php

	if( have_rows('repeater') ):

		?>
			
		<div id="<?= $unique_id ?>" class="usp__slider--<?= $type ?> slider">

			<?php if ($type == 'steps') { ?>
				<div>
					<div class="usp__slide usp__slide--first">
						
						<p>

							<?php echo $title; ?>
							
						</p>
						
					</div>
				</div>
			<?php } ?>

			<?php 
			
			while ( have_rows('repeater') ) : the_row();

				// vars

				$text = get_sub_field('text');

				?>
				<div>
					<div class="usp__slide">
						<?php if ($type == 'steps') { ?>
							<h3></h3>
						<?php } ?>
						<p>

							<?php echo $text; ?>

						</p>

					</div>
				</div>
				<?php 
			
			endwhile; 
			
			?>
			
		</div>

		<?php if ($type == 'steps') { ?>
			<script>
				var slider = tns({
					container: '#<?= $unique_id ?>',
					// items: 5.5,
					slideBy: 1,
					mouseDrag: true,
					controls: true,
					center: false,
					// gutter: 48,
					lazyload: true,
					nav: false,
					loop: false,
					autoHeight: false,
					responsive: {
						0: {
							items: 1.5,
							gutter: 24,
						},
						960: {
							items: 2.5,
							gutter: 24,
						},
						1280: {
							items: 3.5,
							gutter: 48,
						},
						2650: {
							items: 5.5,
							gutter: 48,
						},
					},
				});
			</script>
		<?php }else{ ?>
			<script>
				var slider = tns({
					container: '#<?= $unique_id ?>',
					items: 1,
					slideBy: 1,
					mouseDrag: true,
					controls: false,
					center: true,
					edgePadding: 0,
					margin: 32,
					gutter: 0,
					lazyload: true,
					nav: false,
					navPosition: 'bottom',
					loop: true,
					autoHeight: false,
				});
			</script>
		<?php }
	else: ?> 
		
		<p>No content added.</p> <?php

	endif;
	
	?>
</section>

<?php

// ACF

if ( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_5d4c234082364',
		'title' => 'Block: Usp',
		'fields' => array(
			array(
				'key' => 'field_6438011c4fa64',
				'label' => 'USP',
				'name' => '',
				'aria-label' => '',
				'type' => 'accordion',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'open' => 0,
				'multi_expand' => 0,
				'endpoint' => 0,
			),
			array(
				'key' => 'field_6421b7ddb7d6a',
				'label' => 'USP type',
				'name' => 'usp_type',
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
					'points' => 'Points',
					'steps' => 'Steps',
				),
				'default_value' => 'steps',
				'return_format' => 'value',
				'multiple' => 0,
				'allow_null' => 0,
				'ui' => 0,
				'ajax' => 0,
				'placeholder' => '',
			),
			array(
				'key' => 'field_6421b88fb7d6e',
				'label' => 'Title',
				'name' => 'title',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_6421b7ddb7d6a',
							'operator' => '==',
							'value' => 'steps',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'This is the title ...',
				'maxlength' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array(
				'key' => 'field_5d4c23408835b',
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
				'layout' => 'block',
				'pagination' => 0,
				'min' => 3,
				'max' => 10,
				'collapsed' => '',
				'button_label' => 'Add Row',
				'rows_per_page' => 20,
				'sub_fields' => array(
					array(
						'key' => 'field_5d4c24b4472ea',
						'label' => 'Text',
						'name' => 'text',
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
						'parent_repeater' => 'field_5d4c23408835b',
					),
				),
			),
			array(
				'key' => 'field_5d4c32d31b223',
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
				'key' => 'field_5d4d32a95dcb5',
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
					'value' => 'switch/usp',
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