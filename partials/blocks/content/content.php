<?php 
		
// vars

$align = get_field('align');
$background = get_field('background');
$id = get_field('id');

?>

<div id="<?php echo $id; ?>" class="content content--<?php echo $align; ?> content--<?php echo $background; ?>">

	<?php

	if( have_rows('flexible_content') ):

		while ( have_rows('flexible_content') ) : the_row();

			if( get_row_layout() == 'button' ):

				// vars

				$button_left = get_sub_field('button_left');
				$button_right = get_sub_field('button_right');

				?>
								
				<div class="content__button-container">

					<div class="wrapper">

						<?php if ($button_left || $button_right ): ?>

							<?php if ($button_left): ?>

								<a class="button button--filled-secondary" href="<?php echo $button_left['url']; ?>" target="<?php echo $button_left['target']; ?>"><?php echo $button_left['title']; ?></a>

							<?php endif; ?>

							<?php if ($button_right): ?>

								<a class="button button--filled-secondary" href="<?php echo $button_right['url']; ?>" target="<?php echo $button_right['target']; ?>"><?php echo $button_right['title']; ?></a>

							<?php endif; ?>

						<?php endif; ?>
					
					</div>

				</div>
				
				<?php

			endif;

			if( get_row_layout() == 'image' ):

				?>

				<div class="content__image">
					
					<?php

					if( have_rows('repeater') ): 
				
						?>

						<div class="content__slider slider">
							
							<?php while ( have_rows('repeater') ) : the_row();
			
								// vars

								$image = get_sub_field('image');
			
								?>

								<img src="<?php echo $image['sizes']['1920-16-9']; ?>" alt="<?php echo $image['title']; ?>">
			
							<?php endwhile; ?>

						</div>
				
						<?php 
				
					endif;

					?>

				</div>

				<?php

			endif;

			if( get_row_layout() == 'spacer' ):

				// vars
				$margin = get_sub_field('margin');

				?>
								
				<div class="content__spacer content__spacer--<?php echo $margin; ?>"></div>
				
				<?php

			endif;

			if( get_row_layout() == 'text' ):

				?>
								
				<div class="content__text wysiwyg">

					<div class="wrapper">

						<?php the_sub_field('text'); ?>

					</div>

				</div>
				
				<?php

			endif;

			if( get_row_layout() == 'text_code' ):

				?>
								
				<div class="content__text-code wysiwyg">

					<div class="wrapper">

						<?php

						// vars

						$text = get_sub_field('text');
						$button_left = get_sub_field('button_left');
						$button_right = get_sub_field('button_right');
						$code = get_sub_field('code');

						?>

						<div class="content__col content__col--text">

							<?php if ($text): ?>

								<?php echo $text; ?>

							<?php endif; ?>

							<?php if ($button_left || $button_right ): ?>

								<div class="content__button-container">

									<?php if ($button_left): ?>

										<a class="button button--filled-secondary" href="<?php echo $button_left['url']; ?>" target="<?php echo $button_left['target']; ?>"><?php echo $button_left['title']; ?></a>

									<?php endif; ?>

									<?php if ($button_right): ?>

										<a class="button button--filled-secondary" href="<?php echo $button_right['url']; ?>" target="<?php echo $button_right['target']; ?>"><?php echo $button_right['title']; ?></a>

									<?php endif; ?>

								</div>

							<?php endif; ?>

						</div>
								
						<div class="content__col content__col--code">

							<?php echo $code; ?>

						</div>

					</div>

				</div>
				
				<?php

			endif;

			if( get_row_layout() == 'text_image' ):

				?>

				<div class="content__text-image wysiwyg">

					<div class="wrapper">

						<?php

						// vars

						$text = get_sub_field('text');
						$button_left = get_sub_field('button_left');
						$button_right = get_sub_field('button_right');
						$image = get_sub_field('image');
						$image_size = get_sub_field('full_image');
						$turn_around = get_sub_field('turn_around');

						?>

						<div class="content__col content__col--text <?php if ($turn_around) { ?>turn_around<?php } ?>">

							<?php if ($text): ?>

								<?php echo $text; ?>

							<?php endif; ?>

							<?php if ($button_left || $button_right ): ?>

								<div class="content__button-container">

									<?php if ($button_left): ?>

										<a class="button button--filled-secondary" href="<?php echo $button_left['url']; ?>" target="<?php echo $button_left['target']; ?>"><?php echo $button_left['title']; ?></a>

									<?php endif; ?>

									<?php if ($button_right): ?>

										<a class="button button--filled-secondary" href="<?php echo $button_right['url']; ?>" target="<?php echo $button_right['target']; ?>"><?php echo $button_right['title']; ?></a>

									<?php endif; ?>

								</div>

							<?php endif; ?>

						</div>
								
						<div class="content__col content__col--image <?php if ($image_size) { ?>image_size<?php } ?>">

							<img src="<?php echo $image['sizes']['1280-16-9']; ?>" alt="<?php echo $image['title']; ?>">

						</div>

					</div>

				</div>
				
				<?php

			endif;

			if( get_row_layout() == 'text_video' ):

				?>

				<div class="content__text-video wysiwyg">

					<div class="wrapper">

						<?php

						// vars

						$text = get_sub_field('text');
						$button_left = get_sub_field('button_left');
						$button_right = get_sub_field('button_right');
						$image = get_sub_field('image');
						$video = get_sub_field('video');

						?>

						<div class="content__col content__col--text">

							<?php if ($text): ?>

								<?php echo $text; ?>

							<?php endif; ?>

							<?php if ($button_left || $button_right ): ?>

								<div class="content__button-container">

									<?php if ($button_left): ?>

										<a class="button button--filled-secondary" href="<?php echo $button_left['url']; ?>" target="<?php echo $button_left['target']; ?>"><?php echo $button_left['title']; ?></a>

									<?php endif; ?>

									<?php if ($button_right): ?>

										<a class="button button--filled-secondary" href="<?php echo $button_right['url']; ?>" target="<?php echo $button_right['target']; ?>"><?php echo $button_right['title']; ?></a>

									<?php endif; ?>

								</div>

							<?php endif; ?>

						</div>
								
						<div class="content__col content__col--video">

							<div class="content__video-container">
								
								<img src="<?php echo $image['sizes']['1280-16-9']; ?>" alt="<?php echo $image['title']; ?>">

								<?php echo $video; ?>

							</div>

						</div>

					</div>

				</div>
				
				<?php

			endif;

			if( get_row_layout() == 'video' ):

				// vars

				$image = get_sub_field('image');
				$video = get_sub_field('video');

				?>
								
				<div class="content__video">

					<div class="content__video-container">
							
						<img src="<?php echo $image['sizes']['1920-16-9']; ?>" alt="<?php echo $image['title']; ?>">

						<?php echo $video; ?>

					</div>

				</div>
				
				<?php

			endif;

		endwhile;

		else:

        ?> <p>No content added.</p> <?php

        endif; 

        ?>

