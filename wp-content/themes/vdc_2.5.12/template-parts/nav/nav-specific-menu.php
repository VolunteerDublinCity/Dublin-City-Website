<?php
/**
 * Template part for displaying General Menu
 */

//find what the parent is
$parent = end(get_post_ancestors( $post ));

// if there is no parent, the current post is the parent
if(empty($parent)){
	$parent = $post->ID;}

if($parent == 4){
	$parent_page = "vol"; }

elseif($parent == 6){
	$parent_page = "org"; }


if ($parent_page == 'vol') {
	wp_nav_menu( array(
		'menu'              	=> 'vol_top',
		'theme_location'    => 'vol_top',
		'depth'             		=> 2,
		'container'         	=> 'div',
		'container_class'   	=> 'vdc-specific-menu',
		'container_id'     	=> '',
		'menu_class'        	=> 'top-menu',
		// 'link_before' 		=> '<span>',
		// 'link_after' 			=> '</span>',
		'fallback_cb'       	=> 'wp_bootstrap_navwalker::fallback',
		'walker'           		=> new vdc_navwalker())
	);
}
elseif ($parent_page == 'org') {
	wp_nav_menu( array(
		'menu'              	=> 'org_top',
		'theme_location'    => 'org_top',
		'depth'             		=> 2,
		'container'         	=> 'div',
		'container_class'   	=> 'vdc-specific-menu',
		'container_id'     	=> '',
		'menu_class'        	=> 'top-menu',
		// 'link_before' 		=> '<span>',
		// 'link_after' 			=> '</span>',
		'fallback_cb'       	=> 'wp_bootstrap_navwalker::fallback',
		'walker'           		=> new vdc_navwalker())
	);
}
else {
	wp_nav_menu( array(
		'menu'              	=> 'vol_top',
		'theme_location'    => 'vol_top',
		'depth'             		=> 2,
		'container'         	=> 'div',
		'container_class'   	=> 'vdc-specific-menu',
		'container_id'     	=> '',
		'menu_class'        	=> 'top-menu',
		// 'link_before' 		=> '<span>',
		// 'link_after' 			=> '</span>',
		'fallback_cb'       	=> 'wp_bootstrap_navwalker::fallback',
		'walker'           		=> new vdc_navwalker())
	);
}

