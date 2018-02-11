<div class="wb-pink-bg event-featured visible-lg">
	<!-- Desktop -->
	<div class="container">
				
		<div class="ballon">
			<span class="<?php echo get_field('icon', 'options'); ?>"></span>

			<h4>
				<?php echo get_field('title', 'options'); ?>
			</h4>
		</div>

		<div class="parting"></div>

		<h4>
			<?php echo get_field('content', 'options'); ?>
		</h4>
		
		<a class="big-btn" href="<?php echo get_field('link', 'options'); ?>">
			<?php echo get_field('link_text', 'options'); ?>
		</a>			

	</div>
</div>
<!-- Mobile -->
<div class="mob-featured-cta hidden-lg">
	<div class="container text-center">
		<div class="row">
			<div class="col-xs-2"><i class="icon icon-volunteer-day"></i></div>
			<div class="col-xs-4">
				<h4><strong>International</strong><br><i>Volunteer Day</i></h4>
			</div>
			<div class="col-xs-6">
				<div class="btn-wrapper">
					<a class="mobile-btn" href="#">8<span>th</span> <strong>December</strong></a>
				</div>
			</div>
		</div>
	</div>
</div>