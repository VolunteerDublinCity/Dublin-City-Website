<?php get_template_part( 'template-parts/include', 'header' ); ?>
<?php 
	$location = get_field('location');
	$location_text = get_field('location_text');
?>
<div class="container">
	<h1 class="text-center"><?php the_title(); ?></h1>

	<div class="row whats-on-detail">
		<div class="col-md-7">
			<?php the_post_thumbnail('large'); ?>
		</div>
		<div class="col-md-5">
			<h4 class="opp-title">When is it on?</h4>
			<span class="opp-info"><?php the_field('date'); ?></span>
			<hr>
			<h4 class="opp-title">What time?</h4>
			<span class="opp-info"><?php if($time_end){?> &mdash; <?php the_field('time_end'); ?>  <? } ?>
				<?php the_field('begin_time'); ?> 
				<?php if(get_field('end_time')){?> &mdash; <?php the_field('end_time'); ?>  <? } ?>
			</span>
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
