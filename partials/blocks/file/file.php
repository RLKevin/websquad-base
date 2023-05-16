<?php
		
// vars

$background = get_field('background');
$id = get_field('id');

?>

<section id="<?php echo $id; ?>" class="files files--<?php echo $background; ?>">

	<div class="wrapper">

		<?php
		
		if( have_rows('repeater') ):

			while ( have_rows('repeater') ) : the_row();

				// vars

				$file = get_sub_field('file');
				$filesize = $file['filesize'];
				$filesize = size_format($filesize, 0);
				$filetype = $file['subtype'];
				$download = get_sub_field('download');
				?>

				<a class="file <?php if ($download) { ?>download<?php } ?>" href="<?= $file['url']; ?>" <?php if ($download) { ?>download<?php } ?> target="_blank">
				
					<div class="name">
						<p><?= $file['title']; ?></p>	
					</div>

					<div class="info">
						<p><?= $filesize; ?></p>
						<p><?= $filetype; ?></p>
					</div>
				</a>

				<?php

			endwhile;

		else:

		?> <p>No files added.</p> <?php
	
		endif; 

		?>

	</div>
</section>

<?php

// ACF

if ( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_6447ea31f26fe',
		'title' => 'Block: File',
		'fields' => array(
			array(
				'key' => 'field_6447ea3203c86',
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
				'min' => 1,
				'max' => 0,
				'collapsed' => 'field_5e4bb59cf5826',
				'button_label' => 'Add Row',
				'rows_per_page' => 20,
				'sub_fields' => array(
					array(
						'key' => 'field_6447ea320616d',
						'label' => 'File',
						'name' => 'file',
						'aria-label' => '',
						'type' => 'file',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'array',
						'library' => 'all',
						'min_size' => '',
						'max_size' => '',
						'mime_types' => '',
						'parent_repeater' => 'field_6447ea3203c86',
					),
					array(
						'key' => 'field_6447ea502d7ad',
						'label' => 'Download',
						'name' => 'download',
						'aria-label' => '',
						'type' => 'true_false',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'message' => '',
						'default_value' => 1,
						'ui' => 0,
						'ui_on_text' => '',
						'ui_off_text' => '',
						'parent_repeater' => 'field_6447ea3203c86',
					),
				),
			),
			array(
				'key' => 'field_6447ea3203c90',
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
				'key' => 'field_6447ea3203c98',
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
					'value' => 'switch/file',
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