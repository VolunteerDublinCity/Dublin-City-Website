<?php 
/*
* Template Name: Events
*/
get_template_part( 'template-parts/include', 'header' ); ?>


<?php 

	// get events after today 
	$today = date('Ymd');
	$event_args = array(
		'post_type' => 'volunteerevent',
		
		'meta_key'	=> 'date',
		'orderby'	=> 'meta_value_num',
		'order'		=> 'DESC',
	);
	$event_query = new WP_Query( $event_args );
?>


	
	<div class="container events">
		<h1 class="text-center"><span class="icon icon-weekend"></span><?php the_title(); ?></h1>
		<?php the_content(); ?>
	</div>
	<div class="whats-on-listings">

	<div class="container">

	<?php if ( $event_query->have_posts() ): ?>

		<?php while ( $event_query->have_posts() ) : $event_query->the_post(); ?>
			<?php
				$rawDate = get_field('date', false, false);
				$date = new DateTime($rawDate);
				
			?>
			
			<? /* if ($date->format('Ymd') > $today){ ?> is future <? }*/ ?>
			<? /* if ($date->format('Ymd') == $today){ ?> is present <? } */ ?>
			<? /* if ($date->format('Ymd') < $today){ ?> is past <? } */?>
			
			<div class="row item relative <? if ($date->format('Ymd') < $today){ ?> past_event <? } ?>">
				<? if ($date->format('Ymd') < $today){ ?>
					<div class="ribbon"><span>Past Event</span></div>
				<? } ?>
				
				<div class="col-md-4">
					<figure>
						<a href="<?php echo the_permalink(); ?>" class="link-arrow-pink">See more</a>
						<?php the_post_thumbnail('medium'); ?>
					</figure>
				</div>
				<div class="col-md-8 v-align-p">
					<a href="<?php echo the_permalink(); ?>" class="title-link">
						<h2 class="inline-block v-align-child mb0">
							<?php the_title(); ?>
						</h2>
					</a>
					
					<hr>
					<p><strong>
						<?php echo $date->format('l jS F o');?>
					</strong></p>
					
					<div><p><?php echo wbstarter_excerpt(30); ?></p></div>
				</div>
			</div>

		<?php endwhile; wp_reset_query();?>

		<?php else : ?>

			<h2 class="center">Sorry, no events in this category</h2>

		<?php endif; ?>
	
	</div>

</div>

<?php get_footer(); ?>