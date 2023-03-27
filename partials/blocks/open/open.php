<?php
		
// vars

$background = get_field('background');
$id = get_field('id');

?>

<section id="<?php echo $id; ?>" class="open open--<?php echo $align; ?> open--<?php echo $background; ?>">

	<div class="wrapper">

		<?php
		
		if( have_rows('repeater') ):

			?>

			<ul>

				<?php

				while ( have_rows('repeater') ) : the_row();

					// vars

					$day = get_sub_field('day');
					$from = get_sub_field('from');
					$to = get_sub_field('to');

					?>

					<li>

						<p>
						
							<span>
								<?php echo $day ?>
							</span>
						
							<?php echo $from ? $from : "Gesloten" ?>
							
							<?php echo $to ? " - " . $to . " uur" : "" ?>

						</p>
					
					</li>

					<?php

				endwhile;

				?>

			</ul>

			<?php

		endif;

		?>

	</div>
</section>