<?php

$introduction = get_field('introduction');
$background = get_field('background');
$id = get_field('id');
$slider_id = wp_unique_id( 'reference' );
$references = get_field('references', 'option');

?>

<section id="<?= $id; ?>" class="reference reference--<?= $background; ?>">

	<div class="wrapper">

		<?php if ($introduction) { ?>
			<div class="introduction wysiwyg wysiwyg--<?= $background; ?>">
				<?= $introduction; ?>
			</div>
		<?php } ?>

		<?php if( $references ): 
			shuffle($references);
			?>

			<div class="reference__slider slider" id="<?= $slider_id; ?>">

				<?php

				foreach ($references as $ref) {
					$reference = $ref['reference'];
					$rating = $ref['rating'];
					$image = $ref['image'];
					$name = $ref['name'];
					$function = $ref['function'];
					?>

					<div class="slide">
						<div class="reference__container">
	
							<?php if ($rating != '0'): ?>
								<div class="reference__rating reference__rating--<?= $rating; ?>">
									<ul>
										<li></li>
										<li></li>
										<li></li>
										<li></li>
										<li></li>
									</ul>
								</div>
							<?php endif; ?>
	
							<?php if ($reference): ?>
								<div class="reference__text wysiwyg wysiwyg--<?= $background; ?>">
									<?= $reference; ?>
									<h3><?= $name; ?></h3>
								</div>
							<?php endif; ?>
	
							<?php if ($image) { ?>
								<div class="reference__person">
									<div class="reference__image">
										<img loading="lazy" src="<?= $image['sizes']['640-1-1']; ?>" alt="<?= $image['title']; ?>">
									</div>
								</div>
							<?php } ?>
	
						</div>
					</div>
							

				<?php } ?>

			</div>

			<script>
				if (typeof tns === 'function') {
					var slider = tns({
						container: '#<?= $slider_id; ?>',
						items: 1,
						slideBy: 1,
						mouseDrag: true,
						controls: true,
						controlsText: ['', ''],
						controlsPosition: 'bottom',
						center: true,
						edgePadding: 0,
						gutter: 32,
						lazyload: true,
						nav: false,
						loop: true,
						autoplay: false,
						autoplayButtonOutput: false,
						autoplayTimeout: 5000,
						autoplayHoverPause: true,
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

		<?php endif; ?>
	</div>
</section>
