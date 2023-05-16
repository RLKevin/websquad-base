<?php
		
// vars

$background = get_field('background');
$id = get_field('id');

?>

<section id="<?php echo $id; ?>" class="faq faq--<?php echo $background; ?>">

	<div class="wrapper">

		<?php
		
		if( have_rows('repeater') ):

			while ( have_rows('repeater') ) : the_row();

				// vars

				$question = get_sub_field('question');
				$answer = get_sub_field('answer');

				?>

				<div class="faq__container">

					<div class="faq__question">
						<p><?php echo $question; ?></p>
					</div>

					<div class="faq__answer wysiwyg">
						<?php echo $answer; ?>
					</div>

				</div>

				<?php

			endwhile;

		else:

			?> <p>No content added.</p> <?php
			
		endif;

		?>

	</div>
</section>
