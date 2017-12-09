<?php if ( get_row_layout() == 'dublin_ops' ): ?>
	<div class="wb-white-bg">
		<div class="container vdc-box-links">
			
			
			<? 
				$args = array(
					'numberposts'		=> -1,
					'post_type'			=> 'opp',
					'ignore_sticky_posts' => 1
				);
				
				$loop = new WP_Query( $args );
				$opp_categories = array();
				while ( $loop->have_posts() ) : $loop->the_post(); 
					array_push($opp_categories, get_field_object("opp_category"));
				endwhile;
			?>
			<? foreach (array_keys($opp_categories[0]["choices"]) as $paramName) { ?>
				<a href="<?php echo get_page_link(2991); ?>?c=<? echo $paramName; ?>" class="vdc-get-started-link vdc-get-started-link-blue vdc-can-i-volunteer-link-box">
					<i aria-hidden="true" role="presentation" class="icon icon-<? echo $paramName; ?>"></i>
					<p><? echo $opp_categories[0]["choices"][$paramName]; ?></p>
				</a>
			<? } ?>
			
			<a href="<?php echo get_page_link(2991); ?>?c=location" class="vdc-get-started-link vdc-get-started-link-blue vdc-can-i-volunteer-link-box">
				<i aria-hidden="true" role="presentation" class="icon icon-by-location"></i>
				<p>By Location</p>
			</a>
			

		</div>
	</div>
<?php endif; ?>