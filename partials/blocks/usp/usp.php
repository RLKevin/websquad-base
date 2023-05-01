<?php

// vars

$background = get_field('background');
$type = get_field('usp_type');
$title = get_field('title');
$id = get_field('id');

?>

<section id="<?php echo $id; ?>" class="usp usp--<?php echo $background; ?>">

	<?php

	if( have_rows('repeater') ):

		?>
			
		<div class="usp__slider--<?= $type ?> slider">

			<?php if ($type == 'steps') { ?>
				
				<div class="usp__slide usp__slide--first">
					
					<p>

						<?php echo $title; ?>
						
					</p>
					
				</div>

			<?php } ?>

			<?php 
			
			while ( have_rows('repeater') ) : the_row();

				// vars

				$text = get_sub_field('text');

				?>

				<div class="usp__slide">
					<?php if ($type == 'steps') { ?>
						<h3></h3>
					<?php } ?>
					<p>

						<?php echo $text; ?>

					</p>

				</div>

				<?php 
			
			endwhile; 
			
			?>
			
		</div>

		<?php 
	else:

		?> <p>No content added.</p> <?php

	endif;
	
	?>

				

</section>