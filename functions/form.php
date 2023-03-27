<?php 

// change submit input to button	

add_filter( 'gform_submit_button', 'teamswitch_form_submit_button', 10, 2 );
function teamswitch_form_submit_button( $button, $form ) {
	return "
		<button class='button' id='gform_submit_button_{$form['id']}'>
			{$form['button']['text']}
		</button>
	";				
}

// change submit button spinner

add_filter( 'gform_ajax_spinner_url', 'teamswitch_custom_gforms_spinner' );
function teamswitch_custom_gforms_spinner( $src ) {
	return get_stylesheet_directory_uri() . '/img/icons/loading.svg';
}

// change next and previous input to button

add_filter( 'gform_next_button', 'input_to_button', 10, 2 );
add_filter( 'gform_previous_button', 'input_to_button', 10, 2 );
// add_filter( 'gform_submit_button', 'input_to_button', 10, 2 );
function input_to_button( $button, $form ) {
	$dom = new DOMDocument();
	$dom->loadHTML( $button );
	$input = $dom->getElementsByTagName( 'input' )->item(0);
	$new_button = $dom->createElement( 'button' );
	$new_button->appendChild( $dom->createTextNode( $input->getAttribute( 'value' ) ) );
	$input->removeAttribute( 'value' );
	foreach( $input->attributes as $attribute ) {
		$new_button->setAttribute( $attribute->name, $attribute->value );
	}
	$input->parentNode->replaceChild( $new_button, $input );

	return $dom->saveHtml( $new_button );
}

// move euro sign to the left

add_filter("gform_currencies", "update_currency");
function update_currency($currencies) {
	$currencies['EUR'] = array(
		'name' => esc_html__( 'Euro', 'gravityforms' ),
		'symbol_left' => '&#8364;',
		'symbol_right' => '',
		'symbol_padding' => ' ',
		'thousand_separator' => '.',
		'decimal_separator' => ',',
		'decimals' => 2
	);

	return $currencies;
}

?>