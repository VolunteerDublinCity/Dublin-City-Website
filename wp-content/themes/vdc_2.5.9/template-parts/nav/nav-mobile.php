<!-- Mobile -->
<?php 
	$parent = end(get_post_ancestors( $post ));
	if(empty($parent)){
		$parent = $post->ID;
	}

	if($parent == 4){
		$section = "vol"; }

	else if($parent == 6){
		$section = "org"; }
		
	else {
		$section = "null"; }
?>
<!-- <h1><? echo $parent; ?>, section: <? echo $section ?></h1> -->
<div class="mobile-nav hidden-lg <?php echo $section; ?>">
	<div class="container">
		<?php 
			$logo_white = get_field('mobile_logo', 'options');
			$logo_color = get_field('mobile_logo_color', 'options');
		?>

		<a href="<?php echo esc_url( home_url() ); ?>" class="logo_out">
			<img class="show logo" src="<?php echo $logo_white['url'] ?>" alt="<?php echo $logo_white['alt'] ?>">
		</a>
		<img class="hidden logo" src="<?php echo $logo_color['url'] ?>" alt="<?php echo $logo_color['alt'] ?>">

		<div class="vdc-mobile-header-btns">
			<a id="vol" href="<?php echo esc_url( home_url( '/vol' ) ); ?>" class="vdc-mobile-header-btn blue">Volunteers</a>		
			<a id="org" href="<?php echo esc_url( home_url( '/org' ) ); ?>" class="vdc-mobile-header-btn purple">Organisation</a>	
		</div>
		
		<button type="button" class="hamburger <?php echo get_field('mobile_menu_icon', 'options'); ?>" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="hamburger-box">
				<span class="hamburger-inner"></span>
			</span>
	    </button>
	</div>

	
	
	<div class="mobile-menu">
		<?php 
		if ($section == 'vol') {
			wp_nav_menu( array(
				'menu'              	=> 'vol_mob',
				'theme_location'    => 'vol_mob',
				'depth'             		=> 1,
				'container'         	=> 'div',
				'container_class'   	=> '',
				'container_id'     	=> '',
				'menu_class'        	=> '',
				// 'link_before' 		=> '<span>',
				// 'link_after' 			=> '</span>',
				'fallback_cb'       	=> 'wp_bootstrap_navwalker::fallback',
				'walker'           		=> new vdc_navwalker())
			);
		} elseif ($section == 'org') {
			wp_nav_menu( array(
				'menu'              	=> 'org_mob',
				'theme_location'    => 'org_mob',
				'depth'             		=> 1,
				'container'         	=> 'div',
				'container_class'   	=> '',
				'container_id'     	=> '',
				'menu_class'        	=> '',
				// 'link_before' 		=> '<span>',
				// 'link_after' 			=> '</span>',
				'fallback_cb'       	=> 'wp_bootstrap_navwalker::fallback',
				'walker'           		=> new vdc_navwalker())
			);
		} else {
			wp_nav_menu( array(
				'menu'              	=> 'gen_top_mob',
				'theme_location'    => 'gen_top_mob',
				'depth'             		=> 2,
				'container'         	=> 'div',
				'container_class'   	=> '',
				'container_id'     	=> '',
				'menu_class'        	=> '',
				// 'link_before' 		=> '<span>',
				// 'link_after' 			=> '</span>',
				'fallback_cb'       	=> 'wp_bootstrap_navwalker::fallback',
				'walker'           		=> new vdc_navwalker())
			);
		}
		?>
	</div>
	
</div>