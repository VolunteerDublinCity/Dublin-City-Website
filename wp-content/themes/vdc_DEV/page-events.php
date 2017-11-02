<?php 
/*
* Template Name: Events
*/
get_template_part( 'template-parts/include', 'header' ); ?>
	
	<div class="container events">
		<h1 class="text-center"><span class="icon icon-weekend"></span><?php the_title(); ?></h1>
		
		<?php if ( have_rows('event_type') ): ?>

			<?php while ( have_rows('event_type') ) : the_row(); ?>
				
				<div class="event-types">
					<h3><?php echo the_sub_field('title'); ?></h3>
					<hr>
					<?php echo the_sub_field('content'); ?>
					<a href="<?php echo the_sub_field('link'); ?>" class="btn-pink">See all Events</a>
				</div>

			<?php endwhile; ?>
			
		<?php endif; ?>
		
	</div>

<?php get_footer(); ?>