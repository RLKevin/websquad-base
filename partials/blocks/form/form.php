<?php
		
// vars

$form = get_field('form');
$background = get_field('background');
$id = get_field('id');

?>

<section id="<?php echo $id; ?>" class="form form--<?php echo $background; ?>">

	<div class="wrapper">

		<?php echo do_shortcode('[gravityform id="' . $form . '" title="false" description="false" ajax="true"]'); ?>
		
	</div>

</section>

