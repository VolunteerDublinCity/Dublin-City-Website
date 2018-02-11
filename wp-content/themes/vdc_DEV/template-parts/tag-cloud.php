<h2>Tags</h2>
<hr>
<div class="tag_cloud">
	<?php 
		$args = array(
			'smallest'                  => 10, 
			'largest'                   => 18,
			'unit'                      => 'px', 
			'number'                    => 25,  
			'orderby'                   => 'count', 
			'order'                     => 'ASC'
		);
		wp_tag_cloud( $args ); 
	?>
</div>