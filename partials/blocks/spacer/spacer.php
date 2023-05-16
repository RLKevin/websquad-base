<?php
	
// vars

$margin = get_field('margin');
$background = get_field('background');
$border_color = '';
$id = get_field('id');

if ($margin == 'border') {
	$border_color = get_field('border_color');
}

?>

<section id="<?php echo $id; ?>" class="spacer spacer--<?php echo $background; ?> spacer--<?php echo $margin; ?> spacer--border-<?php echo $border_color; ?>"></section>

<?php

// ACF

if ( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_5cb7107c8e411',
		'title' => 'Block: Spacer',
		'fields' => array(
			array(
				'key' => 'field_5cb712836970a',
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
				'key' => 'field_5cb71093df534',
				'label' => 'Margin',
				'name' => 'margin',
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
					'positive' => 'Positive',
					'border' => 'Border',
					'negative' => 'Negative',
				),
				'default_value' => 'positive',
				'return_format' => 'value',
				'multiple' => 0,
				'allow_null' => 0,
				'ui' => 0,
				'ajax' => 0,
				'placeholder' => '',
			),
			array(
				'key' => 'field_6447e75e33156',
				'label' => 'Border color',
				'name' => 'border_color',
				'aria-label' => '',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5cb71093df534',
							'operator' => '==',
							'value' => 'border',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'primary' => 'Primary',
					'secondary' => 'Secondary',
					'white' => 'White',
					'grey' => 'Grey',
					'black' => 'Black',
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
				'key' => 'field_5f16be6b61ed0',
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
					'value' => 'switch/spacer',
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