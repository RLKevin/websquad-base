<?php 

// vars

$card_type = get_field('flexible_content');
$align = get_field('align');
$background = get_field('background');
$color = get_field('color');
$id = get_field('id');
$image = get_field('image');
$style = get_field('style');

?>

<section id="<?= $id; ?>" class="cards card--<?= $align; ?> card--<?= $background; ?> card--<?= $color; ?> card--<?= $image; ?> card--<?= $style; ?>">
	<div class="wrapper">
			
	<?php

		if( have_rows('flexible_content') ): ?>
			<div class="card__container">

			<?php

				while ( have_rows('flexible_content') ) : the_row();

					if( get_row_layout() == 'highlight' ):

						if( have_rows('repeater') ):

							while ( have_rows('repeater') ) : the_row();

								// vars

								$image = get_sub_field('image');
								$text = get_sub_field('text');
								$button = get_sub_field('button');
						
								?>

								<div class="card__item animate__animated animate__bounceInUp">

									<?php if ($image): ?>

										<div class="card__image">

											<a <?php if ($button): ?>href="<?= $button['url']; ?>" target="<?= $button['target']; ?>"<?php endif; ?>>

												<img src="<?= $image['sizes']['960-1-1']; ?>" alt="<?= $image['title']; ?>">
											
											</a>

										</div>

									<?php endif; ?>

									<?php if ($text): ?>

										<div class="card__text wysiwyg">

											<?= $text; ?>

										</div>

									<?php endif; ?>

									<?php if ($button): ?>

										<div class="card__button">

											<a class="button button--filled-secondary" href="<?= $button['url']; ?>" target="<?= $button['target']; ?>"><?= $button['title']; ?></a>

										</div>

									<?php endif; ?>

								</div>

								<?php 

							endwhile;
						
						endif;

					endif;

					if( get_row_layout() == 'child' ):
						?>
						<div class="card__container">

						<?php

						// vars

							$amount = get_field('card_amount');

							if (!$amount) {
								$amount = -1;
							}

							$child_parent = get_field('card_child_parent');
							$child_query = new WP_Query(
								array(  
									'post_parent' => $child_parent,
									'post_type' => 'page',
									'post_status' => 'publish',
									'orderby' => array(
										'menu_order' => 'asc'
									),
									'posts_per_page' => $amount,
									'paged' => $post_current_page
								)
							);

							while ( $child_query->have_posts() ) : $child_query->the_post();

								// vars

								$image = get_the_post_thumbnail_url($child->ID, '960-1-1');
								$text = get_the_title($child->ID);
								$button = get_the_permalink($child->ID);

								?>

								<div class="card__item animate__animated animate__bounceInUp">

									<?php if ($image): ?>

										<div class="card__image">

											<a href="<?= $button; ?>">

												<img src="<?= $image; ?>" alt="<?= $text; ?>">
											
											</a>

										</div>

									<?php endif; ?>

									<?php if ($text): ?>

										<div class="card__text">

											<h2><?= $text; ?></h2>

										</div>

									<?php endif; ?>

									<?php if ($button): ?>

										<div class="card__button">

											<a class="button button--filled-secondary" href="<?= $button; ?>">Bekijk</a>

										</div>

									<?php endif; ?>

								</div>

								<?php

							endwhile;

							wp_reset_postdata(); 

							?>

						</div>
						<?php
					endif;

					if( get_row_layout() == 'post'):
						$post_type = get_field('card_post_type');
						$post_per_page = get_field('card_amount');
						$post_more = get_field('card_more');
						$post_current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$post_query = new WP_Query(
							array(  
								'post_type' => $post_type,
								'post_status' => 'publish',
								'orderby' => array(
									'post_date' => 'desc', 
								),
								'posts_per_page' => $post_per_page,
								'paged' => $post_current_page
							)
						);
						$post_max_pages = $post_query->max_num_pages;
						$post_text_more = 'Laad meer';
						$post_text_loading = 'Aan het laden ...';
						$post_text_done = 'Uitgeladen';

						?>

						<div class="card__container" 
							
							data-post-type="<?= $post_type; ?>"
							data-post-per-page="<?= $post_per_page; ?>"
							data-post-max-pages="<?= $post_max_pages; ?>"
							data-post-text-more="<?= $post_text_more; ?>"
							data-post-text-loading="<?= $post_text_loading; ?>"
							data-post-text-done="<?= $post_text_done; ?>"
						
						>

							<?php
								
							while ( $post_query->have_posts() ) : $post_query->the_post();

								// vars

								$id = get_the_ID();

								if ($post_type == 'facebook'):

									$type = get_field('facebook_type', $id);
									$image = get_field('facebook_image', $id);
									$title = get_the_date('d.m.Y', $id);
									$text = get_field('facebook_text', $id);
									$button = get_field('facebook_link', $id);

								elseif ($post_type == 'projects'):

									$post = get_post($id);
									$blocks = parse_blocks($post->post_content);
									$type = '';
									$image = get_the_post_thumbnail_url($id, '960-1-1');
									$title = $blocks[0]['attrs']['data']['title'];
									$date = get_the_date('d.m.Y', $id);
									$text = $blocks[0]['attrs']['data']['text'];
									$button = $blocks[0]['attrs']['data']['button_left']['url'];

								else:

									$type = '';
									$image = get_the_post_thumbnail_url($id, '960-1-1');
									$title = get_the_title($id);
									$text = false;
									$button = get_the_permalink($id);

								endif;

								?>

								<div class="card__item animate__animated animate__bounceInUp">

									<?php if ($image): ?>

										<div class="card__image <?php if ($type == 'video'): ?>card__image--video<?php endif; ?>">

											<a href="<?= $button; ?>" <?php if ($post_type == 'facebook' || $post_type == 'projects' ): ?>target="_blank"<?php endif; ?>>

												<img src="<?= $image; ?>" alt="<?= $title; ?>">
											
											</a>

										</div>

									<?php endif; ?>

									<?php if ($title): ?>

										<div class="card__text">

											<h2><?= $title; ?></h2>

											<?php if ($post_type == 'projects'): ?>

												<h3><?= $date; ?></h3>
												
											<?php endif; ?>

											<?php if ($text): ?>

												<p><?= $text; ?></p>

											<?php endif; ?>
										</div>

									<?php endif; ?>

									<?php if ($button): ?>

										<div class="card__button">

											<a class="button button--filled-secondary" href="<?= $button; ?>" <?php if ($post_type == 'facebook' || $post_type == 'projects' ): ?>target="_blank"<?php endif; ?>>Bekijk</a>

										</div>

									<?php endif; ?>

								</div>

								<?php

							endwhile;

							?>

						</div>

						<?php 
						
						if ($post_more): 
						
							?>

							<div class="card__load-more">

								<button class="button button--filled-secondary <?= ($post_max_pages == 1) ? 'button--disabled' : '' ; ?>" <?= ($post_max_pages == 1) ? 'disabled' : '' ; ?>><?= ($post_max_pages == 1) ? $post_text_done : $post_text_more ; ?></button>

							</div>

							<?php 
						
						endif;

						wp_reset_postdata(); 
					endif;

				endwhile; ?>

			</div>
			
			<?php
		else:

			?> <p>No content added.</p> <?php

		endif; 

	?>
	</div>
