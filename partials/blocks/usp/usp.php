<?php

// vars

$background = get_field('background');
$type = get_field('usp_type');
$title = get_field('title');
$id = get_field('id');
$slider_id = wp_unique_id('usp');

?>

<section id="<?= $id; ?>" class="usp usp--<?= $background; ?> usp--<?= $type ?>">

	<?php

	if( have_rows('repeater') ):

		?>
			
		<div id="<?= $slider_id ?>" class="usp__slider--<?= $type ?> slider">

			<?php if ($type == 'steps') { ?>
				<div>
					<div class="usp__slide usp__slide--first">
						
						<p>

							<?= $title; ?>
							
						</p>
						
					</div>
				</div>
			<?php } ?>

			<?php 
			
			while ( have_rows('repeater') ) : the_row();
				$text = get_sub_field('text');
				?>
				<div>
					<div class="usp__slide">
						<?php if ($type == 'steps') { ?>
							<h3></h3>
						<?php } ?>
						<p><?= $text; ?></p>

					</div>
				</div>
				<?php 
			
			endwhile; 
			
			?>
			
		</div>

		<?php if ($type == 'steps') { ?>
			<script>
				if (typeof tns === 'function') {
					var slider = tns({
						container: '#<?= $slider_id ?>',
						slideBy: 1,
						mouseDrag: true,
						controls: true,
						center: false,
						lazyload: true,
						nav: false,
						loop: false,
						autoHeight: false,
						responsive: {
							0: {
								items: 1,
								gutter: 24,
								edgePadding: 48,
							},
							960: {
								items: 2,
								gutter: 24,
								edgePadding: 48,
							},
							1280: {
								items: 3,
								gutter: 48,
								edgePadding: 96,
							},
							2650: {
								items: 5,
								gutter: 48,
								edgePadding: 96,
							},
						},
					});
				} else {
					// const slides = document.querySelectorAll('#<?= $slider_id; ?> > *');
					// // remove all but first slide
					// slides.forEach((slide, index) => {
					// 	if (index > 0) {
					// 		slide.classList.add('display-none');
					// 	}
					// });
				}
			</script>
		<?php }else{ ?>
			<script>
				if (typeof tns === 'function') {
					var slider = tns({
					container: '#<?= $slider_id ?>',
					slideBy: 1,
					mouseDrag: true,
					controls: false,
					controlsPosition: 'bottom',
					center: true,
					nav: false,
					loop: true,
					autoplay: true,
					autoplayTimeout: 3000,
					autoplayButtonOutput: false,
					autoWidth: true,
					responsive: {
						0: {
							gutter: 24,
							edgePadding: 48,
						},
						960: {
							gutter: 24,
							edgePadding: 48,
						},
						1280: {
							gutter: 48,
							edgePadding: 96,
						},
						2650: {
							gutter: 48,
							edgePadding: 96,
						},
					},
				});
				} else {
					// const slides = document.querySelectorAll('#<?= $slider_id; ?> > *');
					// // remove all but first slide
					// slides.forEach((slide, index) => {
					// 	if (index > 0) {
					// 		slide.classList.add('display-none');
					// 	}
					// });
				}
			</script>
		<?php }
	else: ?> 
		
		<p>No content added.</p> <?php

	endif;
	
	?>
</section>

