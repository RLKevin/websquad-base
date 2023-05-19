<?php 

// vars

$street = get_field('options_contact_street', 'option');
$postal_code = get_field('options_contact_postal_code', 'option');
$city = get_field('options_contact_city', 'option');

$image = get_field('options_footer_logo', 'option');

$privacy = get_field('options_footer_privacy', 'option');
$link = get_field('options_footer_link', 'option');
$link_alt = get_field('options_footer_link_alt', 'option');

$facebook = get_field('options_footer_facebook', 'option');
$twitter = get_field('options_footer_twitter', 'option');
$linkedin = get_field('options_footer_linkedin', 'option');
$instagram = get_field('options_footer_instagram', 'option');
$youtube = get_field('options_footer_youtube', 'option');

?>

<footer id="footer" class="footer">

	<div class="footer__topmenu">

		<div class="wrapper">

			<div class="footer__logo">

				<a href="<?php echo home_url(); ?>">

					<?php if ($image): ?>

						<img loading="lazy" src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>">

					<?php endif; ?>

				</a>
				
			</div>

			<div class="footer__social">

				<ul>
					
					<?php if ($facebook): ?>

						<li>

							<a class="facebook" href="<?php echo $facebook; ?>" target="_blank">
							</a>

						</li>

					<?php endif ?>

					<?php if ($twitter): ?>

						<li>

							<a class="twitter" href="<?php echo $twitter; ?>" target="_blank">
							</a>

						</li>

					<?php endif ?>

					<?php if ($linkedin): ?>

						<li>

							<a class="linkedin" href="<?php echo $linkedin; ?>" target="_blank">
							</a>

						</li>

					<?php endif ?>

					<?php if ($instagram): ?>

						<li>

							<a class="instagram" href="<?php echo $instagram; ?>" target="_blank">
							</a>

						</li>

					<?php endif ?>

					<?php if ($youtube): ?>

						<li>

							<a class="youtube" href="<?php echo $youtube; ?>" target="_blank">
							</a>

						</li>

					<?php endif ?>

				</ul>

			</div>

		</div>

	</div>

	<div class="footer__mainmenu">

		<div class="wrapper">

			<div class="footer__social">

				<ul>
					
					<?php if ($facebook): ?>

						<li>

							<a class="facebook" href="<?php echo $facebook; ?>" target="_blank">
							</a>

						</li>

					<?php endif ?>

					<?php if ($twitter): ?>

						<li>

							<a class="twitter" href="<?php echo $twitter; ?>" target="_blank">
							</a>

						</li>

					<?php endif ?>

					<?php if ($linkedin): ?>

						<li>

							<a class="linkedin" href="<?php echo $linkedin; ?>" target="_blank">
							</a>

						</li>

					<?php endif ?>

					<?php if ($instagram): ?>

						<li>

							<a class="instagram" href="<?php echo $instagram; ?>" target="_blank">
							</a>

						</li>

					<?php endif ?>

					<?php if ($youtube): ?>

						<li>

							<a class="youtube" href="<?php echo $youtube; ?>" target="_blank">
							</a>

						</li>

					<?php endif ?>

				</ul>

			</div>

			<div class="footer__disclaimer">

				<ul>

					<?php if ($privacy): ?>

						<li>

							<a href="<?php echo $privacy['url']; ?>" target="<?php echo $privacy['target']; ?>">
								<?php echo $privacy['title']; ?>
							</a>
						
						</li>

					<?php endif; ?>

					<?php if ($link): ?>

						<li>

							<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
								<?php echo $link['title']; ?>
							</a>
						
						</li>

					<?php endif; ?>

					<?php if ($link_alt): ?>

						<li>

							<a href="<?php echo $link_alt['url']; ?>" target="<?php echo $link_alt['target']; ?>">
								<?php echo $link_alt['title']; ?>
							</a>

						</li>

					<?php endif; ?>

				</ul>

				<ul class="address">

					<?php if ($street && $postal_code && $city): ?>
						
						<li><?php echo $street; ?></li>
						<li><?php echo $postal_code; ?></li>
						<li><?php echo $city; ?></li>

					<?php endif; ?>
				
				</ul>

				<ul>

					<li>

						<a href="https://websquad.nl/" target="_blank">

							Websquad © <?php echo date("Y"); ?>

						</a>

					</li>

				</ul>

			</div>

		</div>

	</div>

</footer>