</section>

<?php

// ACF

if ( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_5f182e3de2ce9',
		'title' => 'Block: Cards',
		'fields' => array(
			array(
				'key' => 'field_5f1830c94a8e9',
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
					'layout_5f1830ce07cf7' => array(
						'key' => 'layout_5f1830ce07cf7',
						'name' => 'highlight',
						'label' => 'Highlight',
						'display' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_5f183153e7106',
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
										'key' => 'field_5f18315ee7107',
										'label' => 'Image',
										'name' => 'image',
										'aria-label' => '',
										'type' => 'image',
										'instructions' => 'Minimaal 960 x 960 px',
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
										'parent_repeater' => 'field_5f183153e7106',
									),
									array(
										'key' => 'field_5f183165e7108',
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
										'parent_repeater' => 'field_5f183153e7106',
									),
									array(
										'key' => 'field_5f18316ee7109',
										'label' => 'Button',
										'name' => 'button',
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
										'parent_repeater' => 'field_5f183153e7106',
									),
								),
							),
						),
						'min' => '',
						'max' => '',
					),
					'layout_5f1831044a8ea' => array(
						'key' => 'layout_5f1831044a8ea',
						'name' => 'child',
						'label' => 'Child',
						'display' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_5f22b4dc15c95',
								'label' => 'Parent',
								'name' => 'parent',
								'aria-label' => '',
								'type' => 'post_object',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'post_type' => array(
									0 => 'page',
								),
								'taxonomy' => '',
								'allow_null' => 0,
								'multiple' => 0,
								'return_format' => 'id',
								'ui' => 1,
							),
							array(
								'key' => 'field_63da6713562d0',
								'label' => 'Amount',
								'name' => 'amount',
								'aria-label' => '',
								'type' => 'number',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'min' => '',
								'max' => '',
								'placeholder' => '',
								'step' => '',
								'prepend' => '',
								'append' => '',
							),
						),
						'min' => '',
						'max' => '',
					),
					'layout_5f18310a4a8eb' => array(
						'key' => 'layout_5f18310a4a8eb',
						'name' => 'post',
						'label' => 'Post',
						'display' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_5f1acfbeb97d5',
								'label' => 'Type',
								'name' => 'type',
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
									'blog' => 'Blog',
									'news' => 'News',
									'projects' => 'Projects',
									'vacancies' => 'Vacancies',
									'facebook' => 'Facebook',
								),
								'default_value' => 'news',
								'allow_null' => 0,
								'multiple' => 0,
								'ui' => 0,
								'return_format' => 'value',
								'ajax' => 0,
								'placeholder' => '',
							),
							array(
								'key' => 'field_5f1ad05fb97d6',
								'label' => 'Per page',
								'name' => 'per_page',
								'aria-label' => '',
								'type' => 'number',
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
								'min' => '',
								'max' => '',
								'step' => '',
							),
							array(
								'key' => 'field_5f1ad0fbdeb65',
								'label' => 'More',
								'name' => 'more',
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
								'ui' => 1,
								'ui_on_text' => 'Show',
								'ui_off_text' => 'Hide',
							),
						),
						'min' => '',
						'max' => '',
					),
				),
				'min' => 1,
				'max' => 1,
				'button_label' => 'Add Row',
			),
			array(
				'key' => 'field_5f182e91d4ebb',
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
				'key' => 'field_5f182e81d4eba',
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
				'key' => 'field_5f182f0291ae6',
				'label' => 'Color',
				'name' => 'color',
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
					'basic' => 'Basic',
				),
				'default_value' => 'basic',
				'return_format' => 'value',
				'multiple' => 0,
				'allow_null' => 0,
				'ui' => 0,
				'ajax' => 0,
				'placeholder' => '',
			),
			array(
				'key' => 'field_5f182e4281f20',
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
				'key' => 'field_5f182ec391ae5',
				'label' => 'Image',
				'name' => 'image',
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
					'icon' => 'Icon',
					'round' => 'Round',
					'full' => 'Full',
				),
				'default_value' => 'round',
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'return_format' => 'value',
				'ajax' => 0,
				'placeholder' => '',
			),
			array(
				'key' => 'field_612632f80b95a',
				'label' => 'Style',
				'name' => 'style',
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
					'three' => 'Three',
					'four' => 'Four',
				),
				'default_value' => 'four',
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'return_format' => 'value',
				'ajax' => 0,
				'placeholder' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'block',
					'operator' => '==',
					'value' => 'switch/cards',
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