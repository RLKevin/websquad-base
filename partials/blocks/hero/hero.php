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

$slider_id = wp_unique_id( 'hero' );

$template = get_template_directory();

// $first_image_half = $repeater_half[0]['image']['sizes']['1280-4-3'];
// console_log($first_image_half);

?>

<section id="<?= $id; ?>" class="hero hero--<?= $background ?>">

	<?php if ($type == 'half_half_hero') { ?>
		
		<div class="hero__half_half">
			<div class="wrapper">
				<div class="hero__text wysiwyg wysiwyg--<?= $background ?>">

					<?php if ($title_half) { ?>
						<h1><?= $title_half; ?></h1>
					<?php } ?>

					<?php if ($subtitle_half): ?>
						<h3><?= $subtitle_half; ?></h3>
					<?php endif; ?>

					<?php if ($text_half): ?>
						<p><?= $text_half; ?></p>
					<?php endif; ?>

					<?php if ($button_left_half || $button_right_half ): ?>

						<div class="button-container">

							<?php if ($button_left_half): ?>

								<a class="button button--filled-primary" href="<?= $button_left_half['url']; ?>" target="<?= $button_left_half['target']; ?>"><?= $button_left_half['title']; ?></a>

							<?php endif; ?>

							<?php if ($button_right_half): ?>

								<a class="button button--filled-primary" href="<?= $button_right_half['url']; ?>" target="<?= $button_right_half['target']; ?>"><?= $button_right_half['title']; ?></a>

							<?php endif; ?>

						</div>

					<?php endif; ?>

				</div>
				
				<?php if ( have_rows('repeater_half') ) : ?>
					<div class="slider slider__hero--half" id="<?= $slider_id; ?>">
						<?php while( have_rows('repeater_half') ) : the_row(); 
							$image_half = get_sub_field('image');
							?>
							<div class="slide" style="background-image: url('<?= $image_half ? $image_half['sizes']['1280-4-3'] : ""; ?>')">
								<img loading="lazy" class="tns-lazy-img" data-src="<?= $image_half['sizes']['1280-4-3'] ?>">
							</div>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
				
				<script>
					if (typeof tns === 'function') {
						var slider = tns({
							container: '#<?= $slider_id; ?>',
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
			</div>
		</div>
		
	<?php }else{ ?>

		<div class="hero__slider slider" id="<?= $slider_id; ?>">

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
						
						<div class="hero__image" style="background-image: url('<?= $image ? $image['sizes']['1920-16-9'] : ""; ?>')">
							<?php if ($image) { ?>
								<img loading="lazy" class="tns-lazy-img" data-src="<?= $image['sizes']['1920-16-9']; ?>" alt="<?= $image['alt']; ?>">
							<?php }else{ ?>
								<img loading="lazy" class="tns-lazy-img" data-src="<?= $image_bg ?>" alt="bg image">
							<?php } ?>
						</div>
						
						<div class="hero__text">

							<div class="wrapper wysiwyg wysiwyg--black">

								<h2><?= $title; ?></h2>

								<h3><?= $subtitle; ?></h3>
							
								<?php if ($button_left || $button_right ): ?>
									<div class="button-container">

										<?php if ($button_left): ?>
											<a class="button button--filled-primary" href="<?= $button_left['url']; ?>" target="<?= $button_left['target']; ?>"><?= $button_left['title']; ?></a>
										<?php endif; ?>

										<?php if ($button_right): ?>
											<a class="button button--filled-primary" href="<?= $button_right['url']; ?>" target="<?= $button_right['target']; ?>"><?= $button_right['title']; ?></a>
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
			if (typeof tns === 'function') {
				var slider = tns({
					container: '#<?= $slider_id; ?>',
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
	<?php }
	
	if ($scroll): ?>

		<div class="hero__scroll-button">
			<a href="#<?= $scroll; ?>">
				<svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="arrow-down" class="svg-inline--fa fa-arrow-down fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M441.9 250.1l-19.8-19.8c-4.7-4.7-12.3-4.7-17 0L250 385.4V44c0-6.6-5.4-12-12-12h-28c-6.6 0-12 5.4-12 12v341.4L42.9 230.3c-4.7-4.7-12.3-4.7-17 0L6.1 250.1c-4.7 4.7-4.7 12.3 0 17l209.4 209.4c4.7 4.7 12.3 4.7 17 0l209.4-209.4c4.7-4.7 4.7-12.3 0-17z"></path></svg>
			</a>
		</div>
	
	<?php endif;



?>
</section>
