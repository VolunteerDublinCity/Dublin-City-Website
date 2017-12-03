<?php
/* 
Organisation events, no categories
*/
$vdc_org_events = new CPT(array(
	'post_type_name' => 'orgevent',
	'singular' => 'Org Event (old)',
	'plural' => 'Org Events (old)',
	'slug' => 'orgevent'
), array(
	'supports'	=> array('title', 'editor', 'thumbnail'),
	'menu_icon' => 'dashicons-calendar-alt'
));



$vdc_org_even = new CPT(array(
	'post_type_name' => 'organisationevent',
	'singular' => 'Organisation Event',
	'plural' => 'Organisation Events',
	'slug' => 'organisationevent'
), array(
	'supports'	=> array('title', 'editor', 'thumbnail'),
	'menu_icon' => 'dashicons-calendar-alt'
));


$vdc_vol_even = new CPT(array(
	'post_type_name' => 'volunteerevent',
	'singular' => 'Volunteer Event',
	'plural' => 'Volunteer Events',
	'slug' => 'volunteerevent'
), array(
	'supports'	=> array('title', 'editor', 'thumbnail'),
	'menu_icon' => 'dashicons-calendar-alt'
));



// Org Categories
// $vdc_org_events->register_taxonomy(array(
//     'taxonomy_name' => 'orgcats',
//     'singular' => 'Category',
//     'plural' => 'Categories',
//     'slug' => 'orgcats'
// ));

/* 
Vol events, no categories
*/
$vdc_vol_events = new CPT(array(
	'post_type_name' => 'volevent',
	'singular' => 'Vol Event (old)',
	'plural' => 'Vol Events (old)',
	'slug' => 'volevent'
), array(
	'supports'	=> array('title', 'editor', 'thumbnail'),
	'menu_icon' => 'dashicons-calendar-alt'
));
// Vol Categories
$vdc_vol_events->register_taxonomy(array(
    'taxonomy_name' => 'volcats',
    'singular' => 'Category',
    'plural' => 'Categories',
    'has_archive' => true,
    // 'hierarchical' => true,
    'slug' => 'volcats'
));



// Opportunities
$vdc_opportunities = new CPT(array(
	'post_type_name' => 'opp',
	'singular' => 'Opportunity',
	'plural' => 'Opportunities',
	'slug' => 'opp'
), array(
	'supports'	=> array('title'),
	// 'show_in_rest'       => true,
	// 'rest_base'          => 'opps-api',
	'rest_controller_class' => 'WP_REST_Posts_Controller',
));

$vdc_opportunities->menu_icon('dashicons-list-view');






// Staff CPT

$labels = array(
	'post_type_name' => 'staff',
    	'singular' => 'Staff',
    	'plural' => 'Staff',
    	'slug' => 'staff'
);

$our_people = new CPT($labels, array(
	'supports'	=> array('title', 'editor', 'thumbnail'),
	'menu_icon' => 'dashicons-admin-users'
));

$args = array(
	'hierarchical' => false
);

$our_people->register_taxonomy('role', $args);

// Managing Volunteers CPT
$labels = array(
	'post_type_name' => 'managing-volunteers',
    	'singular' => 'Manage Volunteer (old)',
    	'plural' => 'Managing Volunteers (old)',
    	'slug' => 'managing-volunteers (old)'
);
$managing_volunteers = new CPT($labels, array(
	'supports'	=> array('title', 'editor', 'thumbnail'),
	'menu_icon' => 'dashicons-universal-access',
	'capability_type'    => 'post',
	'has_archive'        => true
));

// Toolkit CPT
$labels = array(
	'post_type_name' => 'toolkit',
    	'singular' => 'Toolkit',
    	'plural' => 'Toolkits',
    	'slug' => 'toolkit'
);
$toolkit = new CPT($labels, array(
	'supports'	=> array('title', 'editor', 'thumbnail'),
	'menu_icon' => 'dashicons-hammer'
));
$toolkitArgs = array(
	'hierarchical' => false
);
$toolkit->register_taxonomy('kind', $toolkitArgs);

// vision and mission attachments CPT
$labels = array(
	'post_type_name' => 'vmattachments',
    	'singular' => 'V&M Attachment',
    	'plural' => 'V&M Attachments',
    	'slug' => 'vmattachments'
);
$vmattachments = new CPT($labels, array(
	'menu_icon' => 'dashicons-media-document',
));
