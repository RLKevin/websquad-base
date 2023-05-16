<?php
	
// vars

$margin = get_field('margin');
$background = get_field('background');
$border_color = '';
$id = get_field('id');

if ($margin == 'border') {
	$border_color = get_field('border_color');
}

?>

<section id="<?php echo $id; ?>" class="spacer spacer--<?php echo $background; ?> spacer--<?php echo $margin; ?> spacer--border-<?php echo $border_color; ?>"></section>

