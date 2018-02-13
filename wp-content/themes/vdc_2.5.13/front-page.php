<?php 
/*
* Front Page Template
*/
get_header('front');
// Vars
$logo = get_field('lrg_logo', 'options');
?>
			<div class="vdc-logo">
				<img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>">
			</div>

			<div class="vdc-main-links">
				<ul>
					<li>
						<div class="vdc-trans-border">
							<a id="vol" href="<?php echo get_page_link(4); ?>" class="btn-outline-blue">
								Volunteers</a>
						</div>
					</li>
					<li>
						<div class="vdc-trans-border">
							<a id="org" href="<?php echo esc_url( home_url( '/org' ) ); ?>" class="btn-outline-purple">Organisations</a>
						</div>
					</li>
				</ul>
			</div>
			<div class="vdc-opening-statment">
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
			</div>
			<div class="container text-center">
				<ul class="vdc-footer-links">
					<li><a href="<?php echo esc_url( home_url( '/about-us/vision-and-mission/' ) ); ?>" class="vdc-menu-underline">About Us</a></li>
					<li><?php echo vdc_social_link(); ?></li>
					<li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="vdc-menu-underline">Contact Us</a></li>
				</ul>
			</div>

<?php get_footer('front'); ?>