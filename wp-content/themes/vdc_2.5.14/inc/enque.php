<?php 
//Add styles to site
function wbstarter_styles() {
	wp_enqueue_style( 'slick_css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css' );
	wp_enqueue_style( 'fontawsome_css', '//maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css' );
	wp_enqueue_style( 'animate.css', '//cdnjs.cloudflare.com/ajax/libs/animate.css/3.4.0/animate.min.css' );
	// wp_enqueue_style( 'bootstrap_css', get_stylesheet_directory_uri().'/css/bootstrap.min.css' );
	wp_enqueue_style( 'bootstrap_css', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' );
	wp_enqueue_style( 'angular_loading_bar_css', get_stylesheet_directory_uri(). '/app/lib/loading-bar.min.css' );
	wp_enqueue_style( 'angular_tooltip_css', get_stylesheet_directory_uri(). '/app/lib/angular-tooltips.min.css' );
	wp_enqueue_style( 'main_css',get_stylesheet_directory_uri(). '/vdc.css' );
}
add_action( 'wp_enqueue_scripts', 'wbstarter_styles' );
//Add scripts to site
function wbstarter_scripts() {
	wp_enqueue_script('jquery');
	// wp_enqueue_script( 'jquery-ui-core');
	wp_enqueue_script( 'cookies_js', get_stylesheet_directory_uri().'/js/js.cookies.js', array(), null, true);
	wp_enqueue_script( 'hoverintent_js', get_stylesheet_directory_uri().'/js/jquery.hoverIntent.minified.js', array(), null, true);
    	wp_enqueue_script( 'slick_js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js', array(), '1.0.0', true );
    	wp_enqueue_script( 'bachstreach_js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-backstretch/2.0.4/jquery.backstretch.min.js', array(), '1.0.0', true );
	// wp_enqueue_script( 'waypoints_js', '//cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.0/jquery.waypoints.min.js', '', '', true );
	// wp_enqueue_script('sticky_js', 'https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.0/shortcuts/sticky.min.js', '', '', true );
	wp_enqueue_script( 'image_loaded_js', get_stylesheet_directory_uri().'/js/imagesloaded.pkgd.min.js', array(), null, true);
    	wp_enqueue_script( 'isotope_js', get_stylesheet_directory_uri().'/js/isotope.pkgd.min.js', array(), null, true);
	wp_enqueue_script( 'bootstrap_js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', '', '', true );
	wp_enqueue_script('g_maps_js', 'https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDparAxZ__7dpnl13CiXya5GmGUDefjgO0', '', '', true );
	wp_enqueue_script( 'maps_js', get_stylesheet_directory_uri(). '/js/custom_maps.js', '', '', true );
	wp_enqueue_script( 'site_cookies_js', get_stylesheet_directory_uri(). '/js/cookies.js', '', '', true );
	// angular
	wp_enqueue_script( 'angular_js', get_stylesheet_directory_uri(). '/app/lib/angular.min.js', array( 'jquery' ), '1.0', false );
	wp_enqueue_script( 'angular-resource', get_stylesheet_directory_uri(). '/app/lib/angular-resource.min.js', array('angular_js'), '1.0', false );
	wp_enqueue_script( 'angular_route_js', get_stylesheet_directory_uri(). '/app/lib/angular-ui-router.js', array( 'angular_js' ), '1.0', false );
	// wp_enqueue_script( 'angular_animate_js', get_stylesheet_directory_uri(). '/app/lib/angular-animate.min.js', array( 'angular_js' ), '1.0', false );
	wp_enqueue_script( 'angular_loading_bar_js', get_template_directory_uri() . '/app/lib/loading-bar.min.js', array( 'angular_js'), '1.0', false );
	wp_enqueue_script( 'angular_tooltip_js', get_template_directory_uri() . '/app/lib/angular-tooltips.min.js', array( 'angular_js'), '1.0', false );
	wp_enqueue_script( 'angular_filter_js', 'https://cdnjs.cloudflare.com/ajax/libs/angular-filter/0.5.8/angular-filter.min.js', array( 'angular_js'), '1.0', false );
	wp_enqueue_script( 'moment_js', get_template_directory_uri() . '/app/lib/moment.min.js', array( 'angular_js'), '1.0', false );
	wp_enqueue_script( 'angular_moment_js', get_template_directory_uri() . '/app/lib/angular-moment.min.js', array( 'moment_js'), '1.0', false );
	wp_enqueue_script( 'range_js', get_template_directory_uri() . '/app/lib/moment-range.min.js', array( 'moment_js'), '1.0', false );
	wp_enqueue_script( 'recur_js', get_template_directory_uri() . '/app/lib/moment-recur.min.js', array( 'moment_js'), '1.0', false );
	wp_enqueue_script( 'ngScripts', get_template_directory_uri() . '/app/js/app.js', array( 'angular_route_js'), '1.0', false );
	wp_enqueue_script( 'ngControllers', get_template_directory_uri() . '/app/js/controllers.js', array('ngScripts'), '1.0', false );
	
	wp_localize_script( 'ngScripts', 'appInfo',
			array(
				
				'api_url'			 	=> home_url() . '/' .rest_get_url_prefix() . '/wp/v2/',
				'custom_api_url'		=> home_url() . '/' .rest_get_url_prefix() . '/count-posts/v1/count',
				'template_directory' 	=> get_template_directory_uri() . '/',
				'nonce'				 	=> wp_create_nonce( 'wp_rest' ),
				'is_admin'			 	=> current_user_can('administrator'),
				'opps_titles'			=> acf_data_access('field_577cb498beb71'), 
				'post_type_count'		=> wb_count_posts_1(),
				'vdc_categories'		=> acf_data_access('field_577cc6251f784'),
				'locations'				=> acf_data_access('field_577cf7b21b4ef')
				
			)
		);
	wp_enqueue_script( 'site_cookies_js', get_stylesheet_directory_uri(). '/js/cookies.js', '', '', true );
	wp_enqueue_script( 'custom_js', get_stylesheet_directory_uri(). '/js/custom.js', '', '', true );
}
add_action( 'wp_enqueue_scripts', 'wbstarter_scripts' );
function wbstarter_custom_css(){
	$source = get_stylesheet_directory_uri().'/css/custom.css';
	wp_enqueue_style('wbstarter_custom_css', $source, false,'1','all');
}
add_action('wp_head','wbstarter_custom_css',1);