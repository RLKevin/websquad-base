<?php

// vars

$background = get_field('background');
$type = get_field('usp_type');
$title = get_field('title');
$id = get_field('id');
$unique_id = wp_unique_id('slider-');

?>

<section id="<?php echo $id; ?>" class="usp usp--<?php echo $background; ?> usp--<?= $type ?>">

	<?php

	if( have_rows('repeater') ):

		?>
			
		<div id="<?= $unique_id ?>" class="usp__slider--<?= $type ?> slider">

			<?php if ($type == 'steps') { ?>
				<div>
					<div class="usp__slide usp__slide--first">
						
						<p>

							<?php echo $title; ?>
							
						</p>
						
					</div>
				</div>
			<?php } ?>

			<?php 
			
			while ( have_rows('repeater') ) : the_row();

				// vars

				$text = get_sub_field('text');

				?>
				<div>
					<div class="usp__slide">
						<?php if ($type == 'steps') { ?>
							<h3></h3>
						<?php } ?>
						<p>

							<?php echo $text; ?>

						</p>

					</div>
				</div>
				<?php 
			
			endwhile; 
			
			?>
			
		</div>

		<?php if ($type == 'steps') { ?>
			<script>
				var slider = tns({
					container: '#<?= $unique_id ?>',
					// items: 5.5,
					slideBy: 1,
					mouseDrag: true,
					controls: true,
					center: false,
					// gutter: 48,
					lazyload: true,
					nav: false,
					loop: false,
					autoHeight: false,
					responsive: {
						0: {
							items: 1.5,
							gutter: 24,
						},
						960: {
							items: 2.5,
							gutter: 24,
						},
						1280: {
							items: 3.5,
							gutter: 48,
						},
						2650: {
							items: 5.5,
							gutter: 48,
						},
					},
				});
			</script>
		<?php }else{ ?>
			<script>
				var slider = tns({
					container: '#<?= $unique_id ?>',
					items: 1,
					slideBy: 1,
					mouseDrag: true,
					controls: false,
					center: true,
					edgePadding: 0,
					margin: 32,
					gutter: 0,
					lazyload: true,
					nav: false,
					navPosition: 'bottom',
					loop: true,
					autoHeight: false,
				});
			</script>
		<?php }
	else: ?> 
		
		<p>No content added.</p> <?php

	endif;
	
	?>
</section>

