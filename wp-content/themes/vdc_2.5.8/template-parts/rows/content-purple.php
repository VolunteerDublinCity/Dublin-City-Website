<?php if ( get_row_layout() == 'purple_row' ): ?>
<div class="wb-purple-bg">
	<?php
		$class = acf_column_count_class('columns');
	?>
	<?php if ( have_rows('columns') ): ?>
		
		<div class="container">
		
			<?php while ( have_rows('columns') ): the_row(); ?>
				
				<div class="<?php echo $class ?>">
					
					<?php the_sub_field('column'); ?>

				</div>
				
			<?php endwhile; ?>

		</div>

	<?php endif; ?>

</div>
<?php endif; ?>