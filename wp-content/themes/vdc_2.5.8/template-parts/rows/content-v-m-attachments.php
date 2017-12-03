<?php if ( get_row_layout() == 'vision_and_mission_attachments' ) : ?>

	<?php 
		$args = array(
			'post_type' => 'vmattachments',
		);		
		$query = new WP_Query($args);
	?>

	<div class="wb-white-bg">
		<div class="container vdc-v-m-attachments">
			<?php while($query->have_posts()) : $query->the_post(); ?>
				<?php $file = get_field('file'); ?>

				<a href="<?php echo $file['url']; ?>" class="vdc-v-m-attachment" target="_blank">

					<div class="vdc-v-m-attachment-icon-container">
						<i class="icon icon-pdf-thumb white"></i>
					</div>

					<p>
						<?php echo preg_replace("/[^A-Za-z0-9 ]/", ' ', $file['title']); ?>
					</p>

				</a>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>

<?php endif; ?>