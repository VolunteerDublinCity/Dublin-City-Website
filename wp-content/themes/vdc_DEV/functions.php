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
endif; // wbstarter_setup
add_action( 'after_setup_theme', 'wbstarter_setup' );

/*
http://localhost/vdc/wp-json/wp/v2/opps-api?meta_query[relation]=OR&meta_query[0][key]=from_date&meta_query[0][value]=2017-10-10&meta_query[0][compare]==&meta_query[0][type]=DATE&meta_query[1][key]=to_date&meta_query[1][value]=2017-10-12&meta_query[1][compare]==&meta_query[1][type]=DATE

/wp-json/wp/v2/opps-api?
meta_query[relation]=OR&
meta_query[0][key]=from_date&
meta_query[0][value]=2017-10-10&
meta_query[0][compare]==&
meta_query[0][type]=DATE&
meta_query[1][key]=to_date&
meta_query[1][value]=2017-10-12&
meta_query[1][compare]==&
meta_query[1][type]=DATE

http://localhost/vdc/wp-json/wp/v2/opps-api?&meta_query[0][key]=from_date&meta_query[0][value][0]=2017-10-01&meta_query[0][value][1]=2017-11-31&meta_query[0][compare]=BETWEEN&meta_query[0][type]=DATE

/wp-json/wp/v2/opps-api?
meta_query[0][key]=from_date&
meta_query[0][value][0]=2017-10-01&
meta_query[0][value][1]=2017-11-31&
meta_query[0][compare]=BETWEEN&
meta_query[0][type]=DATE
*/
class Opps_Posts_Controller extends WP_REST_Controller {

  // Here initialize our namespace and resource name.
  public function __construct() {
    $this->debug         = false;
  	$this->version       = '2';
    $this->namespace     = '/wp/v' . $this->version;
    $this->resource_name = 'opps-api';
  }

  public function validate_meta_query_param($param, $request, $key) {
		return is_array( $param );
	}

  public function validate_id_param($param, $request, $key) {
		return is_numeric( $param );
	}

  // Register our routes.
  public function register_routes() {
    register_rest_route( $this->namespace, '/' . $this->resource_name, array(
      array(
        'methods'   => WP_REST_Server::READABLE,
        'callback'  => array( $this, 'get_posts' ),
        'permission_callback' => array( $this, 'get_posts_permissions_check' ),
				'args'     => array(
				  'meta_query' => array(
		    		// 'required' => true,
				    'validate_callback' => array( $this, 'validate_meta_query_param' )
				  )
				)
      ),
      'schema' => array( $this, 'get_post_schema' ),
    ) );
    register_rest_route( $this->namespace, '/' . $this->resource_name . '/(?P<id>[\d]+)', array(
      array(
        'methods'   => WP_REST_Server::READABLE,
        'callback'  => array( $this, 'get_post' ),
        'permission_callback' => array( $this, 'get_post_permissions_check' ),
				'args'     => array(
				  'id' => array(
		    		// 'required' => true,
				    'validate_callback' => array( $this, 'validate_id_param' )
				  )
				)
      ),
      // Register our schema callback.
      'schema' => array( $this, 'get_post_schema' ),
    ) );
  }

  /**
   * Check permissions for the posts.
   *
   * @param WP_REST_Request $request Current request.
   */
  public function get_posts_permissions_check( WP_REST_Request $request ) {
    // @TODO
    // if ( ! current_user_can( 'read' ) ) {
    //   return new WP_Error( 'rest_forbidden', esc_html__( 'You cannot view the post resource.' ), array( 'status' => $this->authorization_status_code() ) );
    // }
    return true;
  }

  /**
   * Sanitize an array of arguments to be sent within the request
   *
   * @param $array Array of arguments to sanitize
   */
	public function recursive_sanitize_text_field($array) {
	  foreach ( $array as $key => &$value ) {
	    if ( is_array( $value ) ) {
      	$value = $this->recursive_sanitize_text_field($value);
	    }
	    else {
	    	if ($value === '<=' || $value === '>=') {
	    		continue;
	    	}
      	$value = sanitize_text_field( $value );
	    }
	  }

	  return $array;
	}

