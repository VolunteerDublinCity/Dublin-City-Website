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
	
	// vars
	$logo_header = get_field('logo_header', 'options');
?>
<a class="vdc-logo-lrg" href="<?php echo home_url('/' . $parent_page); ?>" alt="<?php echo $parent_page ?>">

  	<?php if ( !empty($logo_header) ): ?>
	
		<img src="<?php echo $logo_header['url']; ?>" alt="<?php echo $logo_header['alt']; ?>">	

	<?php else: ?>
  	
            <?php bloginfo('name'); ?>

        <?php endif; ?>
 </a>