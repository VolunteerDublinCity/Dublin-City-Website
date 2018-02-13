(function($){
	function vdc_page_parent_set() {
	// Variables
	var $vol = $('a#vol');
	var $org = $('a#org');
	// If Menu item clicked, set a variable for the parent page
	$vol.on('click', function(event) {
		// event.preventDefault();
		Cookies.set('page_name', 'vol');
	});
	$org.on('click', function(event) {
		// event.preventDefault();
		Cookies.set('page_name', 'org');
	});

} vdc_page_parent_set();
})(jQuery); 