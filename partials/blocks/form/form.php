<?php
		
// vars

$introduction = get_field('introduction');
$form = get_field('form_id');
$background = get_field('background');
$id = get_field('id');

?>

<section id="<?= $id; ?>" class="form form--<?= $background; ?>">

	<div class="wrapper">

		<?php if ($introduction) { ?>
			<div class="introduction wysiwyg wysiwyg--<?= $background; ?>">
				<?= $introduction; ?>
			</div>
		<?php } ?>

		<?= do_shortcode('[gravityform id="' . $form . '" title="false" description="false" ajax="true"]'); ?>
		
	</div>

</section>

