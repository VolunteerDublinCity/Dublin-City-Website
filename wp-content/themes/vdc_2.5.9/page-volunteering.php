<?php get_template_part( 'template-parts/include', 'header' ); ?>
	<?php 
		// $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; 
		// $wp_query = new WP_Query( array( 'paged' => $paged ) );
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 6,
			'paged' => $paged,
			
			'meta_query' => array(
				array(
					'key' => 'post_type_vol',
					'compare' => '==',
					'value' => '1'
				)
			)

		);

		$wp_query = new WP_Query( $args ); 
		$count = $wp_query->post_count;
	?>

 
	<?php if ( $wp_query->have_posts() ) : ?>
	<div class="container vdc-blog-overview">
		
		<h1 class="text-center">Volunteering</h1>
		
		<hr style="max-width: 80%;">
		<div class="row">
			<?php if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
				<div class="col-md-6 nth-post-fix">
					<a href="<?php the_permalink(); ?>" <?php post_class(); ?>>

						<h2><?php the_title(); ?></h2>

						<?php if (has_post_thumbnail()) : ?>
							<div class="featured-image">
								<?php the_post_thumbnail(); ?>
							</div>
						<?php endif; ?>

						<div class="entry-content index-excerpt">
							<?php
								echo wbstarter_excerpt('26');
							?>
						</div>
					</a>
				</div>
			<?php endwhile; else: ?>
				<h1>Sorry...</h1>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
			<?php endif; ?>
			
			
			<?php wp_reset_postdata(); ?>
		
		</div>
	</div>
	<div class="container">
		<?php wbstarter_paging_nav(); ?>
	</div>



	<section class="container pb2 pt2">
		<?php //get_template_part( 'template-parts/tags', 'none' ); ?>
		<h2>Tags</h2>
		<hr>
		<div class="tag_cloud">
			<?php wp_tag_cloud('smallest=1&largest=1&unit=em'); ?>
		</div>
	</section>

	<?php else : ?>

		<?php get_template_part( 'template-parts/content', 'none' ); ?>

	</div>
	<?php endif; ?>
	

<?php get_footer(); ?>