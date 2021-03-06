<?php if ( get_row_layout() == 'governance' ) : ?>

<div class="container vdc-staff-buttons">
	<button class="is-active" data-filter="143">Our Board</button>
	<button data-filter="144">Funding</button> 
</div>

<?php 
	// need to tell istopope filter if im on 'governance' or 'our people' page so initial filtering is correct;
	wp_localize_script('custom_js', 'whatPage', array('page' => 'governance'));
?>

<?php 
	$args = array(
		'post_type' => 'staff',
		'posts_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'role',
				'field'	=> 'slug',
				'terms'	=> array('board', 'funding'),
			)
		)
	);

	$query = new WP_Query($args);
?>

<div class="container">
	<?php if($query->have_posts()) : ?>
		<div class="vdc-staff-grid" data-start-filter=".143">
			<?php while($query->have_posts()) : $query->the_post(); ?>

				<div class="vdc-staff-member <?php the_field('role'); ?>">
					<div class="vdc-staff-photo">
						<?php the_post_thumbnail(); ?>
					</div>
					
					<div class="vdc-staff-info">
						<p class="vdc-staff-name"><?php the_title(); ?></p>
						<p class="vdc-staff-txt">
							<!-- <?php the_content();?> -->
							<?php echo wbstarter_content(120); ?>
						</p>
					</div>
				</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	<?php endif; ?>
</div>

<?php endif; ?>