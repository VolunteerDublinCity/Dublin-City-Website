<?php if ( get_row_layout() == 'accordions' ): ?>
	
	<?php if ( have_rows('accordion') ): ?>
	
	<div class="container">
		
		<ul id="vdc-accordion-tabs">
		<?php while( have_rows('accordion') ): the_row(); ?>
			<li class='vdc-accordion-tab'>
				<div class="vdc-accordion-title">
					<p><?php the_sub_field('title'); ?></p>
					<div class="vdc-accordion-plus">
						<span></span>
						<span></span>
					</div>
				</div>

				<div class="vdc-accordion-content">
					<?php the_sub_field('content'); ?>	
				</div>
			</li>						
		<?php endwhile; ?>
		</ul>
	</div>
		
	<?php endif ?>	

<?php endif; ?>

