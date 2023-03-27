<?php

    // custom image sizes

	add_action( 'after_setup_theme', 'teamswitch_image_sizes' );
	function teamswitch_image_sizes() {

		add_image_size( '640-16-9', 640, 360, true );
		add_image_size( '640-4-3', 640, 480, true );
		add_image_size( '640-1-1', 640, 640, true );
		add_image_size( '960-16-9', 960, 540, true );
		add_image_size( '960-4-3', 960, 720, true );
		add_image_size( '960-1-1', 960, 960, true );
		add_image_size( '1280-16-9', 1280, 720, true );
		add_image_size( '1280-4-3', 1280, 960, true );
		add_image_size( '1280-1-1', 1280, 1280, true );
		add_image_size( '1920-16-9', 1920, 1080, true );
		add_image_size( '1920-4-3', 1920, 1440, true );
		add_image_size( '1920-1-1', 1920, 1920, true );
		add_image_size( '2560-16-9', 2560, 1440, true );
		add_image_size( '2560-4-3', 2560, 1920, true );
		add_image_size( '2560-1-1', 2560, 2560, true );

		add_image_size( '640-0-0', 640 );
		add_image_size( '960-0-0', 960 );
		add_image_size( '1280-0-0', 1280 );
		add_image_size( '1920-0-0', 1920 );
		add_image_size( '2560-0-0', 2560 );

	}

	// responsive image loading

	function srcset($image, $size, $ratio = null) {

		$srcset = [];

		switch ($ratio) {

			case '16-9':

				if ($size >= 640) {
					array_push($srcset, $image['sizes']['640-16-9'] . ' 640w');
				}
		
				if ($size >= 960) {
					array_push($srcset, $image['sizes']['960-16-9'] . ' 960w');
				}
		
				if ($size >= 1280) {
					array_push($srcset, $image['sizes']['1280-16-9'] . ' 1280w');
				}
		
				if ($size >= 1920) {
					array_push($srcset, $image['sizes']['1920-16-9'] . ' 1920w');
				}
		
				if ($size >= 2560) {
					array_push($srcset, $image['sizes']['2560-16-9'] . ' 2560w');
				}

				break;

			case '4-3':

				if ($size >= 640) {
					array_push($srcset, $image['sizes']['640-4-3'] . ' 640w');
				}

				if ($size >= 960) {
					array_push($srcset, $image['sizes']['960-4-3'] . ' 960w');
				}
		
				if ($size >= 1280) {
					array_push($srcset, $image['sizes']['1280-4-3'] . ' 1280w');
				}
		
				if ($size >= 1920) {
					array_push($srcset, $image['sizes']['1920-4-3'] . ' 1920w');
				}
		
				if ($size >= 2560) {
					array_push($srcset, $image['sizes']['2560-4-3'] . ' 2560w');
				}

				break;

			case '1-1':

				if ($size >= 640) {
					array_push($srcset, $image['sizes']['640-1-1'] . ' 640w');
				}
		
				if ($size >= 960) {
					array_push($srcset, $image['sizes']['960-1-1'] . ' 960w');
				}
		
				if ($size >= 1280) {
					array_push($srcset, $image['sizes']['1280-1-1'] . ' 1280w');
				}
		
				if ($size >= 1920) {
					array_push($srcset, $image['sizes']['1920-1-1'] . ' 1920w');
				}
		
				if ($size >= 2560) {
					array_push($srcset, $image['sizes']['2560-1-1'] . ' 2560w');
				}

				break;
			
			default:

				if ($size >= 640) {
					array_push($srcset, $image['sizes']['640-0-0'] . ' 640w');
				}
		
				if ($size >= 960) {
					array_push($srcset, $image['sizes']['960-0-0'] . ' 960w');
				}
		
				if ($size >= 1280) {
					array_push($srcset, $image['sizes']['1280-0-0'] . ' 1280w');
				}
		
				if ($size >= 1920) {
					array_push($srcset, $image['sizes']['1920-0-0'] . ' 1920w');
				}
		
				if ($size >= 2560) {
					array_push($srcset, $image['sizes']['2560-0-0'] . ' 2560w');
				}

				break;
		}

		return implode(",", $srcset);

	}

?>