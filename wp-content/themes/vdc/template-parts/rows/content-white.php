<?php if ( get_row_layout() == 'white_row' ): ?>
<div class="wb-white-bg">
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