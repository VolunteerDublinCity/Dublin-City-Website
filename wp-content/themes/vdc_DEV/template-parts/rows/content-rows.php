<?php if ( have_rows('page_layouts') ): ?>

	<!-- Start Parent While -->
	<?php while( have_rows('page_layouts') ): the_row();?>

		<!-- Full Width Rows -->
		<?php if ( get_row_layout() == 'full_width_row' ): ?>
		
			<?php get_template_part( 'template-parts/rows/content', 'fullwidth' ); ?>
		<!-- Content Block -->
		<?php elseif ( get_row_layout() == 'regular_content' ): ?>
		
			<?php get_template_part( 'template-parts/rows/content', 'regular' ); ?>
			
		<?php else: ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		

	<?php endwhile; ?>
	<!-- End Parent While -->

<?php endif; ?>