</div>

<?php

// ACF

if ( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_5c3cacb0f0985',
		'title' => 'Block: Content',
		'fields' => array(
			array(
				'key' => 'field_5c3cbc09c3f3f',
				'label' => 'Flexible content',
				'name' => 'flexible_content',
				'aria-label' => '',
				'type' => 'flexible_content',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layouts' => array(
					'layout_5cfa2d2e9cb70' => array(
						'key' => 'layout_5cfa2d2e9cb70',
						'name' => 'button',
						'label' => 'Button',
						'display' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_5f16d9b969a2f',
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
								'key' => 'field_5f16d9d769a30',
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
						),
						'min' => '',
						'max' => '',
					),
					'layout_5c45bbf76588d' => array(
						'key' => 'layout_5c45bbf76588d',
						'name' => 'image',
						'label' => 'Image',
						'display' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_5c45bc026588e',
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
										'key' => 'field_5d403d0581de2',
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
										'parent_repeater' => 'field_5c45bc026588e',
									),
								),
							),
						),
						'min' => '',
						'max' => '',
					),
					'layout_5cfa526d38c61' => array(
						'key' => 'layout_5cfa526d38c61',
						'name' => 'spacer',
						'label' => 'Spacer',
						'display' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_5cfa527538c64',
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
									'none' => 'None',
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
						),
						'min' => '',
						'max' => '',
					),
					'layout_5cf1204f130d3' => array(
						'key' => 'layout_5cf1204f130d3',
						'name' => 'text',
						'label' => 'Text',
						'display' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_5cf1204f130d4',
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
						),
						'min' => '',
						'max' => '',
					),
					'layout_5d08ba0db9304' => array(
						'key' => 'layout_5d08ba0db9304',
						'name' => 'text_code',
						'label' => 'Text + code',
						'display' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_5d08ba87b9308',
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
								'key' => 'field_5d08bbb5a7029',
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
								'key' => 'field_5f16eb57c1ab4',
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
								'key' => 'field_5ef5c0d352e6d',
								'label' => 'Code',
								'name' => 'code',
								'aria-label' => '',
								'type' => 'textarea',
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
								'maxlength' => '',
								'rows' => '',
								'new_lines' => '',
							),
						),
						'min' => '',
						'max' => '',
					),
					'layout_5f16f70e75472' => array(
						'key' => 'layout_5f16f70e75472',
						'name' => 'text_image',
						'label' => 'Text + image',
						'display' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_5f16f70e75473',
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
								'key' => 'field_5f16f70e75474',
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
								'key' => 'field_5f16f70e75475',
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
								'key' => 'field_5f16f70e75476',
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
								'preview_size' => 'medium',
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
								'key' => 'field_6421af4712b9b',
								'label' => 'Full image',
								'name' => 'full_image',
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
								'default_value' => 0,
								'ui' => 0,
								'ui_on_text' => '',
								'ui_off_text' => '',
							),
							array(
								'key' => 'field_6421afcc12b9c',
								'label' => 'Turn around',
								'name' => 'turn_around',
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
								'default_value' => 0,
								'ui' => 0,
								'ui_on_text' => '',
								'ui_off_text' => '',
							),
						),
						'min' => '',
						'max' => '',
					),
					'layout_5e4e9768ddbec' => array(
						'key' => 'layout_5e4e9768ddbec',
						'name' => 'text_video',
						'label' => 'Text + video',
						'display' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_5e4e9768ddbef',
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
								'key' => 'field_5e4e9768ddbf0',
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
								'key' => 'field_5f16eb7fc1ab6',
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
								'key' => 'field_5e4e979f9a5e9',
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
								'preview_size' => 'medium',
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
								'key' => 'field_5e4e9779ddbf1',
								'label' => 'Video',
								'name' => 'video',
								'aria-label' => '',
								'type' => 'oembed',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'width' => '',
								'height' => '',
							),
							array(
								'key' => 'field_6421b1550952a',
								'label' => 'Full image',
								'name' => 'full_image',
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
								'default_value' => 0,
								'ui' => 0,
								'ui_on_text' => '',
								'ui_off_text' => '',
							),
							array(
								'key' => 'field_6421aff912b9d',
								'label' => 'Turn around',
								'name' => 'turn_around',
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
								'default_value' => 0,
								'ui' => 0,
								'ui_on_text' => '',
								'ui_off_text' => '',
							),
						),
						'min' => '',
						'max' => '',
					),
					'layout_5e4e6ab961ce8' => array(
						'key' => 'layout_5e4e6ab961ce8',
						'name' => 'video',
						'label' => 'Video',
						'display' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_5e4e7f2497c50',
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
								'preview_size' => 'medium',
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
								'key' => 'field_5e4e6ac061ce9',
								'label' => 'Video',
								'name' => 'video',
								'aria-label' => '',
								'type' => 'oembed',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'width' => '',
								'height' => '',
							),
						),
						'min' => '',
						'max' => '',
					),
				),
				'min' => '',
				'max' => '',
				'button_label' => 'Add Row',
			),
			array(
				'key' => 'field_5cfa2c2589a4d',
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
					'right' => 'Right',
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
				'key' => 'field_5cf9194719174',
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
				'key' => 'field_5d4d319d9a3c9',
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
					'value' => 'switch/content',
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