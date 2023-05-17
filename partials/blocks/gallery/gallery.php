<?php

// vars
$id = get_field('id');
$slider_id = wp_unique_id( 'gallery' );

?>

<section id="<?php echo $id; ?>" class="gallery">

	<?php
	
	if( have_rows('repeater') ):

		?>
		
		<div class="gallery__slider slider" id="<?= $slider_id; ?>">

			<?php 
			
			while ( have_rows('repeater') ) : the_row();

				// vars

				$image = get_sub_field('image');

				?>

				<img src="<?php echo $image['sizes']['1280-16-9']; ?>" alt="<?php echo $image['title']; ?>">

				<?php 
			
			endwhile; 

			wp_reset_postdata();
			
			?>
			
		</div>

		<script>
			if (typeof tns === 'function') {
				var slider = tns({
					container: '#<?= $slider_id; ?>',
					responsive: {
						0: {
							items: 1,
						},
						1280: {
							items: 2,
						},
						2560: {
							items: 3,
						},
					},
					slideBy: 1,
					mouseDrag: true,
					controls: false,
					controlsText: '',
					center: true,
					edgePadding: 0,
					gutter: 0,
					lazyload: false,
					nav: false,
					loop: true,
					autoplay : true,
					autoplayTimeout : 5000,
					autoplayHoverPause: true,
					autoplayButton: false,
					autoplayButtonOutput: false,
					autoHeight: false,
				});
			} else {
				const slides = document.querySelectorAll('#<?= $slider_id; ?> > *');
				// remove all but first slide
				slides.forEach((slide, index) => {
					if (index > 0) {
						slide.remove();
					}
				});
			}
		</script>

		<?php 

	else:

		?> <p>No content added.</p> <?php
		
	endif;

	?>

</section>
