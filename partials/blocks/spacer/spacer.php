<?php

$margin = get_field('margin');
$background = get_field('background');
$border_color = '';
$id = get_field('id');

if ($margin == 'border') {
	$border_color = get_field('border_color');
}

?>

<section id="<?= $id; ?>" class="spacer spacer--<?= $background; ?> spacer--<?= $margin; ?> spacer--border-<?= $border_color; ?>"></section>

