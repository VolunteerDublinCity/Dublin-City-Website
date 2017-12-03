<?php if ( get_row_layout() == 'organisation_toolkit' ) : ?>

	<?php 
		$args = array(
			'post_type' => 'toolkit',
			'tax_query' => array(
				array(
					'taxonomy' => 'kind',
					'field' => 'slug',
					'terms'	=> 'organisation',
				)
			)
		);
		$query = new WP_Query($args);
	?>

	<?php if($query->have_posts()) :  ?>
	<div class="wb-white-bg">
		<div class="container">
			
			<ul class="vdc-tabs">
				<?php $i = 0; ?>
				<?php while($query->have_posts()) : $query->the_post(); ?>
					<?php $i++; ?>
					<li class="vdc-tab <?php if($i == 1) : echo "is-active"; endif; ?>" data-panel="<?php echo $i; ?>"><?php the_title(); ?></li>	
				<?php endwhile; ?>
			</ul>

			<div class="vdc-tab-panels">
				<?php $i = 0; ?>
				<?php while($query->have_posts()) : $query->the_post(); ?>
					<?php $i++; ?>
					<div class="vdc-tab-panel <?php if($i == 1) : echo "is-active"; endif; ?>" id="vdc-panel-<?php echo $i; ?>">
						<article class="row">
							<div class="col-md-4">
								<?php the_post_thumbnail('medium'); ?>
							</div>
							<div class="col-md-8">
								<h3><?php the_title(); ?></h3>
								<hr>
								<?php the_content(); ?>
							</div>
						</article>
						
						<?php if(have_rows('attachments')) : ?>
							<div class="vdc-attachments">
								<?php while(have_rows('attachments')) : the_row(); ?>
									<?php $file = get_sub_field('attachment'); ?>
									<a target="_blank" class="vdc-attachment" href="<?php echo $file['url']; ?>">
										<div class="vdc-attachment-icon-container text-center">
					
											<i class="icon icon-pdf-thumb white"></i>
										</div>
									
										<p>
											<?php echo preg_replace("/[^A-Za-z0-9 ]/", ' ', $file['title']); ?>
										</p>
									</a>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>
							
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>
			
		</div>
	</div>
	<?php endif; ?>
	
<?php endif; ?>