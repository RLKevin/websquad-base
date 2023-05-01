<?php
		
// vars

$background = get_field('background');
$order_by = get_field('order_by');
$id = get_field('id');

?>

<section id="<?php echo $id; ?>" class="open open--<?php echo $order_by; ?> open--<?php echo $background; ?>">

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

		else:

	?> <p>No open added.</p> <?php

	endif; 

		?>

	</div>
</section>