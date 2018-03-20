<?php
/**
 * Template part for displaying General Menu
 */

wp_nav_menu( array(
	'menu'              	=> 'general_top',
	'theme_location'    => 'general_top',
	'depth'             		=> 2,
	'container'         	=> 'div',
	'container_class'   	=> 'vdc-general-menu',
	'container_id'     	=> '',
	'menu_class'        	=> 'top-menu',
	// 'link_before' 		=> '<span>',
	// 'link_after' 			=> '</span>',
	'fallback_cb'       	=> 'wp_bootstrap_navwalker::fallback',
	'walker'           		=> new vdc_navwalker())
);
