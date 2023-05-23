<?php
		
$introduction = get_field('introduction');
$background = get_field('background');
$id = get_field('id');

?>

<section id="<?= $id; ?>" class="faq faq--<?= $background; ?>">

	<div class="wrapper">

		<?php if ($introduction) { ?>
			<div class="introduction wysiwyg wysiwyg--<?= $background; ?>">
				<?= $introduction; ?>
			</div>
		<?php } ?>

		<?php
		
		if( have_rows('repeater') ):

			while ( have_rows('repeater') ) : the_row();

				// vars

				$question = get_sub_field('question');
				$answer = get_sub_field('answer');

				?>

				<div class="faq__container">

					<div class="faq__question">
						<p><?= $question; ?></p>
					</div>

					<div class="faq__answer wysiwyg wysiwyg--<?= $background; ?>">
						<?= $answer; ?>
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
