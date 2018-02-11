<?php 
/*
* Template Name: Events (Org)
*/
get_template_part( 'template-parts/include', 'header' ); ?>

<?php 

	// get events after today 
	$today = date('Ymd');
	$event_args = array(
		'post_type' => 'organisationevent',
		
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
						<h2 class="inline-block v-align-child mb0 pl1-2">
							<?php the_title(); ?>
						</h2>
					</a>
					
					<hr>
					
					<p>
						<i>
							<strong>
								<?php echo $date->format('l');?>
								the 
								<?php echo $date->format('j');?><?php echo $date->format('S');?>
								of 
								<?php echo $date->format('M');?>, 
								<?php echo $date->format('o');?>
							</strong>
						</i>
					</p>
					
					<?php if ( !empty($date_time) ): ?>
						<i><?php echo $dt_arr[0] . ' the ' . $dt_arr[1] . ' of ' . $dt_arr[2] . ', ' . $dt_arr[3];  ?></i>
					<?php endif; ?>
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