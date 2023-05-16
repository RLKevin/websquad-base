<?php

// vars

$background = get_field('background');
$id = get_field('id');

?>

<section id="<?php echo $id; ?>" class="reference reference--<?php echo $background; ?>">

	<div class="wrapper">

	<?php

		if( have_rows('repeater', 'options') ): 

			?>

			<div class="reference__slider slider">

				<?php 
				
				while ( have_rows('repeater', 'options') ) : the_row();

					// vars

					$reference = get_sub_field('reference');
					$rating = get_sub_field('rating');
					$image = get_sub_field('image');
					$name = get_sub_field('name');
					$function = get_sub_field('function');
					// $phone = get_sub_field('phone', 'option');
					// $phone_stripped = str_replace([' ', '-'], '', $phone);
					// $email = get_sub_field('email', 'option');

					?>
							
					<div class="reference__container">

						<?php

						if ($rating != '0'):
						
							?>

							<div class="reference__rating reference__rating--<?php the_sub_field('rating'); ?>">

								<ul>

									<li></li>
									<li></li>
									<li></li>
									<li></li>
									<li></li>

								</ul>

							</div>

							<?php 
						
						endif; 
						
						?>

						<?php

						if ($reference):

							?>

							<div class="reference__text wysiwyg">
								
								<?php echo $reference; ?>

								<h3><?php echo $name; ?></h3>
							
							</div>

							<?php

						endif;

						?>

						<div class="reference__person">

							<div class="reference__image">

								<img src="<?php echo $image['sizes']['640-1-1']; ?>" alt="<?php echo $image['title']; ?>">

							</div>

						</div>

					</div>

					<?php 
			
				endwhile; 
				
				?>

			</div>

			<?php 

		endif;

		?>

	</div>
</section>
