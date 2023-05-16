<?php

// vars

$id = get_field('id');
$background = get_field('background');
$scroll = get_field('scroll');
$type = get_field('hero_type');

$title_half = get_field('hero_title') ?: get_the_title();
$subtitle_half = get_field('hero_subtitle');
$text_half = get_field('hero_text');
$button_left_half = get_field('hero_button_left');
$button_right_half = get_field('hero_button_right');
$repeater_half = get_field('repeater_half');

$template = get_template_directory();

// $first_image_half = $repeater_half[0]['image']['sizes']['1280-4-3'];
// console_log($first_image_half);

?>

<section id="<?php echo $id; ?>" class="hero hero--<?= $background ?>">

	<?php if ($type == 'half_half_hero') { ?>
		
		<div class="hero__half_half">
			<div class="wrapper">
				<div class="hero__text">

					<h1><?php echo $title_half; ?></h1>

					<?php if ($subtitle_half): ?>

						<h3><?php echo $subtitle_half; ?></h3>

					<?php endif; ?>

					<?php if ($text_half): ?>

						<p><?php echo $text_half; ?></p>

					<?php endif; ?>

					<?php if ($button_left_half || $button_right_half ): ?>

						<div class="hero__button-container">

							<?php if ($button_left_half): ?>

								<a class="button button--filled-primary" href="<?php echo $button_left_half['url']; ?>" target="<?php echo $button_left_half['target']; ?>"><?php echo $button_left_half['title']; ?></a>

							<?php endif; ?>

							<?php if ($button_right_half): ?>

								<a class="button button--filled-primary" href="<?php echo $button_right_half['url']; ?>" target="<?php echo $button_right_half['target']; ?>"><?php echo $button_right_half['title']; ?></a>

							<?php endif; ?>

						</div>

					<?php endif; ?>

				</div>
				
				<?php if ( have_rows('repeater_half') ) : ?>
					<div class="slider slider__hero--half">
						<?php while( have_rows('repeater_half') ) : the_row(); 
							$image_half = get_sub_field('image');
							?>
							<div class="slide">
								<img class="tns-lazy-img" data-src="<?= $image_half['sizes']['1280-4-3'] ?>">
							</div>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
				
				<script>
					var slider = tns({
						container: '.slider__hero--half',
						items: 1,
						slideBy: 1,
						mouseDrag: true,
						controls: false,
						center: true,
						edgePadding: 0,
						gutter: 0,
						lazyload: true,
						nav: false,
						navPosition: 'bottom',
						loop: true,
						autoHeight: false,
					});
				</script>
			</div>
		</div>
		
	<?php }else{ ?>

		<div class="hero__slider slider">

			<?php
			
			if( have_rows('repeater') ):
			
				while ( have_rows('repeater') ) : the_row();

					// vars
					
					$image = get_sub_field('image');
					$image_bg = NULL;

					if (!$image) {
						// $image_bg = $template . '/img/bg.jpg';
						// console_log($image_bg);
						$image_bg = get_template_directory() . '/screenshot.png';
					}

					$title = get_sub_field('title') ?: get_the_title();
					$subtitle = get_sub_field('subtitle');
					$button_left = get_sub_field('button_left');
					$button_right = get_sub_field('button_right');

					?>
					
					<div class="hero__container">	
						
						<div class="hero__image">
							<?php if ($image_bg) { ?>
								<img class="tns-lazy-img" data-src="<?= $image_bg ?>" alt="bg image">
							<?php }else{ ?>
								<img class="tns-lazy-img" data-src="<?= $image['sizes']['1920-16-9']; ?>" alt="<?= $image['alt']; ?>">
							<?php } ?>
						</div>
						
						<div class="hero__text">

							<div class="wrapper">

								<h2><?php echo $title; ?></h2>

								<h3><?php echo $subtitle; ?></h3>
							
								<?php if ($button_left || $button_right ): ?>

									<div class="hero__button-container">

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

					</div>

					<?php 
				
				endwhile; 
				
			endif;
		
			?>		
		</div>

		<script>
			var slider = tns({
				container: '.hero__slider',
				items: 1,
				slideBy: 1,
				mouseDrag: true,
				controls: true,
				controlsText: '',
				center: true,
				edgePadding: 0,
				gutter: 0,
				lazyload: true,
				nav: true,
				loop: true,
				autoHeight: false,
			});
		</script>
	<?php }
	
	if ($scroll): ?>

		<div class="hero__scroll-button">
			<a href="#<?php echo $scroll; ?>">
				<svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="arrow-down" class="svg-inline--fa fa-arrow-down fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M441.9 250.1l-19.8-19.8c-4.7-4.7-12.3-4.7-17 0L250 385.4V44c0-6.6-5.4-12-12-12h-28c-6.6 0-12 5.4-12 12v341.4L42.9 230.3c-4.7-4.7-12.3-4.7-17 0L6.1 250.1c-4.7 4.7-4.7 12.3 0 17l209.4 209.4c4.7 4.7 12.3 4.7 17 0l209.4-209.4c4.7-4.7 4.7-12.3 0-17z"></path></svg>
			</a>
		</div>
	
	<?php endif;



