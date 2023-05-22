<?php
		
// vars

$form = get_field('form_id');
$background = get_field('background');
$id = get_field('id');

?>

<section id="<?= $id; ?>" class="form form--<?= $background; ?>">

	<div class="wrapper">

		<?= do_shortcode('[gravityform id="' . $form . '" title="false" description="false" ajax="true"]'); ?>
		
	</div>

</section>

