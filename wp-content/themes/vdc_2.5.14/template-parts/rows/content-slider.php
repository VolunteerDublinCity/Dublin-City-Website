<?php if ( get_row_layout() == 'slider' ): ?>
	
	<?php if ( have_rows('slide') ): ?>
	
	<div class="wb-slider">

		<?php while( have_rows('slide') ): the_row(); $i = 0?>

			<?php
				$img = get_sub_field('image');
				$text = get_sub_field('slide_text');
			?>
			
			<div class="wb-slider-item bck_img" style="background-image:url(<?php echo $img['url']; ?>)">
				<div class="content">
					<?php echo $text ?>
				</div>
			</div>

		<?php endwhile; ?>

	</div>
		
	<?php endif ?>	

<?php endif; ?>