  /**
   * Returns the arguments to be used in get_posts() method
   *
   * @param WP_REST_Request $request Current request.
   */
  public function prepare_args ( WP_REST_Request $request ) {
 		$meta_query_param = $request['meta_query'];

	  $args = array (
	  	'numberposts' => -1, // All opps
	    'post_type'   => 'opp',
	    'post_status' => 'publish'
	  );

	  $args['meta_query'] = $this->recursive_sanitize_text_field($meta_query_param);
	  // $args['meta_query'] = $meta_query_param;

		return $args;
  }

  /**
   * Returns opportunities as a rest response.
   *
   * @param WP_REST_Request $request Current request.
   */
  public function get_posts( WP_REST_Request $request ) {
  	$args = $this->prepare_args ( $request );

		// Debug
    if ($this->debug === true) {
  		$the_query = new WP_Query( $args );
  		print_r($args);
  		print_r($the_query->request);
    }

    $posts = get_posts( $args );

    $data = array();

    if ( empty( $posts ) ) {
      return rest_ensure_response( $data );
      // return new WP_REST_Response( [], 200 );
    }

    foreach ( $posts as $post ) {
    	// Debug
      if ($this->debug === true) {
      	print_r($post);
        print_r(get_post_custom($post->ID));
        print_r(get_post_custom($post->ID)['location'][3]);
        print_r(get_post_custom($post->ID)['organisation']);
      	print_r(get_post_custom($post->ID)['from_date']);
      	print_r(get_post_custom($post->ID)['to_date']);
      }

      $response = $this->prepare_item_for_response( $post, $request );
      $data[] = $this->prepare_response_for_collection( $response );
    }

    // Return all of our comment response data.
    return rest_ensure_response( $data );
    // return new WP_REST_Response( $data, 200 );
  }

  /**
   * Check permissions for the posts.
   *
   * @param WP_REST_Request $request Current request.
   */
  public function get_post_permissions_check( WP_REST_Request $request ) {
    // @TODO
    // if ( ! current_user_can( 'read' ) ) {
    //   return new WP_Error( 'rest_forbidden', esc_html__( 'You cannot view the post resource.' ), array( 'status' => $this->authorization_status_code() ) );
    // }
    return true;
  }

  /**
   * Grabs the five most recent posts and outputs them as a rest response.
   *
   * @param WP_REST_Request $request Current request.
   */
  public function get_post( WP_REST_Request $request ) {
    $id = (int) $request['id'];
    $post = get_post( $id );

    if ( empty( $post ) ) {
      return rest_ensure_response( array() );
      // return new WP_REST_Response( [], 200 );
    }

    return prepare_item_for_response( $post, $request);
  }

  /**
   * Matches the post data to the schema we want.
   *
   * @param WP_Post $post The comment object whose response is being prepared.
   * @param WP_REST_Request $request Current request.
   */
  public function prepare_item_for_response( $post, $request ) {
    $post_data = array();

    $schema = $this->get_post_schema( $request );
    $custom_fields = get_post_custom($post->ID);

    // Checks if field is set in schema.
    if ( isset( $schema['properties']['id'] ) ) {
      $post_data['id'] = (int) $post->ID;
    }

    // Checks if field is set in schema.
    if ( isset( $schema['properties']['title'] ) ) {
      $post_data['title'] = apply_filters( 'the_title', $post->post_title, $post );
    }

    // Checks if field is set in schema.
    if ( isset( $schema['properties']['custom_fields']['from_date'] ) ) {
      $post_data['from_date'] = $custom_fields['from_date'][0];
    }

    // Checks if field is set in schema.
    if ( isset( $schema['properties']['custom_fields']['to_date'] ) ) {
      $post_data['to_date'] = $custom_fields['to_date'][0];
    }

    // Checks if field is set in schema.
    if ( isset( $schema['properties']['custom_fields']['opp_categories'] ) ) {
      $post_data['opp_categories'] = get_post_meta($post->ID,'opp_category')[0];
    }

    // Checks if field is set in schema.
    if ( isset( $schema['properties']['custom_fields']['organisation'] ) ) {
      $post_data['organisation'] = get_post_meta($post->ID,'organisation')[0];
    }

    // Checks if field is set in schema.
    if ( isset( $schema['properties']['custom_fields']['location'] ) ) {
      $post_data['location'] = get_post_meta($post->ID,'location')[0];
    }

    // Checks if field is set in schema.
    if ( isset( $schema['properties']['custom_fields']['ivol_link'] ) ) {
      $post_data['ivol_link'] = get_post_meta($post->ID,'ivol_link')[0];
    }

    return rest_ensure_response( $post_data );
    // return new WP_REST_Response( $post_data, 200 );
  }

