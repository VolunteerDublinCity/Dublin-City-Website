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
?>
<!-- Specific Menu  -->
<?php get_template_part( 'template-parts/nav/nav', 'specific-menu' ); ?>
