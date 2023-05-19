<?php 
		
// vars

$align = get_field('align');
$background = get_field('background');
$id = get_field('id');

?>

<section id="<?= $id; ?>" class="content content--<?= $align; ?> content--<?= $background; ?>">

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

						<div class="button-container">

							<?php if ($button_left || $button_right ): ?>
	
								<?php if ($button_left): ?>
									<a class="button button--filled-secondary" href="<?= $button_left['url']; ?>" target="<?= $button_left['target']; ?>"><?= $button_left['title']; ?></a>
								<?php endif; ?>
	
								<?php if ($button_right): ?>
									<a class="button button--filled-secondary" href="<?= $button_right['url']; ?>" target="<?= $button_right['target']; ?>"><?= $button_right['title']; ?></a>
								<?php endif; ?>
	
							<?php endif; ?>

						</div>

					
					</div>

				</div>
				
				<?php

			endif;

			if( get_row_layout() == 'image' ):

				?>

				<div class="content__image">

					<div class="wrapper">
						<?php

						$slider_id = wp_unique_id( 'content' );

						if( have_rows('repeater') ): 
					
							?>

							<div class="content__slider slider" id="<?= $slider_id; ?>">
								
								<?php while ( have_rows('repeater') ) : the_row();
				
									// vars

									$image = get_sub_field('image');
				
									?>

									<img loading="lazy" src="<?= $image['sizes']['1920-16-9']; ?>" alt="<?= $image['title']; ?>">
				
								<?php endwhile; ?>

							</div>

							<script>
								if (typeof tns === 'function') {
									var slider = tns({
										container: '#<?= $slider_id; ?>',
										responsive: {
										0: {
											gutter: 12,
										},
										1280: {
											gutter: 24,
										},
										2560: {
											gutter: 48,
										},
									},
										items: 1,
										slideBy: 1,
										mouseDrag: true,
										controls: true,
										controlsText: '',
										center: true,
										edgePadding: 0,
										lazyload: true,
										nav: true,
										loop: true,
										autoHeight: false,
									});
								} else {
									const slides = document.querySelectorAll('#<?= $slider_id; ?> > *');
									// remove all but first slide
									slides.forEach((slide, index) => {
										if (index > 0) {
											slide.classList.add('display-none');
										}
									});
								}
		</script>
					
							<?php 
					
						endif;

						?>
					</div>
					

				</div>

				<?php

			endif;

			// TODO: fix or remove spacer

			if( get_row_layout() == 'spacer' ):

				// vars
				$margin = get_sub_field('margin');

				?>
								
				<div class="content__spacer content__spacer--<?= $margin; ?>"></div>
				
				<?php

			endif;

			if( get_row_layout() == 'text' ):

				?>
								
				<div class="content__text">

					<div class="wrapper">

						<div class="text-container wysiwyg wysiwyg--<?= $background; ?>">
							<?php the_sub_field('text'); ?>
						</div>

					</div>

				</div>
				
				<?php

			endif;

			if( get_row_layout() == 'text_code' ):

				?>
								
				<div class="content__text-code">

					<?php

					// vars

					$text = get_sub_field('text');
					$button_left = get_sub_field('button_left');
					$button_right = get_sub_field('button_right');
					$code = get_sub_field('code');
					$turn_around = get_sub_field('turn_around');

					?>

					<div class="wrapper <?= $turn_around ? 'turn-around' : ''; ?>">

						<div class="text-container wysiwyg wysiwyg--<?= $background; ?>">

							<?php if ($text): ?>
								<?= $text; ?>
							<?php endif; ?>

							<?php if ($button_left || $button_right ): ?>

								<div class="button-container">

									<?php if ($button_left): ?>
										<a class="button button--filled-secondary" href="<?= $button_left['url']; ?>" target="<?= $button_left['target']; ?>"><?= $button_left['title']; ?></a>
									<?php endif; ?>

									<?php if ($button_right): ?>
										<a class="button button--filled-secondary" href="<?= $button_right['url']; ?>" target="<?= $button_right['target']; ?>"><?= $button_right['title']; ?></a>
									<?php endif; ?>

								</div>

							<?php endif; ?>

						</div>
								
						<div class="code-container">
							<?= $code; ?>
						</div>

					</div>

				</div>
				
				<?php

			endif;

			if( get_row_layout() == 'text_image' ):

				?>

				<div class="content__text-image">

					<?php

					// vars

					$text = get_sub_field('text');
					$button_left = get_sub_field('button_left');
					$button_right = get_sub_field('button_right');
					$image = get_sub_field('image');
					$image_size = get_sub_field('full_image');
					$turn_around = get_sub_field('turn_around');

					?>

					<div class="wrapper <?= $turn_around ? 'turn-around' : ''; ?>">

						<div class="text-container wysiwyg wysiwyg--<?= $background; ?>">

							<?php if ($text): ?>

								<?= $text; ?>

							<?php endif; ?>

							<?php if ($button_left || $button_right ): ?>

								<div class="button-container">

									<?php if ($button_left): ?>

										<a class="button button--filled-secondary" href="<?= $button_left['url']; ?>" target="<?= $button_left['target']; ?>"><?= $button_left['title']; ?></a>

									<?php endif; ?>

									<?php if ($button_right): ?>

										<a class="button button--filled-secondary" href="<?= $button_right['url']; ?>" target="<?= $button_right['target']; ?>"><?= $button_right['title']; ?></a>

									<?php endif; ?>

								</div>

							<?php endif; ?>

						</div>
								
						<div class="image-container <?php if ($image_size) { ?>image_size<?php } ?>">

							<img loading="lazy" src="<?= $image['sizes']['1280-16-9']; ?>" alt="<?= $image['title']; ?>">

						</div>

					</div>

				</div>
				
				<?php

			endif;

			if( get_row_layout() == 'text_video' ):

				?>

				<div class="content__text-video">

					<?php

					// vars

					$text = get_sub_field('text');
					$button_left = get_sub_field('button_left');
					$button_right = get_sub_field('button_right');
					$image = get_sub_field('image');
					$video = get_sub_field('video');
					$turn_around = get_sub_field('turn_around');

					?>

					<div class="wrapper <?= $turn_around ? 'turn-around' : ''; ?>">

						<div class="text-container wysiwyg wysiwyg--<?= $background; ?>">

							<?php if ($text): ?>
								<?= $text; ?>
							<?php endif; ?>

							<?php if ($button_left || $button_right ): ?>
								<div class="button-container">

									<?php if ($button_left): ?>
										<a class="button button--filled-secondary" href="<?= $button_left['url']; ?>" target="<?= $button_left['target']; ?>"><?= $button_left['title']; ?></a>
									<?php endif; ?>

									<?php if ($button_right): ?>
										<a class="button button--filled-secondary" href="<?= $button_right['url']; ?>" target="<?= $button_right['target']; ?>"><?= $button_right['title']; ?></a>
									<?php endif; ?>

								</div>

							<?php endif; ?>

						</div>
								
						<div class="video-container">
							<img loading="lazy" src="<?= $image['sizes']['1280-16-9']; ?>" alt="<?= $image['title']; ?>">
							<?= $video; ?>
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

					<div class="wrapper">
						<div class="video-container">
							<img loading="lazy" src="<?= $image['sizes']['1920-16-9']; ?>" alt="<?= $image['title']; ?>">
							<?= $video; ?>
						</div>
					</div>


				</div>
				
				<?php

			endif;

		endwhile;

		else:

        ?> <p>No content added.</p> <?php

        endif; 

        ?>

</section>