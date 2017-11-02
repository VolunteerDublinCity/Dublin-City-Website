<?php get_template_part( 'template-parts/include', 'header' ); ?>
	<?php 
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$args = array(
			'post_type' => 'managing-volunteers',
			'posts_per_page' => 6,
		 	'paged' => $paged
		);

		$query = new WP_Query( $args ); 
		$count = $query->post_count;
	?>


	<?php if ( $query->have_posts() ) : ?>
	<div class="container vdc-blog-overview">
		<h1 class="text-center">Managing Volunteers</h1>
		<hr style="max-width: 80%;">
		<div class="row">
			<?php $i = 1; while ( $query->have_posts() ) : $query->the_post();?>	
				<div class="col-md-6">
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
				<?php if ($i % 2 == 0): ?>
					<div class="clearfix visible-sm-block visible-md-block visible-lg-block"></div>
					<?php if ($i < $count): ?>
						<hr>
					<?php endif ?>
					
				<?php endif; ?>		

			<?php $i++; endwhile; ?>
			<?php wp_reset_postdata(); ?>
		
		</div>
	<?php wbstarter_paging_nav(); ?>
	<?php else : ?>

		<?php get_template_part( 'template-parts/content', 'none' ); ?>

	</div>
	<?php endif; ?>
<?php get_footer(); ?>