  /**
   * Prepare a response for inserting into a collection of responses.
   *
   * This is copied from WP_REST_Controller class in the WP REST API v2 plugin.
   *
   * @param WP_REST_Response $response Response object.
   * @return array Response data, ready for insertion into collection data.
   */
  public function prepare_response_for_collection( $response ) {
    if ( ! ( $response instanceof WP_REST_Response ) ) {
      return $response;
    }

    $data = (array) $response->get_data();
    $server = rest_get_server();

    if ( method_exists( $server, 'get_compact_response_links' ) ) {
      $links = call_user_func( array( $server, 'get_compact_response_links' ), $response );
    } else {
      $links = call_user_func( array( $server, 'get_response_links' ), $response );
    }

    if ( ! empty( $links ) ) {
      $data['_links'] = $links;
    }

    return $data;
  }

  /**
   * Get our sample schema for a post.
   *
   * @param WP_REST_Request $request Current request.
   */
  public function get_post_schema( WP_REST_Request $request ) {
    $schema = array(
      // This tells the spec of JSON Schema we are using.
      '$schema'              => 'http://json-schema.org/schema#',
      'title'                => 'opps',
      'type'                 => 'object',
      // In JSON Schema you can specify object properties in the properties attribute.
      'properties'           => array(
        'id' => array(
          'description'  => esc_html__( 'Unique identifier for the object.' ),
          'type'         => 'integer',
          'context'      => array( 'view' ),
          'readonly'     => true,
        ),
        'title' => array(
          'description'  => esc_html__( 'The title for the object.' ),
          'type'         => 'string',
          'context'      => array( 'view' ),
          'readonly'     => true,
        ),
        'custom_fields' => array(
          'from_date' => array(
            'description'  => esc_html__( 'Whenever the opportunity starts.' ),
            'type'         => 'string',
            'context'      => array( 'view' ),
            'readonly'     => true,
          ),
          'to_date' => array(
            'description'  => esc_html__( 'Whenever the opportunity ends.' ),
            'type'         => 'string',
            'context'      => array( 'view' ),
            'readonly'     => true,
          ),
          'opp_categories' => array(
            'description'  => esc_html__( 'The categories of that opportunity. Only 4 will be shown.' ),
            'type'         => 'array',
            'context'      => array( 'view' ),
            'readonly'     => true,
          ),
          'organisation' => array(
            'description'  => esc_html__( 'The organisation of that opportunity.' ),
            'type'         => 'string',
            'context'      => array( 'view' ),
            'readonly'     => true,
          ),
          'location' => array(
            'description'  => esc_html__( 'The location of that opportunity.' ),
            'type'         => 'object',
            'context'      => array( 'view' ),
            'readonly'     => true,
          ),
          'ivol_link' => array(
            'description'  => esc_html__( 'The iVol link of that opportunity.' ),
            'type'         => 'string',
            'context'      => array( 'view' ),
            'readonly'     => true,
          ),
        ),
      ),
    );

    return $schema;
  }

  // Sets up the proper HTTP status code for authorization.
  public function authorization_status_code() {

    $status = 401;

    if ( is_user_logged_in() ) {
      $status = 403;
    }

    return $status;
  }
}

add_action( 'rest_api_init', function() {
  $controller = new Opps_Posts_Controller();
  $controller->register_routes();
});


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
