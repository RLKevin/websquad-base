<?php

// vars
$id = get_field('id');

?>

<section id="<?php echo $id; ?>" class="gallery">

	<?php
	
	if( have_rows('repeater') ):

		?>
		
		<div class="gallery__slider slider">

			<?php 
			
			while ( have_rows('repeater') ) : the_row();

				// vars

				$image = get_sub_field('image');

				?>

				<img src="<?php echo $image['sizes']['1280-16-9']; ?>" alt="<?php echo $image['title']; ?>">

				<?php 
			
			endwhile; 
			
			?>
			
		</div>

		<?php 

	endif;

	?>

</section>