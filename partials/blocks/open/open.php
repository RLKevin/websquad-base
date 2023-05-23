<?php
		
// vars

$introduction = get_field('introduction');
$background = get_field('background');
$order_by = get_field('order_by');
$id = get_field('id');

?>

<section id="<?= $id; ?>" class="open open--<?= $background; ?>">

	<div class="wrapper">

		<?php if ($introduction) { ?>
			<div class="introduction wysiwyg wysiwyg--<?= $background; ?>">
				<?= $introduction; ?>
			</div>
		<?php } ?>

		<?php
		
		if( have_rows('repeater') ):

			?>

			<ul class="<?= $order_by; ?>" data-amount="<?= sizeof(get_field('repeater')); ?>">

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
								<?= $day ?>
							</span>
						
							<?= $from ? $from : "Gesloten" ?>
							
							<?= $to ? " - " . $to . " uur" : "" ?>

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

