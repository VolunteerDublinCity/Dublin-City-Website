<?php if (get_row_layout() == 'volunteering_report') : ?>

<div class="wb-white-bg">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<article class="vdc-volunteer-report-text">
					<?php the_sub_field('volunteering_content'); ?>
				</article>
			</div>

			<div class="col-md-6">
				<?php while(have_rows('report')) : the_row(); ?>
					<?php $report = get_sub_field('report'); ?>
					<a target="_blank" href="<?php echo $report['url']; ?>" class="vdc-volunteer-report-container">
						<p class="vdc-volunteer-report-action"><?php the_sub_field('report_action'); ?></p>
						<div class="vdc-volunteer-report">
							<?php $icon = get_sub_field('report_icon'); ?>
							<img src="<?php echo $icon['url'] ?>" alt="<?php echo $icon['alt']; ?>">

							<p class="vdc-volunteer-report-title">
								<?php echo $report['title']; ?>
							</p>
						</div>
					</a>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</div>

<?php endif; ?>