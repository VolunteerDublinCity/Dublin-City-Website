<?php
// ACF Field Exerpt
function acf_excerpt_field($limit, $field) {
      $excerpt = explode(' ', get_field(''.$field.''), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
}
/*
* ACF Options
*/
// ACF Custom Options Page
if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page( array(
			'page_title'  => 'Theme General Settings',
			'menu_title' => 'Theme Settings',
			'menu_slug'  => 'theme-general-settings',
			'capability' => 'edit_posts',
			'redirect'  => false
		) );
}

/**
 * Get field key for field name.
 * Will return first matched acf field key for a give field name.
 * 
 * ACF somehow requires a field key, where a sane developer would prefer a human readable field name.
 * http://www.advancedcustomfields.com/resources/update_field/#field_key-vs%20field_name
 * 
 * This function will return the field_key of a certain field.
 * 
 * @param $field_name String ACF Field name
 * @param $post_id int The post id to check.
 * @return 
 */
function acf_get_field_key( $field_name, $post_id ) {
	global $wpdb;
	$acf_fields = $wpdb->get_results( $wpdb->prepare( "SELECT ID,post_parent,post_name FROM $wpdb->posts WHERE post_excerpt=%s AND post_type=%s" , $field_name , 'acf-field' ) );
	// get all fields with that name.
	switch ( count( $acf_fields ) ) {
		case 0: // no such field
			return false;
		case 1: // just one result. 
			return $acf_fields[0]->post_name;
	}
	// result is ambiguous
	// get IDs of all field groups for this post
	$field_groups_ids = array();
	$field_groups = acf_get_field_groups( array(
		'post_id' => $post_id,
	) );
	foreach ( $field_groups as $field_group )
		$field_groups_ids[] = $field_group['ID'];
	
	// Check if field is part of one of the field groups
	// Return the first one.
	foreach ( $acf_fields as $acf_field ) {
		if ( in_array($acf_field->post_parent,$field_groups_ids) )
			return $acf_fields[0]->post_name;
	}
	return false;
}

function acf_column_count_class($field_name) {
	$columns = get_sub_field($field_name);
	$count = count($columns);
	$class = 'col-md-'. 12/$count;
	return $class;
}

add_filter('acf/settings/google_api_key', function () {
    return 'AIzaSyDparAxZ__7dpnl13CiXya5GmGUDefjgO0';
});

function get_acf_key($field_name) {
  global $wpdb;
  $length = strlen($field_name);
  $sql = "
    SELECT `meta_key`
    FROM {$wpdb->postmeta}
    WHERE `meta_key` LIKE 'field_%' AND `meta_value` LIKE '%\"name\";s:$length:\"$field_name\";%';
    ";
  return $wpdb->get_var($sql);
}

function acf_data_access($fieldkey) {
	$object = get_field_object($fieldkey);

	if ( $object ) {
		$titleKeys = [];
		$titleValues = [];
		foreach( $object['choices'] as $k => $v ) {
			array_push($titleKeys, $k);
			array_push($titleValues, $v);
		}
		$oppsTitles = array_combine($titleKeys, $titleValues);
		return $oppsTitles;

	} else {
		return "There is NO values";
	}
}

// Add custom filter to REST with ACF









