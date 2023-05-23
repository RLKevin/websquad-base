<?php 

// vars

$page_id = get_the_ID();

$introduction = get_field('introduction');

$card_type = get_field('card_type');
$align = get_field('align');
$background = get_field('background');
$color = get_field('color');
$id = get_field('id');
$image = get_field('image');
$style = get_field('style');

?>

<section id="<?= $id; ?>" class="cards card--<?= $align; ?> card--<?= $background; ?> card--<?= $color; ?> card--<?= $image; ?> card--<?= $style; ?>">
	<div class="wrapper">

		<?php if ($introduction) { ?>
			<div class="introduction wysiwyg wysiwyg--<?= $background; ?>">
				<?= $introduction; ?>
			</div>
		<?php } ?>
			
	<?php

		switch ($card_type) {
			case 'post':
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
						'paged' => $post_current_page,
						'post__not_in' => array($page_id),
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

						<div class="card__item">

							<?php if ($image): ?>

								<div class="card__image <?php if ($type == 'video'): ?>card__image--video<?php endif; ?>">
									<a href="<?= $button; ?>" <?php if ($post_type == 'facebook' || $post_type == 'projects' ): ?>target="_blank"<?php endif; ?>>
										<img loading="lazy" src="<?= $image; ?>" alt="<?= $title; ?>">
									</a>
								</div>

							<?php endif; ?>

							<?php if ($title || $button): ?>

								<div class="card__text wysiwyg">
									<?php if ($title) { ?>
										<h2><?= $title; ?></h2>
									<?php } ?>

									<?php if ($post_type == 'projects'): ?>
										<h3><?= $date; ?></h3>
									<?php endif; ?>
											
									<?php if ($button): ?>
										<div class="button-container">
											<a class="button button--filled-secondary" href="<?= $button; ?>">Bekijk</a>
										</div>
									<?php endif; ?>
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
				break;
			case 'child':
				$card_parent = get_field('card_child_parent');
				console_log($card_parent);
				$amount = get_field('card_child_parent');

				// args for child pages of parent page
				$args = array(
					'post_type' => 'page',
					'post_status' => 'publish',
					'post_parent' => $card_parent,
					'orderby' => array(
						'menu_order' => 'asc', 
						'post_date' => 'desc', 
					),
					'posts_per_page' => $amount,
					'post__not_in' => array($page_id),
				);
				
				$post_query = new WP_Query($args);
				console_log($post_query);
				if ($post_query->have_posts()) : 
					?> <div class="card__container"> <?php
						while ( $post_query->have_posts() ) :
							$post_query->the_post();
							$id = get_the_ID();
							$image = get_the_post_thumbnail_url($id, '960-1-1');
							$text = get_the_title();
							$button = get_the_permalink();

							?>

							<div class="card__item">

								<?php if ($image): ?>

									<div class="card__image">
										<a href="<?= $button; ?>">
											<img loading="lazy" src="<?= $image; ?>" alt="<?= $text; ?>">
										</a>
									</div>
									
								<?php endif; ?>

								<?php if ($text || $button): ?>

									<div class="card__text wysiwyg">
										<?php if ($text) { ?>
											<h2><?= $text; ?></h2>
										<?php } ?>
												
										<?php if ($button): ?>
											<div class="button-container">
												<a class="button button--filled-secondary" href="<?= $button; ?>">Bekijk</a>
											</div>
										<?php endif; ?>
									</div>

								<?php endif; ?>

							</div>
					
							<?php
						endwhile;
					?> </div> <?php
				else :
					?>
				
					<p>Geen berichten gevonden</p>
				
					<?php
				endif;
				
				wp_reset_postdata();
				break;
			case 'highlight':
				if( have_rows('card_custom_repeater') ): 
				
					?> <div class="card__container"> <?php

					while ( have_rows('card_custom_repeater') ) : the_row();

						// vars

						$image = get_sub_field('image');
						$text = get_sub_field('text');
						$button = get_sub_field('button');
				
						?>

						<div class="card__item">

							<?php if ($image): ?>

								<div class="card__image">

									<a <?php if ($button): ?>href="<?= $button['url']; ?>" target="<?= $button['target']; ?>"<?php endif; ?>>

										<img loading="lazy" src="<?= $image['sizes']['960-1-1']; ?>" alt="<?= $image['title']; ?>">
									
									</a>

								</div>

							<?php endif; ?>

							<?php if ($text || $button): ?>

								<div class="card__text wysiwyg">
									<?php if ($text) { ?>
										<?= $text; ?>
									<?php } ?>
											
									<?php if ($button): ?>
										<div class="button-container">
											<a class="button button--filled-secondary" href="<?= $button['url']; ?>" target="<?= $button['target']; ?>"><?= $button['title']; ?></a>
										</div>
									<?php endif; ?>
								</div>

							<?php endif; ?>

						</div>

						<?php 

					endwhile;

					?> </div> <?php

				else : ?>

					<p>Geen cards toegevoegd.</p>

				<?php endif;
				break;
			
			default:
				# code...
				break;
		}

	?>
	</div>
</section>

