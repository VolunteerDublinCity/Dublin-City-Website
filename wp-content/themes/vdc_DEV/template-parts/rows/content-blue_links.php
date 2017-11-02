<?php if ( get_row_layout() == 'blue_block_links' ): ?>
<div class="wb-blue-bg">
	<?php
		$class = acf_column_count_class('links');
	?>
	<?php if ( have_rows('links') ): ?>
		<!-- Links -->
		<div class="container">
			<ul>
				<?php while ( have_rows('links') ): the_row(); ?>
					
					<a href="<?php echo the_sub_field('link'); ?>">
						<li class="">
							
							<?php the_sub_field('content'); ?>

						</li>
					</a>
						
				<?php endwhile; ?>
			</ul>
		</div>

	<?php endif; ?>

</div>
<?php endif; ?>