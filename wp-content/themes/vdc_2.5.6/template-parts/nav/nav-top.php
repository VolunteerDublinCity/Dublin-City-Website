<?php 
	//find what the parent is
	$parent = end(get_post_ancestors( $post ));
	
	// if there is no parent, the current post is the parent
	if(empty($parent)){
		$parent = $post->ID;}
	
	if($parent == 4){
		$parent_page = "vol"; }

	elseif($parent == 6){
		$parent_page = "org"; }

$page_id = $post->ID;

if ( ( $parent_page == "vol" ) && ( $page_id != 4 ) ) {

	$nav_class = 'vol';
	$bredcrum_class = '';
	

} elseif ( ( $parent_page == "vol" ) && ( $page_id == 4 ) ) {
	
	$nav_class = 'vol-home transparent ';//navbar-fixed-top
	$bredcrum_class = 'fixed-top';

} elseif ( ( $parent_page == "org" ) && ( $page_id != 6 ) ) {

	$nav_class = 'org';

} elseif ( ( $parent_page == "org" ) && ( $page_id == 6 ) ) {
	
	$nav_class = 'org-home transparent ' ;//navbar-fixed-top
	$bredcrum_class = 'fixed-top';

} else {

	$nav_class = 'null';
	$bredcrum_class = '';

}
?>
<!-- Desktop -->
<div class="stack-context visible-lg">
	<nav id="<?php echo !empty( $parent_page ) ? $parent_page : 'no-cookie'; ?>" class="<?php echo $nav_class ?>">
		<div class="container vdc-top-nav">
			<div class="vdc-menu-logo">
				<?php get_template_part( 'template-parts/nav/nav', 'logo' ); ?>
			</div>
			<div class="vdc-menu-blocks">
				<!-- Nav Top Items -->
				<?php get_template_part( 'template-parts/nav/nav', 'top_blocks' ); ?>
				<!-- Nav Botom Items -->
				<?php get_template_part( 'template-parts/nav/nav', 'bottom_blocks' ); ?>
			</div>
		</div>
	</nav>
	<div class="breadcrums_main-tabs <?php echo $bredcrum_class .' '. $nav_class ?>">
		<div class="container flexy">
			<div class="vdc-breadcrumbs">
				<?php 
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb('<p id="breadcrumbs">','</p>');
					}
				?>
			</div>
			<div class="vdc-main-tabs">
				<ul>
					<li><a id="vol" href="<?php echo esc_url( home_url( '/vol' ) ); ?>" class="vol <?php echo ($parent_page == 'vol') ? 'active' : 'not-active' ?>">Volunteer</a></li>
					<li><a id="org" href="<?php echo esc_url( home_url( '/org' ) ); ?>" class="org <?php echo ($parent_page == 'org') ? 'active' : 'not-active' ?>">Organisation</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
