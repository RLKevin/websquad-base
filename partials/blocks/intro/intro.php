<?php
		
// vars

$title = get_field('title');
$text = get_field('text');
$button_left = get_field('button_left');
$button_right = get_field('button_right');
$background = get_field('background');
$image = get_field('image');
$id = get_field('id');

?>

<section id="<?php echo $id; ?>" class="intro">

	<?php if ($title): ?>

		<div class="intro__title intro__title--<?php echo $background; ?>" <?php if ($image): ?>style="background-image: url('<?php echo $image['sizes']['1920-16-9']; ?>')"<?php endif; ?>>

			<div class="wrapper">

				<h1><?php echo $title; ?></h1>

			</div>

		</div>

	<?php endif; ?>

	<?php if ($text):?>
		
		<div class="intro__text wysiwyg">

			<div class="wrapper">

				<?php echo $text; ?>

				<?php if ($button_left || $button_right ): ?>

					<div class="intro__button-container">

						<?php if ($button_left): ?>

							<a class="button button--filled-secondary" href="<?php echo $button_left['url']; ?>" target="<?php echo $button_left['target']; ?>"><?php echo $button_left['title']; ?></a>

						<?php endif; ?>

						<?php if ($button_right): ?>

							<a class="button button--filled-secondary" href="<?php echo $button_right['url']; ?>" target="<?php echo $button_right['target']; ?>"><?php echo $button_right['title']; ?></a>

						<?php endif; ?>

					</div>

				<?php endif; ?>

			</div>	

		</div>

	<?php endif; ?>

</section>

<?php

// ACF

if ( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_5c29485ee3f51',
		'title' => 'Block: Intro',
		'fields' => array(
			array(
				'key' => 'field_5c3caa9f49c26',
				'label' => 'Title',
				'name' => 'title',
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
			array(
				'key' => 'field_5c3caaad49c28',
				'label' => 'Text',
				'name' => 'text',
				'aria-label' => '',
				'type' => 'wysiwyg',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => 0,
				'delay' => 0,
			),
			array(
				'key' => 'field_5c3caab549c29',
				'label' => 'Button',
				'name' => 'button_left',
				'aria-label' => '',
				'type' => 'link',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'array',
			),
			array(
				'key' => 'field_5d35d55922ee0',
				'label' => 'Button',
				'name' => 'button_right',
				'aria-label' => '',
				'type' => 'link',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'array',
			),
			array(
				'key' => 'field_5d09043278f3f',
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
					'image' => 'Image',
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
				'key' => 'field_5c3caaa449c27',
				'label' => 'Image',
				'name' => 'image',
				'aria-label' => '',
				'type' => 'image',
				'instructions' => 'Minimaal 1920 x 1080 px',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5d09043278f3f',
							'operator' => '==',
							'value' => 'image',
						),
					),
				),
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
			),
			array(
				'key' => 'field_5d4d2fe7ef2ad',
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
					'value' => 'switch/intro',
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