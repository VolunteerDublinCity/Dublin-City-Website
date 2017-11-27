<?php if ( get_row_layout() == 'vision_and_mission_blocks' ) : ?>

	<div class="wb-light-grey-bg vision-mission">
		<div class="container">
			<div class="row">

				<?php $class = acf_column_count_class('blocks'); ?>

				<?php while(have_rows('blocks')) : the_row(); ?> 
					<div class="<?php echo $class; ?> vision-and-mission-block">
						<h2><?php the_sub_field('title'); ?></h2>

						<?php $icon = get_sub_field('icon'); ?>
						<i class="icon icon-<?php echo $icon; ?>"></i>

						<?php the_sub_field('text'); ?>
					</div>
				<?php endwhile; ?>

			</div>
		</div>
	</div>

<?php endif; ?>