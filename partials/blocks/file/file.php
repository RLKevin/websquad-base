<?php
		
// vars

$background = get_field('background');
$id = get_field('id');

?>

<section id="<?php echo $id; ?>" class="files files--<?php echo $background; ?>">

	<div class="wrapper">

		<?php
		
		if( have_rows('repeater') ):

			while ( have_rows('repeater') ) : the_row();

				// vars

				$file = get_sub_field('file');
				if (!$file) {
					continue;
				}
				$filesize = $file['filesize'];
				$filesize = size_format($filesize, 0);
				$filetype = $file['subtype'];
				$download = get_sub_field('download');
				?>

				<a class="file <?php if ($download) { ?>download<?php } ?>" href="<?= $file['url']; ?>" <?php if ($download) { ?>download<?php } ?> target="_blank">
				
					<div class="name">
						<p><?= $file['title']; ?></p>	
					</div>

					<div class="info">
						<p><?= $filesize; ?></p>
						<p><?= $filetype; ?></p>
					</div>
				</a>

				<?php

			endwhile;

		else:

		?> <p>No files added.</p> <?php
	
		endif; 

		?>

	</div>
</section>
