<?php get_template_part( 'template-parts/include', 'header' ); ?>
	<?php if ( have_posts() ) : ?>

	<div class="container vdc-blog-overview">
		<h1 class="text-center">Posts Tagged  <?php single_tag_title(); ?></h1>
		<hr style="max-width: 80%;">
		<div class="row">
			
			
			<?php $i = 1; while ( have_posts() ) : the_post();?>	

				<div class="col-sm-6 col-md-4">
					<a href="<?php echo esc_url( get_permalink() ); ?>" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<h2><?php echo wbstarter_short_title( get_the_title(), 85); ?></h2>

						<?php if (has_post_thumbnail()) : ?>
							<div class="featured-image">
								<?php the_post_thumbnail('medium'); ?>
							</div>
						<?php endif; ?>

						<div class="entry-content index-excerpt">
							<?php
								echo wbstarter_excerpt('14');
							?>
						</div>
					</a>
				</div>
				<?php if ($i % 3 == 0): ?>
					<div class="clearfix visible-sm-block visible-md-block visible-lg-block"></div>
					<?php if ($i < $count): ?>
						<hr>
					<?php endif ?>
					
				<?php endif; ?>

			<?php $i++;  endwhile; wp_reset_postdata();?>

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
	<?php  endif; ?>
<?php get_footer(); ?>