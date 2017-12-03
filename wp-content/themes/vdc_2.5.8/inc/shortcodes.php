<?php
/*
* All shortcodes are generated here
*/
$vdc_shortcodes = array(
	'vdc_button'	=> array(
		'href' 		=> '',
		'title' 		=> '',
		'class'		=> '',
		'target'		=> '',
		'content'	=> ''
		),
	'vdc_line'		=> array(
		'color' 		=> '', 
		'size'		=> ''
		),
	'vdc_fa_icon'	=> array(
		'name' 		=> '', 
		'size'		=> '',
		'color'		=> '',
		'content'	=>	''
		)
	);
// VDCButtons
add_shortcode('vdc_button', function($atts, $content = null) {
	$atts = shortcode_atts( array(
		'href' 	=> '',
		'title' 	=> 'Default Title',
		'class'	=> 'btn-white',
		'target'	=> '_self'
	), $atts );
	
	$return_code = '<a href=" ' . $atts['href'] . ' " title=" ' . $atts['title'] . ' " class=" ' . $atts['class'] . ' " target="' . $atts['target'] .'">';
	$return_code .=  $content;
	$return_code .= '</a>';
	return $return_code;
	add_shortcode( 'vdc_button' );
		
});

// Horizontal line
add_shortcode( 'vdc_line', function( $atts ) {
	$atts = shortcode_atts( array(
		'color' 	=> 'lightgrey', 
		'size'	=> '1'
	), $atts );

	$return_code = '<hr style=" border-top: '.$atts['size'].'px solid '.$atts['color'].';  ">';
	return $return_code;
});
// Horizontal line
add_shortcode( 'vdc_headings', function( $atts, $content = nul ) {
	$atts = shortcode_atts( array(
		'color' 	=> 'lightgrey', 
		'size'	=> 'inherit'
	), $atts );

	$return_code = '<span style=" font-size: '.$atts['size'].'rem ;" class="'.$atts['color'].'">';
	$return_code .= $content;
	$return_code.= '</span>';
	return $return_code;
});

// Icons line
add_shortcode( 'vdc_fa_icon', function( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		'name' 	=> 'facebook', 
		'size'	=> '3',
		'class'	=> 'inherit'
	), $atts );

	$return_code = '<span class="fa fa-'.$atts['name'].' '.$atts['class'].'" style="font-size: '.$atts['size'].'rem;">';
	$return_code .= $content;
	$return_code.= '</span>';
	return $return_code;
});
// Icons line
add_shortcode( 'vdc_icon', function( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		'name' 	=> 'national-volunteering', 
		'size'	=> '',
		'color'	=> 'white'
	), $atts );

	$return_code = '<i class="font-page-icon icon-'.$atts['name'].' '.$atts['color'].' " style="font-size: '.$atts['size'].'rem;">';
	$return_code .= $content;
	$return_code.= '</i>';
	return $return_code;
});