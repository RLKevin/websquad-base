<?php
	
// vars

$margin = get_field('margin');
$background = get_field('background');
$id = get_field('id');

?>

<section id="<?php echo $id; ?>" class="spacer spacer--<?php echo $background; ?> spacer--<?php echo $margin; ?>"></section>

<?php

?>