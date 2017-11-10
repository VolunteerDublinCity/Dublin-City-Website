jQuery(document).ready(function( jQuery ) {

	// Add underline class to top level menu items
	jQuery('ul.top-menu li a').addClass('vdc-menu-underline');
	jQuery('ul.sub-menu li a').removeClass('vdc-menu-underline');

	jQuery('.wb-l-blue-bg a').addClass('vdc-menu-underline');
	jQuery('.wb-l-purple-bg a').addClass('vdc-menu-underline');

	// Mobile Menu Icon Trigger
	function mobile_menu_trigger() {
		var $hamburger = jQuery(".hamburger");
		$hamburger.on("click", function(e) {
		$hamburger.toggleClass("is-active");
		// Do something else, like open/close menu

			jQuery('.mobile-menu').slideToggle(300);
			//jQuery('.header-content-wrapper').fadeToggle('300');
			// Sub menu Item
		});
		if ( jQuery(window).width() < 1200 ) {
			if ( jQuery('li.menu-item-has-children ul').hasClass('sub-menu') ) {
				jQuery('li.menu-item-has-children ul').removeClass('sub-menu')
				.addClass('mobile-sub-menu');
			}

		}
		jQuery('li.menu-item-has-children').on('click', function(event) {
			// event.preventDefault();
			jQuery(this).children('.mobile-sub-menu').slideToggle(300);
			// jQuery('.mobile-sub-menu').slideToggle(300);
		});
	}

	// Full Back Ground Images
	function wb_full_bg_img(selector) {
		var $selector = jQuery(''+selector+'');
		var $img = $selector.attr('data-img');
		if ($selector[0]) {
			$selector.backstretch($img);
		}
	}

	function wb_slick_fullbg(parent, child) {
		var $parent = jQuery(''+parent+'');
		var $child = jQuery(''+child+'');
		// Init Slider
		$parent.slick({
			dots: false,
			arrows: false,
			// autoplay: true,
			fade: true
		});

		// Add Background Images
		$child.each(function(index, el) {
			var $this = jQuery(this);
			// console.log($this);
			wb_full_bg_img($this);
		});
	}

	if ( jQuery(window).width() > 1200) {
		// Sub Menus
		function vdc_sub_menu() {
			var $parent = jQuery('ul.top-menu li.menu-item-has-children');
			var $child = jQuery("ul.sub-menu");
			var $this = jQuery(this);

			/*==============
			Click to Open .stop
			==============*/
			$parent.click(function(e) {
				// Prevent defaults and Bubbling
				// e.preventDefault();
	    			e.stopPropagation();
	    			var w = jQuery(window).width(); // Window Width
	    			var c = 1170; // Container Width
	    			var $mW = jQuery('.vdc-specific-menu').width(); // Main Menu Width
	    			var $mDL = jQuery('.vdc-specific-menu').offset(); // Main Menu Distance Left/Top
	    			var sMW = ( jQuery(this).children('ul').width() + ( parseInt(  jQuery(this).children('ul').css('padding-left')   ) * 2 ) ); // Sub Menu Width
	    			var $mME = ($mDL.left + $mW); // Main menu End
	    			var sMDL = jQuery(this).offset(); // Sub Menu Distance Left/Top
	    			var sME = (sMDL.left + sMW); //Sub Menu End
	                  var $uO = (-1 * ($mME - sME) ); //Unknown Overlap OLD ( sMW - ( $mW - ( sMDL.left - $clikedDL.left ) ) )
	    			// console.log('---------------------------------- \n'+
	    			// 				'Window: ' + w + '\n'+
	    			// 				'Container: ' + c + '\n'+
	    			// 				'Main Menu Width: ' + $mW + '\n' +
	    			// 				'Main Menu Left: ' + $clikedDL.left + '\n'+
	    			// 				'Sub Menu Width: ' + sMW + '\n' +
	    			// 				'Sub Menu Left: ' + sMDL.left + '\n'+
	    			// 				'-------------------- \n'+
	    			// 				'Main Menu end: ' + $mME + '\n'+
	    			// 				'Sub Menu end: ' + sME + '\n'+
	    			// 				'-------------------- \n'+
	    			// 				'Unknown Overlap: ' + ( $uO ) );
	    			if ( $uO > 0 ) {
	    				jQuery(this).children('ul').css('left', + -$uO+'px');
	    			} else {
	    				// console.log("No Overlap");
	    			}

	    			// Current Sub Menu Arrow under link Positioning
	    			var $parentMW = jQuery(this).parent('ul').width();
	    			var $parentDL = jQuery(this).parent('ul').offset();
	    			var $menuItemWidth = jQuery(this).width();
	    			var $menuText = jQuery(this).children('a').text();
	    			var $arrowPosition = ($menuItemWidth/2) + $parentDL.left;
	    			var $uOArrow;
	    			// Log the position of the arrow
	    			// console.log($menuText + ' menu item width is: ' +$menuItemWidth+ '\n' +
	    			// 				'Sub Menu Distance Left: ' + sMDL.left + '\n'+
	    			// 				'The Arrow should be at: ' + $arrowPosition + '\n');

	    			// Set the arrow position
	    			if ( $uO > 0 ) {
	    				jQuery('<style>.sub-menu::before{left:'+( ( ($menuItemWidth/2 ) - 10 ) + $uO )+'px}</style>').appendTo('head');
	    			} else {
	    				jQuery('<style>.sub-menu::before{left:'+( ($menuItemWidth/2 ) - 10 )+'px}</style>').appendTo('head');
	    			}

	    			// Close Currently Open Menu
				$child.not( jQuery(this).children('ul') ).fadeOut(100, function(){
					jQuery(this).removeClass('active arrow');
				});

				// Fade open the menu
				jQuery(this).children('ul').stop(true, false, true).fadeToggle(400, function() {
					jQuery(this).addClass('active arrow')
				});

				// Close on click to document
				jQuery(document).one('click', function() {

					if ( jQuery('ul').hasClass('active') ) {
						jQuery('ul.sub-menu.active').fadeOut('300', function() {
					  		jQuery(this).removeClass('active');
					  	});
					}

				});

			});
		}vdc_sub_menu();
	}


	// Add Background Images
	jQuery('figure').each(function(index, el) {
		var $this = jQuery(this);
		var img = jQuery(this).attr('data-img');
		// $this.backstretch(img);
	});

	// Add class on scrolling mobile menu
	if ( jQuery(window).width() < 1200 )  {
		if ( jQuery(".mobile-nav").hasClass('transparent') ) {
			jQuery(window).scroll(function(event) {
				var scroll = jQuery(window).scrollTop();
				var nav = jQuery(".mobile-nav");
				var cookie = getCook('page_name');

				if ( scroll > 50 ) {
					nav.addClass(cookie);
				} else{
					nav.removeClass(cookie);
				};
				console.log(cookie);
			});
		}


	}

	function getCook(cookiename) {
		// Get name followed by anything except a semicolon
		var cookiestring=RegExp(""+cookiename+"[^;]+").exec(document.cookie);
		// Return everything after the equal sign
		return unescape(!!cookiestring ? cookiestring.toString().replace(/^[^=]+./,"") : "");
	}



	// accordion
	function accordion_slides() {
		var $tab = jQuery('.vdc-accordion-tab');

		$tab.click(function(){

			// plus icon animation
			jQuery('.vdc-accordion-plus span:last-child').fadeIn('100');

			// sliding animation
			if(jQuery(this).hasClass('is-active')) {

				$tab.children('.vdc-accordion-content').slideUp('300');
				$tab.removeClass('is-active');
			}

			else {

				$tab.children('.vdc-accordion-content').slideUp('300');
				$tab.removeClass('is-active');

				jQuery(this).children('.vdc-accordion-content').slideDown('300');
				jQuery(this).closest('.vdc-accordion-tab').addClass('is-active');

				// plus icon animation
				jQuery(this).find('.vdc-accordion-plus span:last-child').fadeOut('100');
			}
		});
	};

	// tabs
	function tabs() {
		// $trigger = jQuery('.vdc-tab');
		$panel = jQuery('.vdc-tab-panel');

		// $trigger.click(function() {

		// 	// hide all panels
		// 	$panel.fadeOut("200");
		// });

		jQuery('.vdc-tab').click(function(){
			// panel to show
			var $panelToShow = jQuery(this).attr('data-panel');

			// decide what button gets active styles
			jQuery('.vdc-tab.is-active').removeClass('is-active');
			jQuery(this).addClass('is-active');

			// decide which tabs to show and hide
			var $activePanel = jQuery('.vdc-tab-panel.is-active');

			if($activePanel.attr("data-panel") != jQuery(this).attr('data-panel')) {

				$activePanel.fadeOut(300, function(){
					jQuery(this).removeClass('is-active');

					jQuery("#vdc-panel-"+$panelToShow).fadeIn(300, function(){
						jQuery(this).addClass('is-active');
					});
				});
			}

		});
	}

	// staff section
	function staff_section() {
		jQuery('.vdc-staff-member').hover(function(){
			jQuery(this).toggleClass('is-active');
			jQuery(this).find('.vdc-staff-txt').stop().slideToggle('500');
		});
	}

	function staff_isotope_grid() {
		var $grid = jQuery('.vdc-staff-grid');
		var $sortBtn = jQuery('.vdc-staff-buttons button');
		var $startFilter = $grid.attr('data-start-filter');
		$grid.isotope({
			itemSelector: '.vdc-staff-member',
			layoutMode: 'fitRows',
			filter: $startFilter
		});

		// var whatPage;
		// if(whatPage) {
		// 	if(whatPage.page == 'governance') {
		// 		$grid.isotope({ filter: ".143" });
		// 	} else if((whatPage.page == 'people')) {
		// 		$grid.isotope({ filter: ".141" });
		// 	}
		// }

		$sortBtn.click(function(){
			// what are we filtering?
			var filterTerm = jQuery(this).attr('data-filter');
			// now we filter
			$grid.isotope({ filter: "."+filterTerm });

			$sortBtn.removeClass('is-active');
			jQuery(this).addClass('is-active');
		});

	}




	// CALL ALL FUNCTIONS HERE
	mobile_menu_trigger();
	accordion_slides();
	tabs();
	if(jQuery(window).width() >= 992) {
		staff_section();
	}
	staff_isotope_grid();

	// Full BG Slider
	wb_slick_fullbg('.wb-slider', '.wb-slider-item');

	// Full Backgrounds
	wb_full_bg_img('.home');
	wb_full_bg_img('#vol-home');
	wb_full_bg_img('#org-home');
	wb_full_bg_img('.bottom-bg');

});

