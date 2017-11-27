<?php get_template_part( 'template-parts/include', 'header' ); ?>
<?php 
	$location = get_field('location');
	$location_text = get_field('location_text');
	$date_time = get_field('date_time');
	$time_end = get_field('time_end');
	$dt_arr = explode(" ", $date_time);
?>
<div class="container">
	<h1 class="text-center"><?php the_title(); ?></h1>

	<div class="row whats-on-detail">
		<div class="col-md-7">
			<?php the_post_thumbnail('large'); ?>
		</div>
		<div class="col-md-5">
			<h4 class="opp-title">When is it on?</h4>
			<span class="opp-info"><?php echo $dt_arr[0] . ' the ' . $dt_arr[1] . ' of ' . $dt_arr[2] . ', ' . $dt_arr[3];  ?></span>
			<hr>
			<h4 class="opp-title">What time?</h4>
			<span class="opp-info"><?php echo $dt_arr[4] . ' ' . $dt_arr[5]; if($time_end){ ?>&mdash;  <? echo $time_end; } ?> </span>
			<hr>
			<h4 class="opp-title">Where is it on?</h4>
			<span class="opp-info">
				<?php 
					if($location_text) {
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
