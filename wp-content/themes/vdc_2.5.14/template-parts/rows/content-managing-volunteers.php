<?php if ( get_row_layout() == 'managing_volunteers_blog' ) : ?>

	<?php 
		$args = array(
			'post_type' => 'managing-volunteers'
		);
		$query = new WP_Query($args);
	?>

	<?php if ( $query->have_posts() ) : ?>
	<div class="container vdc-blog-overview">
		<div class="row">

			<?php while ( $query->have_posts() ) : $query->the_post();?>	
				
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

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		
		</div>

	<?php wbstarter_paging_nav(); ?>

	<?php else : ?>

		<?php get_template_part( 'template-parts/content', 'none' ); ?>

	</div>
	<?php endif; ?>





<?php endif; ?>