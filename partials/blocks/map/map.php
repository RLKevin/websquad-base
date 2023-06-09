<?php
		
$map = get_field('map');
$id = get_field('id');

$company = get_field('options_contact_company', 'option');
$phone = get_field('options_contact_phone', 'option');
$phone_stripped = str_replace([' ', '-'], '', $phone);
$email = get_field('options_contact_email', 'option');
$street = get_field('options_contact_street', 'option');
$postal_code = get_field('options_contact_postal_code', 'option');
$city = get_field('options_contact_city', 'option');

?>

<section id="<?= $id; ?>" class="map">
		
	<div class="map__map">

		<div class="marker" data-lat="<?= $map['lat']; ?>" data-lng="<?= $map['lng']; ?>"></div>

	</div>

	<div class="wrapper">

		<div class="map__content">
			
			<h2><?= $company; ?></h2>
			
			<ul>

				<li>

					<?= $street; ?>

				</li>

				<li>

					<?= $postal_code; ?> <?= $city; ?>

				</li>

			</ul>
			
			<ul>
					
				<?php if ($phone): ?>

					<li>

						<a class="phone" href="tel:<?= $phone_stripped; ?>">
							<svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="mobile-android" class="svg-inline--fa fa-mobile-android fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M272 0H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h224c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48zm-6 464H54c-3.3 0-6-2.7-6-6V54c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v404c0 3.3-2.7 6-6 6zm-70-32h-72c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12v8c0 6.6-5.4 12-12 12z"></path></svg>
							<?= $phone; ?>
						</a>

					</li>

				<?php endif ?>

				<?php if ($email): ?>

					<li>

						<a class="mail" href="mailto:<?= $email; ?>">
							<svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="envelope-open" class="svg-inline--fa fa-envelope-open fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M494.586 164.516c-4.697-3.883-111.723-89.95-135.251-108.657C337.231 38.191 299.437 0 256 0c-43.205 0-80.636 37.717-103.335 55.859-24.463 19.45-131.07 105.195-135.15 108.549A48.004 48.004 0 0 0 0 201.485V464c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V201.509a48 48 0 0 0-17.414-36.993zM464 458a6 6 0 0 1-6 6H54a6 6 0 0 1-6-6V204.347c0-1.813.816-3.526 2.226-4.665 15.87-12.814 108.793-87.554 132.364-106.293C200.755 78.88 232.398 48 256 48c23.693 0 55.857 31.369 73.41 45.389 23.573 18.741 116.503 93.493 132.366 106.316a5.99 5.99 0 0 1 2.224 4.663V458zm-31.991-187.704c4.249 5.159 3.465 12.795-1.745 16.981-28.975 23.283-59.274 47.597-70.929 56.863C336.636 362.283 299.205 400 256 400c-43.452 0-81.287-38.237-103.335-55.86-11.279-8.967-41.744-33.413-70.927-56.865-5.21-4.187-5.993-11.822-1.745-16.981l15.258-18.528c4.178-5.073 11.657-5.843 16.779-1.726 28.618 23.001 58.566 47.035 70.56 56.571C200.143 320.631 232.307 352 256 352c23.602 0 55.246-30.88 73.41-45.389 11.994-9.535 41.944-33.57 70.563-56.568 5.122-4.116 12.601-3.346 16.778 1.727l15.258 18.526z"></path></svg>
							<?= $email; ?>
						</a>

					</li>

				<?php endif ?>

			</ul>

		</div>

	</div>

</section>