?>
</section>
<?php

// ACF

if ( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_5c2a106d51bd7',
		'title' => 'Block: Hero',
		'fields' => array(
			array(
				'key' => 'field_6437d6d661cae',
				'label' => 'Hero',
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
				'key' => 'field_6421b2df00a0a',
				'label' => 'Select type',
				'name' => 'hero_type',
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
					'full_hero' => 'Full image',
					'half_half_hero' => '50 / 50',
				),
				'default_value' => 'half_half_hero',
				'return_format' => 'value',
				'multiple' => 0,
				'allow_null' => 0,
				'ui' => 0,
				'ajax' => 0,
				'placeholder' => '',
			),
			array(
				'key' => 'field_5c2a106d55952',
				'label' => 'Repeater',
				'name' => 'repeater',
				'aria-label' => '',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_6421b2df00a0a',
							'operator' => '==',
							'value' => 'full_hero',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'pagination' => 0,
				'min' => 1,
				'max' => 0,
				'collapsed' => '',
				'button_label' => 'Add Row',
				'rows_per_page' => 20,
				'sub_fields' => array(
					array(
						'key' => 'field_5c2a106d590b5',
						'label' => 'Image',
						'name' => 'image',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => 'Minimaal 1920 x 1080 px',
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
						'parent_repeater' => 'field_5c2a106d55952',
					),
					array(
						'key' => 'field_5c2a106d590c7',
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
						'parent_repeater' => 'field_5c2a106d55952',
					),
					array(
						'key' => 'field_5c923d4f6aab5',
						'label' => 'Subtitle',
						'name' => 'subtitle',
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
						'default_value' => 'Subtitle here ...',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'parent_repeater' => 'field_5c2a106d55952',
					),
					array(
						'key' => 'field_5c937819bdd86',
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
						'parent_repeater' => 'field_5c2a106d55952',
					),
					array(
						'key' => 'field_5c937825bdd87',
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
						'parent_repeater' => 'field_5c2a106d55952',
					),
				),
			),
			array(
				'key' => 'field_6421b36800a0b',
				'label' => 'Repeater',
				'name' => 'repeater_half',
				'aria-label' => '',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_6421b2df00a0a',
							'operator' => '==',
							'value' => 'half_half_hero',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'pagination' => 0,
				'min' => 1,
				'max' => 0,
				'collapsed' => '',
				'button_label' => 'Add Row',
				'rows_per_page' => 20,
				'sub_fields' => array(
					array(
						'key' => 'field_6421b36800a0c',
						'label' => 'Image',
						'name' => 'image',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => 'Minimaal 1920 x 1080 px',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'array',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'preview_size' => 'thumbnail',
						'parent_repeater' => 'field_6421b36800a0b',
					),
				),
			),
			array(
				'key' => 'field_6421b38900a11',
				'label' => 'Title',
				'name' => 'hero_title',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_6421b2df00a0a',
							'operator' => '==',
							'value' => 'half_half_hero',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'maxlength' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array(
				'key' => 'field_6421b3a600a12',
				'label' => 'Subtitle',
				'name' => 'hero_subtitle',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_6421b2df00a0a',
							'operator' => '==',
							'value' => 'half_half_hero',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'Subtitle here ...',
				'maxlength' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array(
				'key' => 'field_6421b3b200a13',
				'label' => 'Text',
				'name' => 'hero_text',
				'aria-label' => '',
				'type' => 'textarea',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_6421b2df00a0a',
							'operator' => '==',
							'value' => 'half_half_hero',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'A nice text about you here ...',
				'maxlength' => '',
				'rows' => '',
				'placeholder' => '',
				'new_lines' => '',
			),
			array(
				'key' => 'field_6421b3c400a14',
				'label' => 'Button',
				'name' => 'hero_button_left',
				'aria-label' => '',
				'type' => 'link',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_6421b2df00a0a',
							'operator' => '==',
							'value' => 'half_half_hero',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'array',
			),
			array(
				'key' => 'field_6421b3d100a15',
				'label' => 'Button',
				'name' => 'hero_button_right',
				'aria-label' => '',
				'type' => 'link',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_6421b2df00a0a',
							'operator' => '==',
							'value' => 'half_half_hero',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'array',
			),
			array(
				'key' => 'field_5d5127381bdbe',
				'label' => 'Scroll',
				'name' => 'scroll',
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
				'key' => 'field_5d4d31b64e414',
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
			array(
				'key' => 'field_644b75b230448',
				'label' => 'Background color',
				'name' => 'background',
				'aria-label' => '',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_6421b2df00a0a',
							'operator' => '==',
							'value' => 'half_half_hero',
						),
					),
				),
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
				'return_format' => 'value',
				'multiple' => 0,
				'allow_null' => 0,
				'ui' => 0,
				'ajax' => 0,
				'placeholder' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'block',
					'operator' => '==',
					'value' => 'switch/hero',
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