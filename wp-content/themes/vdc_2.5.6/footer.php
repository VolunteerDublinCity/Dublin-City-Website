<?php
	//find what the parent is
	$parent = end(get_post_ancestors( $post ));

	// if there is no parent, the current post is the parent
	if(empty($parent)){
		$parent = $post->ID;}

	if($parent == 4 || is_singular( 'volunteerevent' )){
		$parent_page = "vol"; }

	elseif($parent == 6 || is_singular( 'organisationevent' )){
		$parent_page = "org"; }

	$page_id = $post->ID;
	$bg_img = get_field('background_image', 'options');
	$logo = get_field('logo_footer', 'options');
	$mobile_logo = get_field('mobile_logo', 'options');
?>
			</main>

			<footer>
				<div class="rel bottom-bg bck_img <?php echo $parent_page; ?>" style="background-image:url(<?php echo $bg_img ?>)" data-img="<?php echo $bg_img ?>">

					<!-- Desktop -->
					<div class="visible-lg container footer-content">

							<ul class="top-footer">

								<li class="logo">
									<img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt'];  ?>">
								</li>

								<li class="menu hidden-sm hidden-md visible-lg">
									<div>
									<?php if ( !empty( $parent_page ) ): ?>

										<?php
											wp_nav_menu( array(
												'menu'              	=> $parent_page .'_footer',
												'theme_location'    => $parent_page .'_footer',
												'depth'             		=> 1,
												'container'         	=> 'div',
												'container_class'   	=> '',
												'container_id'     	=> '',
												'menu_class'        	=> 'footer-menu',
												'fallback_cb'       	=> 'wp_bootstrap_navwalker::fallback',
												'walker'           		=> new vdc_navwalker())
											);
										?>

									<?php else: ?>

										<?php
											wp_nav_menu( array(
												'menu'              	=> 'vol_footer',
												'theme_location'    	=> 'vol_footer',
												'depth'             		=> 1,
												'container'         	=> 'div',
												'container_class'   	=> '',
												'container_id'     	=> '',
												'menu_class'        	=> 'footer-menu',
												'fallback_cb'       	=> 'wp_bootstrap_navwalker::fallback',
												'walker'           		=> new vdc_navwalker())
											);
										?>

									<?php endif; ?>
									</div>

									<div class="contact-info">
										<?php
											$address = get_field('office_location', 'option');
											$mail = get_field('email_address', 'option');
											$tel = get_field('phone_number', 'option');
											$tel_link = str_replace(' ', '', $tel);
										?>
										<p><?php echo $address ?></p>
										<p><strong>Tel:</strong> <a href="tel:<?php echo $tel_link ?>"> <?php echo $tel ?></a><span>  |  </span><strong>Email:</strong> <a href="mailto:<?php echo $mail ?>"><?php echo $mail ?></a></p>

									</div>

								</li>

								<li class="footer-cta">
									<?php if ( $parent_page == 'org' ): ?>

										<a href="<?php echo esc_url( home_url('/post-an-opportunity') ); ?>" class="btn-pink">Post an opportunity <i class="fa fa-plus"></i></a>

									<?php elseif ( ($parent_page == 'vol') || ($parent_page == '') ): ?>

										<a href="<?php echo esc_url(home_url('/search-ivol')); ?>" class="btn-pink">Search iVOL</a>

									<?php else: ?>

										<a href="<?php echo esc_url(home_url('/search-ivol')); ?>" class="btn-pink">Search iVOL</a>

									<?php endif; ?>

								</li>

							</ul>


						<div class="copywrite-block">
							<ul>
								<li class="copywrite">
									<p>&copy; <?php the_date("Y");?> &nbsp;<? echo get_bloginfo( 'name' ); ?> <br>All rights reserved</p>
								</li>
								<li class="social-footer">
									<?php vdc_social_link_plain('', true); ?>
								</li>

							</ul>
						</div>

					</div>

					<!-- Mobile -->
					<div class="container mobile-footer hidden-lg">

						<div class="vdc-logo-and-social">
							<img class="logo visible-xs" src="<?php echo $mobile_logo['url']; ?>" alt="<?php echo $mobile_logo['alt'];  ?>">

							<img class="logo hidden-xs" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt'];  ?>">

							<?php vdc_social_link_plain('', true); ?>
						</div>

						<?php
							$location = get_field('hq_office_location', 'option');
						?>
						<a class="vdc-footer-address" href="https://www.google.com/maps?saddr=My+Location&daddr=<?php echo $location['lat'] . ',' . $location['lng']; ?>" target="_blank" class="vdc-footer-address text-center">
								<?php echo $location['address']; ?>
						</a>

						<div class="vdc-footer-email-and-phone">
							<a href="mailto:<?php the_field('email_address', 'option'); ?>"><strong>Email: </strong><?php the_field('email_address', 'option'); ?></a>

							<span class="parting"></span>

							<a href="tel:<?php the_field('phone_number', 'option'); ?>"><strong>Tel: </strong><?php the_field('phone_number', 'option'); ?></a>
						</div>


						<p>&copy; <?php the_date('Y'); ?> Volunteer Centre All rights reserved</p>

					</div>

				</div>
			</footer>
		<?php wp_footer(); ?>
	</body>
</html>
