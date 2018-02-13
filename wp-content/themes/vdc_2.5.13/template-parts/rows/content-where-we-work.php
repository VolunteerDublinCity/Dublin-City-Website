<?php if ( get_row_layout() == 'where_we_work' ) : ?>


	<div class="wb-white-bg">
		<div class="container">

			<?php if(have_rows('locations')) :?>	
				<ul class="vdc-locations-list">
					<?php while(have_rows('locations')) : the_row(); ?>
						<li class="vdc-location-list-item"><?php the_sub_field('location_name'); ?></li>
					<?php endwhile; ?>
				</ul>

			<?php endif; ?>

		</div>
	</div>


<?php endif; ?>