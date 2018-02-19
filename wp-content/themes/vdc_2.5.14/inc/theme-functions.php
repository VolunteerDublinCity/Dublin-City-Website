<?php
function vdc_social_link($class = '', $email = false) {
	// Vars
	$social_links = array(
		'facebook' => get_field('facebook', 'options'),
		'twitter'	=> get_field('twitter', 'options'),
		'linkedin' => get_field('linkedin', 'options'),
		'pinterest' => get_field('pinterest', 'options'),
		'google' => get_field('google_plus', 'options'),
		'instagram' => get_field('instagram', 'options')
		// 'envelope' => get_field('email_address', 'options')
	);	
	if ($email == false) {
		unset($social_links['envelope']);
	}
	echo '<ul class="social-links">';
		foreach ($social_links as $key => $value) {
			if ($value) {
				$return = '<li>'; // Opening li element 
				$return .= '<a href="'.$value.'" class="social-'.$key.' hexagon" target="_blank">'; // Link
				$return .= '<i class="fa fa-'.$key.'"></i>'; // Icon
				$return .= '</a>'; //Close Link
				$return .= '</li>'; // Close li
				echo $return;
			}
		}
	echo '</ul>';
}


function vdc_social_link_plain($class = '', $email = false) {
	// Vars
	$social_links = array(
		'facebook' => get_field('facebook', 'options'),
		'twitter'	=> get_field('twitter', 'options'),
		'linkedin' => get_field('linkedin', 'options'),
		'pinterest' => get_field('pinterest', 'options'),
		'google' => get_field('google_plus', 'options'),
		'instagram' => get_field('instagram', 'options')
		// 'envelope' => get_field('email_address', 'options')
	);	
	if ($email == false) {
		unset($social_links['envelope']);
	}
	echo '<ul class="social-links">';
		foreach ($social_links as $key => $value) {
			if ($value) {
				$return = '<li>'; // Opening li element 
				$return .= '<a href="'.$value.'" target="_blank">'; // Link
				$return .= '<i class="fa fa-'.$key.'"></i>'; // Icon
				$return .= '</a>'; //Close Link
				$return .= '</li>'; // Close li
				echo $return;
			}
		}
	echo '</ul>';
}
