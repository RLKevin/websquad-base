// color

$cl-black:					<?= get_field('options_customize_color_black', 'option') 			? get_field('options_customize_color_black', 'option') 			: '#030405'; ?>;
$cl-white:					<?= get_field('options_customize_color_white', 'option') 			? get_field('options_customize_color_white', 'option') 			: '#ffffff'; ?>;
$cl-grey:					<?= get_field('options_customize_color_grey', 'option') 			? get_field('options_customize_color_grey', 'option') 			: '#efefef'; ?>;
$cl-primary:				<?= get_field('options_customize_color_primary', 'option') 			? get_field('options_customize_color_primary', 'option') 		: '#5f207a'; ?>;
$cl-primary-text:			<?= get_field('options_customize_color_primary_text', 'option') 	? get_field('options_customize_color_primary_text', 'option') 	: '$cl-black'; ?>;
$cl-secondary:				<?= get_field('options_customize_color_secondary', 'option') 		? get_field('options_customize_color_secondary', 'option') 		: '#c6006d'; ?>;
$cl-secondary-text:			<?= get_field('options_customize_color_secondary_text', 'option') 	? get_field('options_customize_color_secondary_text', 'option') : '$cl-black'; ?>;
$cl-error:					<?= get_field('options_customize_color_error', 'option') 			? get_field('options_customize_color_error', 'option') 			: '#db4437'; ?>;
				
// font					
				
$fs-tiny:					<?= get_field('options_font_size', 'option') 						? get_field('options_font_size', 'option') * 0.75 				: 16 * 0.75; ?>px;
$fs-small:					<?= get_field('options_font_size', 'option') 						? get_field('options_font_size', 'option') 						: 16; ?>px;
$fs-medium:					<?= get_field('options_font_size', 'option') 						? get_field('options_font_size', 'option') * 1.25				: 16 * 1.25; ?>px;
$fs-large:					<?= get_field('options_font_size', 'option') 						? get_field('options_font_size', 'option') * 1.5				: 16 * 1.5; ?>px;
$fs-huge:					<?= get_field('options_font_size', 'option') 						? get_field('options_font_size', 'option') * 2					: 16 * 2; ?>px;			
				
$ls_medium:					<?= get_field('options_font_spacing', 'option') 					? get_field('options_font_spacing', 'option')					: 0.6; ?>px;
							
$lh-small:					<?= get_field('options_font_line_height', 'option') 				? get_field('options_font_line_height', 'option') * 0.6			: 1.2; ?>;
$lh-medium: 				<?= get_field('options_font_line_height', 'option') 				? get_field('options_font_line_height', 'option') *	0.8			: 1.6; ?>;
$lh-large: 					<?= get_field('options_font_line_height', 'option') 				? get_field('options_font_line_height', 'option')				: 2.0; ?>;					
				
$fw-light:					<?= get_field('options_font_weight_light', 'option') 				? get_field('options_font_weight_light', 'option') 				: '300'; ?>;
$fw-regular:				<?= get_field('options_font_weight_regular', 'option') 				? get_field('options_font_weight_regular', 'option') 			: '400'; ?>;
$fw-medium:					<?= get_field('options_font_weight_medium', 'option') 				? get_field('options_font_weight_medium', 'option') 			: '500'; ?>;
$fw-bold:					<?= get_field('options_font_weight_bold', 'option') 				? get_field('options_font_weight_bold', 'option') 				: '700'; ?>;
			
$ff-primary:				<?= get_field('options_font_family_primary', 'option') 				? get_field('options_font_family_primary', 'option') 			: "'lexia', serif"; ?>;
$ff-secondary:				<?= get_field('options_font_family_secondary', 'option') 			? get_field('options_font_family_secondary', 'option') 			: "'Lato', sans-serif"; ?>;

// shape

$br-rectangle-top-left:		<?= get_field('options_shape_rectangle_top_left', 'option') 		? get_field('options_shape_rectangle_top_left', 'option') 		: '0'; ?>px;
$br-rectangle-top-right:	<?= get_field('options_shape_rectangle_top_right', 'option') 		? get_field('options_shape_rectangle_top_right', 'option') 		: '0'; ?>px;
$br-rectangle-bottom-right:	<?= get_field('options_shape_rectangle_bottom_left', 'option') 		? get_field('options_shape_rectangle_bottom_left', 'option') 	: '0'; ?>px;
$br-rectangle-bottom-left:	<?= get_field('options_shape_rectangle_bottom_right', 'option') 	? get_field('options_shape_rectangle_bottom_right', 'option') 	: '0'; ?>px;

$br-square-top-left:		<?= get_field('options_shape_square_top_left', 'option') 			? get_field('options_shape_square_top_left', 'option') 			: '0'; ?>px;
$br-square-top-right:		<?= get_field('options_shape_square_top_right', 'option') 			? get_field('options_shape_square_top_right', 'option') 		: '0'; ?>px;
$br-square-bottom-right:	<?= get_field('options_shape_square_bottom_left', 'option') 		? get_field('options_shape_square_bottom_left', 'option') 		: '0'; ?>px;
$br-square-bottom-left:		<?= get_field('options_square_rectangle_bottom_right', 'option') 	? get_field('options_square_rectangle_bottom_right', 'option') 	: '0'; ?>px;