<?php get_template_part( 'template-parts/include', 'header' ); ?>
	<?php 
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$args = array(
		  'posts_per_page' => 9,
		  'paged'          => $paged,
		  'meta_query' => array(
				array(
					'key' => 'post_type_gen',
					'compare' => '==',
					'value' => '1'
				)
			)
		);
		$query = new WP_Query( $args ); 
		$count = $query->post_count;
		if ( $query->have_posts() ) : 
	?>
	<div class="container vdc-blog-overview">
		<h1 class="text-center">News</h1>
		<hr style="max-width: 80%;">
		
		<?php get_template_part( 'template-parts/post-roll', 'none' ); ?>
		
		<?php wp_reset_postdata(); ?>
	
	<div class="container">
	<?php wbstarter_paging_nav(); ?>

	</div>



	<section class="container pb2 pt2">
		<?php get_template_part( 'template-parts/tag-cloud', 'none' ); ?>
	</section>
	<?php else : ?>

		<?php get_template_part( 'template-parts/content', 'none' ); ?>

	</div>
	<?php endif; ?>
<?php get_footer(); ?>