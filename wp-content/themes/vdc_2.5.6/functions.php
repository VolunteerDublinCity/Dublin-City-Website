<?php
/**
 * WBStarter functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WBStarter
 */

if ( ! function_exists( 'wbstarter_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wbstarter_setup() {
	// CSS & Scripts
	require get_template_directory() . '/inc/enque.php';
	// Register Custom Navigation Walker
	require_once('wp_bootstrap_navwalker.php');
	require get_template_directory() . '/inc/vdc_navwalker.php';

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on wbstarter, use a find and replace
	 * to change 'wbstarter' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wbstarter', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	// set_post_thumbnail_size( 828, 360, true );
	
	add_theme_support('menus');
	$theme_name = 'wbstarter';
	// Main Menu
	register_nav_menus( array(
	    'general_top' 	=> __( 'General Top', '$theme_name' ),
	    'vol_top'			=> __('Volunteer Top', '$theme_name'),
	    'org_top'			=> __('Organisation Top', '$theme_name'), 
	    'vol_footer'		=> __('Volunteer Footer', '$theme_name'), 
	    'org_footer'		=> __('Organisation Footer', '$theme_name'),
	    'gen_top_mob'	=> __('General Top Mob', '$theme_name'),
	    'vol_mob'		=> __('Mobile Vol', '$theme_name'),
	    'org_mob'		=> __('Mobile Org', '$theme_name')  
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	// add_theme_support( 'post-formats', array(
	// 	'aside',
	// 	'image',
	// 	'video',
	// 	'quote',
	// 	'link',
	// ) );

	// SVG ALLow
	function wbstarter_custom_mtypes( $m ){
	    $m['svg'] = 'image/svg+xml';
	    $m['svgz'] = 'image/svg+xml';
	    return $m;
	}
	add_filter( 'upload_mimes', 'wbstarter_custom_mtypes' );
	
	//Change Read More
	function wbstarter_excerpt_more( $more ) {
		return '...';
	}
	add_filter( 'excerpt_more', 'wbstarter_excerpt_more' );

	// Custom Exerpts
	function wbstarter_excerpt($limit) {
	      $excerpt = explode(' ', get_the_excerpt(), $limit);
	      if (count($excerpt)>=$limit) {
	        array_pop($excerpt);
	        $excerpt = implode(" ",$excerpt).'...';
	      } else {
	        $excerpt = implode(" ",$excerpt);
	      } 
	      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	      return $excerpt;
	}

	// Custom Content
	function wbstarter_content($limit) {
	      $excerpt = explode(' ', get_the_content(), $limit);
	      if (count($excerpt)>=$limit) {
	        array_pop($excerpt);
	        $excerpt = implode(" ",$excerpt).'...';
	      } else {
	        $excerpt = implode(" ",$excerpt);
	      } 
	      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	      return $excerpt;
	}

	show_admin_bar(false);

	function wbstarter_short_title($text, $limit) {
		{

		// Change to the number of characters you want to display

		$chars_limit = $limit;

		$chars_text = strlen($text);

		$text = $text." ";

		$text = substr($text,0,$chars_limit);

		$text = substr($text,0,strrpos($text,' '));

		// If the text has more characters that your limit,
		//add ... so the user knows the text is actually longer

		if ($chars_text > $chars_limit) {

			$text = $text."...";

		}

			return $text;

		}
	}
}
function wb_count_posts_1() {
    $post_types = array();
    $count_posts = array();

    // Get an array of Registered Post Types
    foreach ( get_post_types( '', 'names' ) as $post_type ) {
        // Push PT names to an array
        array_push( $post_types,  $post_type );

    }
    // Get the count of each post type 
    foreach ($post_types as $post_type ) {
        // Push PT names to an array
        array_push( $count_posts,  wp_count_posts($post_type) );

    }

    // Combine the two Arrays KEY(Post Type), VALUE (Post Count)
    $data = array_combine($post_types, $count_posts);
    return $data;
}

// add_action( 'rest_api_init', function () {
//     register_rest_route( 'count-posts/v1', '/count', array(
//         'methods' => 'GET',
//         'callback' => 'wb_count_posts',
//     ) );
// } );
endif; // wbstarter_setup
add_action( 'after_setup_theme', 'wbstarter_setup' );

/**
 * Widgets for this theme.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom Post Types for this theme.
* http://jjgrainger.co.uk/2013/07/15/easy-wordpress-custom-post-types/
*/
include_once('CPT.php');
require get_template_directory() . '/inc/custom-post-types.php';

/**
 * ACF functions for this theme.
 */
require get_template_directory() . '/inc/acf.php';

/**
 * Shortcodes for this theme.
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Functions for this theme.
 */
require get_template_directory() . '/inc/theme-functions.php';
