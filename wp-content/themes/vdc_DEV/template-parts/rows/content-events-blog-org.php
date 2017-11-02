<?php 
//find what the parent is
$parent = end(get_post_ancestors( $post ));

// if there is no parent, the current post is the parent
if(empty($parent)){
	$parent = $post->ID;}

if($parent == 4){
	$parent_page = "vol"; }

elseif($parent == 6){
	$parent_page = "org"; }

$page_id = $post->ID;
$class = ( ( $parent_page == 'vol' ) ? 'vol' : 'org' );
$event = ( ( $parent_page == 'vol' ) ? 'volevent' : 'orgevent' );
if ($parent_page == "org") {
	$event_link = esc_url( home_url('/org/event-calendar/') );
} else {
	$event_link = esc_url( home_url('/vol/events/for-everyone/') );
}
?>
<!-- Desktop -->
<div class="wb-fullwidth events-blog visible-md visible-lg">
	<div class="container vdc-content-spaceing events-blog-block">
		<div class="row">
	
			<div class="col-sm-6 <?php echo ' vdc-' . $class . '-events';?>">
				<div class="<?php echo 'vdc-' . $class;?>">
					<h2 class="icon-event-calendar">Event Calender</h2>
					<a href="<?php echo $event_link ?>" class="link-arrow-pink">See All</a>
				</div>
				<?php 
					$events_args = array(
						'post_type' => $event, 
						'posts_per_page' => 2
						);
					$event_query = new WP_Query($events_args);
				 ?>

				 <?php if ( $event_query->have_posts() ): ?>
				 	<ul class="events-listing">
				 		<?php while ( $event_query->have_posts() ): $event_query->the_post(); ?>
							<?php 
								//Vars
								$title = get_the_title();
								$excerpt = wbstarter_excerpt(14);
								$rawdate = get_field('date_time');
								$datetime = new DateTime($rawdate);
								$date = $datetime->format('M j'); 
								$date = explode(' ', $date);
							?>
							<li class="row">
								<a href="<?php echo the_permalink(); ?>">
									<div class="col-md-9">
										<h5><?php echo $title ?></h5>
										<hr>
										<p><?php echo $excerpt ?></p>
									</div>
									<div class="col-md-3 date <?php echo 'date-' . $class;?>">
										<p>
											<span>
												<strong><?php echo $date[1]; ?></strong>
											</span>
											<span><?php echo $date[0]; ?></span>
										</p>
									</div>
								</a>
							</li>
						<?php endwhile; wp_reset_postdata(); ?>
					<?php else: ?>
					<li>Add events in the Admin panel</li>
					</ul>
				 <?php endif; ?>
				
			</div>

			<div class="col-sm-6 <?php echo ' vdc-' . $class . '-blog'; ?>">
				<div class="<?php echo 'vdc-' . $class;?>">
					<h2 class="icon-blog-feed">Blog Feed <span> - Keep up to date</span></h2>
					<a href="<?php echo esc_url(home_url('/newsblog/news/')); ?>" class="link-arrow-pink">See All</a>
				</div>
				<?php 
					// temp conditional call to load the MAnaging Volunteers section on the front page
					
					if ($parent_page == "org") {
						$post_args = array(
							'post_type' => 'managing-volunteers', 
							'posts_per_page' => 2
						);
					} else {
						$post_args = array(
							'post_type' => 'post', 
							'posts_per_page' => 2
						);
					}
					
					$post_query = new WP_Query($post_args);
				 ?>

				 <?php if ( $post_query->have_posts() ): ?>
				 	<ul class="blog-post row">
				 		<?php while ( $post_query->have_posts() ): $post_query->the_post(); ?>
							<?php 
								//Vars
								$title = wbstarter_short_title(get_the_title(), 60);
								$img_url = get_the_post_thumbnail_url();
							 ?>
							<li class="col-md-6">
								<a href="<?php echo the_permalink(); ?>">
									<figure class="post-img bck_img" style="background-image:url(<?php echo $img_url ?>)"></figure>
								</a>
								<a href="<?php echo the_permalink(); ?>"><h5><?php echo $title ?></h5></a>
							</li>
						<?php endwhile; wp_reset_postdata(); ?>
					<?php else: ?>
					<li>Add events in the Admin panel</li>
					</ul>
				 <?php endif; ?>
			</div>

		</div>
	</div>	
</div>
<!-- End Desktop -->

<!-- Mobile -->
<div class="mob-events-blog visible-xs visible-sm">
	<!-- Events -->
	<div class="container events-mobile <?php echo ' vdc-' . $class . '-events';?>">
		
			<div class="row">
				<div class="col-xs-8">
					<h2 class="icon-event-calendar"> Event Calender</h2>
				</div>
				<div class="col-xs-4">
					<div class="link-wrapper">
						<a href="<?php echo $event_link ?>" class="link-arrow-pink">See All</a>
					</div>
				</div>
			</div>

			<div class="events">
				<?php 
					$events_args = array(
						'post_type' => $event, 
						'posts_per_page' => 2
						);
					$event_query = new WP_Query($events_args);
				 ?>
				<?php if ( $event_query->have_posts() ): ?>
				<ul>
				<?php while ( $event_query->have_posts() ): $event_query->the_post(); ?>
					<?php 
						//Vars
						$title = get_the_title();
						$excerpt = wbstarter_excerpt(10);
						$rawdate = get_field('date_time');
						$datetime = new DateTime($rawdate);
						$date = $datetime->format('M j'); 
						$date = explode(' ', $date);
					?>
					<li class="row">
						<a href="<?php echo the_permalink(); ?>">
							<div class="col-xs-9">
								<div class="content">
									<h5><?php echo $title; ?></h5>
									<hr>
									<p><?php echo $excerpt; ?></p>
								</div>
							</div>
							<div class="col-xs-3 text-center">
								<div class="date">
									<span class="day"><?php echo $date[1]; ?></span>
									<br>
									<span class="month"><?php echo $date[0]; ?></span>
								</div>
							</div>
						</a>
					</li>
					<?php endwhile; wp_reset_postdata(); ?>
					<?php else: ?>
					<li>Add events in the Admin panel</li>
				</ul>
			<?php endif; ?>

			</div>
	</div>

	<!-- Blog -->
	<div class="blog-mobile">
		<div class="container <?php echo ' vdc-' . $class . '-blog'; ?>">
			<div class="row">
				<div class="col-xs-8">
					<h2 class="icon-blog-feed"> Blog Feed</h2>
				</div>
				<div class="col-xs-4">
					<div class="link-wrapper">
						<a href="<?php echo esc_url(home_url('/newsblog/news/')); ?>" class="link-arrow-pink">See All</a>
					</div>
				</div>
			</div>
			<?php 
				$post_args = array(
					'post_type' => 'post', 
					'posts_per_page' => 2
					);
				$post_query = new WP_Query($post_args);
			 ?>

			<?php if ( $post_query->have_posts() ): ?>
			<div class="row blogs">
				<?php while ( $post_query->have_posts() ): $post_query->the_post(); ?>
				<?php 
					//Vars
					$title = wbstarter_short_title(get_the_title(), 45);
					$img_url = get_the_post_thumbnail_url();
				?>
				<div class="col-xs-6">
					<a href="<?php echo the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?>
					<h5><?php echo $title; ?></h5></a>
				</div>
				<?php endwhile; wp_reset_postdata(); ?>
				<?php else: ?>
				<p>Add events in the Admin panel</p>
				</div>
			 <?php endif; ?>
			
		</div>
	</div>
</div>