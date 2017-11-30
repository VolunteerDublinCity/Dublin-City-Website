<?php get_template_part( 'template-parts/include', 'header'); ?>
<?php 
	$location = get_field('location');
	$location_text = get_field('location_text');
	$begin_time = get_field('begin_time');
	$end_time = get_field('end_time');

	$rawDate = get_field('date', false, false);
	$date = new DateTime($rawDate);
?>
<div class="container">
	<h1 class="text-center"><?php the_title(); ?></h1>

	<div class="row whats-on-detail">
		<div class="col-md-7">
			<?php the_post_thumbnail('large'); ?>
		</div>
		<div class="col-md-5">
			<h4 class="opp-title">When is it on?</h4>
			<span class="opp-info"><? echo  $date->format('l F jS, Y'); ?></span>
			<hr>
			<h4 class="opp-title">What time?</h4>
			<span class="opp-info"><?php echo $begin_time; if($end_time){ ?> &mdash;  <? echo $end_time; } ?> </span>
			<hr>
			<h4 class="opp-title">Where is it on?</h4>
			<span class="opp-info">
				<?php 
					if($location_text && $location) {
						?>
						<a href="http://maps.google.com/maps?z=12&t=m&q=loc:<? echo get_field("location")['lat']; ?>+<? echo get_field("location")['lng']; ?>" 
							target="_blank">
							<?php echo $location_text; ?></a>
						<?
					}
					else if($location_text) {
						echo $location_text;
					} else { 
						echo $location['address'];
					}
				?>
			</span>
		</div>
 	</div>
 	<div class="whats-on-content">
 		<?php the_content(); ?>
	</div>

</div>

<?php get_footer(); ?>
