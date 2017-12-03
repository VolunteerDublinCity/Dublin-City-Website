<?php if ( get_row_layout() == 'tabs' ): ?>
	<?php if(have_rows('tab')) : ?>
		<div class="container">
			
			<ul class="vdc-tabs">
				<?php $i = 0; ?>
				<?php while( have_rows('tab') ): the_row(); ?>
					<?php $i++; ?>
					<li class="vdc-tab <?php if($i == 1) : echo "is-active"; endif; ?>" data-panel="<?php echo $i; ?>"><?php the_sub_field('title'); ?></li>	
				<?php endwhile; ?>
			</ul>
			
			<div class="vdc-tab-panels">
				<?php $i = 0; ?>
				<?php while( have_rows('tab') ): the_row(); ?>
					<?php $i++; ?>
					<div class="vdc-tab-panel <?php if($i == 1) : echo "is-active"; endif; ?>" id="vdc-panel-<?php echo $i; ?>">
						<?php the_sub_field('content'); ?>
					</div>
				<?php endwhile; ?>
			</div>	

		</div>	
	<?php endif; ?>	
<?php endif; ?>