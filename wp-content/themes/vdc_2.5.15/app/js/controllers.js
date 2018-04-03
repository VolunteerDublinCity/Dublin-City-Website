'use strict';

wpApp.controller('OpsCtrl', ['$scope', '$http', '$stateParams', '$q', '$filter', function($scope, $http, $stateParams, $q, $filter) {
	$scope.page_title = 'Latest'; //
	$scope.oppsTitles = appInfo.opps_titles;
	$scope.vdcCats = appInfo.vdc_categories;
	var oppsCount = appInfo.post_type_count.opportunity.publish;

	// Get the Opportunities
	$http.get(appInfo.api_url + 'opps-api?filter[posts_per_page]=' +oppsCount).then(doneCallbacks, failCallbacks);

	function doneCallbacks(data) {
		$scope.truthyValue = true;
		$scope.opps = data.data;
		console.log($scope.opps);
		$scope.categories = [];
		$scope.tooltips =[];
		for (var i = 0; i <  $scope.opps.length; i++) {
			// Check If key value Object has a key equal to the Name
			//  If yes then get the Value of that key and add it to an array
			if ( $scope.oppsTitles.hasOwnProperty($scope.opps[i].acf.activity) ) {
	
				$scope.categories.push({
					'icon': $scope.opps[i].acf.activity,
					'name' : $scope.oppsTitles[$scope.opps[i].acf.activity]
				});
				// Get the icons and the icon Name for a tooltip
				for(var j = 0; j < $scope.opps[i].acf.vdc_category.length; j++) {
					if ( $scope.vdcCats.hasOwnProperty($scope.opps[i].acf.vdc_category[j]) ) {
						$scope.tooltips.push({
							'icon': $scope.opps[i].acf.vdc_category[j],
							'tooltip': $scope.vdcCats[$scope.opps[i].acf.vdc_category[j]]
						});
					}
				}
			}
		}; 

		// Create function that checks is a value is in the VDC_Categories object
		// If it has that value add it to a new object to be looped in 
		
	}
	function failCallbacks(err) {
		console.log(err.message);
	}


	// setInterval(function(){
	//     console.log($scope.count.post.publish);
	//  }, 1000);
}]);

/** 
* Quick Start Controller
*/
wpApp.controller('QuickCtrl', ['$scope', '$http', '$stateParams', '$q', '$filter', '$timeout', function($scope, $http, $stateParams, $q, $filter, $timeout) {
	$scope.title = 'Quick Start';
	$scope.oppsTitles = appInfo.opps_titles;
	var oppsCount = appInfo.post_type_count.opportunity.publish;

	// Get the Opportunities
	$http.get(appInfo.api_url + 'opps-api?filter[posts_per_page]=' +oppsCount).then(doneCallbacks, failCallbacks);

	function doneCallbacks(data) {
		$scope.opps = data.data;
		// console.log($scope.opps);
		// Create function that checks is a value is in the VDC_Categories object
		// If it has that value add it to a new object to be looped in
		function getOppsByType(type) {
			$scope.oppsByType = [];
			$scope.oppsByTypeCats = [];
			for (var i = 0; i < $scope.opps.length; i++) {

				var array = $scope.opps[i].acf.vdc_category;
				array = array.sort();
				// console.log(array);
				for ( var j = 0; j < array.length; j++) {
					if (array[j] == type) {
						$scope.oppsByType.push($scope.opps[i]);
						// console.log(j);
					}
				}
			
			};
			// For each Object, Create a category title and icon object.
			for ( var i = 0; i < $scope.oppsByType.length; i ++ ){
				
				if ( $scope.oppsTitles.hasOwnProperty($scope.oppsByType[i].acf.activity) ) {
					$scope.oppsByTypeCats.push({
						'icon': $scope.oppsByType[i].acf.activity,
						'name' : $scope.oppsTitles[$scope.oppsByType[i].acf.activity]
					});
				}
				// console.log($scope.oppsByTypeCats);
			}
			// console.log($scope.oppsByType);
		} getOppsByType("quick-start");
	}

	function failCallbacks(err) {
		console.log(err.message);
	}
}]);

/** 
* Over 50's Controller
*/
wpApp.controller('Over50Ctrl', ['$scope', '$http', '$stateParams', '$q', '$filter', '$timeout', function($scope, $http, $stateParams, $q, $filter, $timeout) {
	$scope.title = "Over 50's";
	$scope.oppsTitles = appInfo.opps_titles;
	var oppsCount = appInfo.post_type_count.opportunity.publish;

	// Get the Opportunities
	$http.get(appInfo.api_url + 'opps-api?filter[posts_per_page]=' +oppsCount).then(doneCallbacks, failCallbacks);

	function doneCallbacks(data) {
		$scope.opps = data.data;
		// console.log($scope.opps);
		// Create function that checks is a value is in the VDC_Categories object
		// If it has that value add it to a new object to be looped in
		function getOppsByType(type) {
			$scope.oppsByType = [];
			$scope.oppsByTypeCats = [];
			for (var i = 0; i < $scope.opps.length; i++) {

				var array = $scope.opps[i].acf.vdc_category;
				array = array.sort();
				// console.log(array);
				for ( var j = 0; j < array.length; j++) {
					if (array[j] == type) {
						$scope.oppsByType.push($scope.opps[i]);
						// console.log(j);
					}
				}
			
			};
			// For each Object, Create a category title and icon object.
			for ( var i = 0; i < $scope.oppsByType.length; i ++ ){
				
				if ( $scope.oppsTitles.hasOwnProperty($scope.oppsByType[i].acf.activity) ) {
					$scope.oppsByTypeCats.push({
						'icon': $scope.oppsByType[i].acf.activity,
						'name' : $scope.oppsTitles[$scope.oppsByType[i].acf.activity]
					});
				}
				// console.log($scope.oppsByTypeCats);
			}
			// console.log($scope.oppsByType);
		} getOppsByType("over-50");
	}

	function failCallbacks(err) {
		console.log(err.message);
	}
}]);

/** 
* Group Controller
*/
wpApp.controller('GroupCtrl', ['$scope', '$http', '$stateParams', '$q', '$filter', '$timeout', function($scope, $http, $stateParams, $q, $filter, $timeout) {
	$scope.title = "Group";
	$scope.oppsTitles = appInfo.opps_titles;
	var oppsCount = appInfo.post_type_count.opportunity.publish;

	// Get the Opportunities
	$http.get(appInfo.api_url + 'opps-api?filter[posts_per_page]=' +oppsCount).then(doneCallbacks, failCallbacks);

	function doneCallbacks(data) {
		$scope.opps = data.data;
		// console.log($scope.opps);
		// Create function that checks is a value is in the VDC_Categories object
		// If it has that value add it to a new object to be looped in
		function getOppsByType(type) {
			$scope.oppsByType = [];
			$scope.oppsByTypeCats = [];
			for (var i = 0; i < $scope.opps.length; i++) {

				var array = $scope.opps[i].acf.vdc_category;
				array = array.sort();
				// console.log(array);
				for ( var j = 0; j < array.length; j++) {
					if (array[j] == type) {
						$scope.oppsByType.push($scope.opps[i]);
						// console.log(j);
					}
				}
			
			};
			// For each Object, Create a category title and icon object.
			for ( var i = 0; i < $scope.oppsByType.length; i ++ ){
				
				if ( $scope.oppsTitles.hasOwnProperty($scope.oppsByType[i].acf.activity) ) {
					$scope.oppsByTypeCats.push({
						'icon': $scope.oppsByType[i].acf.activity,
						'name' : $scope.oppsTitles[$scope.oppsByType[i].acf.activity]
					});
				}
				// console.log($scope.oppsByTypeCats);
			}
			// console.log($scope.oppsByType);
		} getOppsByType("group");
	}

	function failCallbacks(err) {
		console.log(err.message);
	}
}]);

/** 
* Specialist Controller
*/
wpApp.controller('SpecCtrl', ['$scope', '$http', '$stateParams', '$q', '$filter', '$timeout', function($scope, $http, $stateParams, $q, $filter, $timeout) {
	$scope.title = "Specialist";
	$scope.oppsTitles = appInfo.opps_titles;
	var oppsCount = appInfo.post_type_count.opportunity.publish;

	// Get the Opportunities
	$http.get(appInfo.api_url + 'opps-api?filter[posts_per_page]=' +oppsCount).then(doneCallbacks, failCallbacks);

	function doneCallbacks(data) {
		$scope.opps = data.data;
		// console.log($scope.opps);
		// Create function that checks is a value is in the VDC_Categories object
		// If it has that value add it to a new object to be looped in
		function getOppsByType(type) {
			$scope.oppsByType = [];
			$scope.oppsByTypeCats = [];
			for (var i = 0; i < $scope.opps.length; i++) {

				var array = $scope.opps[i].acf.vdc_category;
				array = array.sort();
				// console.log(array);
				for ( var j = 0; j < array.length; j++) {
					if (array[j] == type) {
						$scope.oppsByType.push($scope.opps[i]);
						// console.log(j);
					}
				}
			
			};
			// For each Object, Create a category title and icon object.
			for ( var i = 0; i < $scope.oppsByType.length; i ++ ){
				
				if ( $scope.oppsTitles.hasOwnProperty($scope.oppsByType[i].acf.activity) ) {
					$scope.oppsByTypeCats.push({
						'icon': $scope.oppsByType[i].acf.activity,
						'name' : $scope.oppsTitles[$scope.oppsByType[i].acf.activity]
					});
				}
				// console.log($scope.oppsByTypeCats);
			}
			// console.log($scope.oppsByType);
		} getOppsByType("specialist");
	}

	function failCallbacks(err) {
		console.log(err.message);
	}
}]);

/** 
* No Garda Controller
*/
wpApp.controller('NoGardaCtrl', ['$scope', '$http', '$stateParams', '$q', '$filter', '$timeout', function($scope, $http, $stateParams, $q, $filter, $timeout) {
	$scope.title = "No Garda Vetting";
	$scope.oppsTitles = appInfo.opps_titles;
	var oppsCount = appInfo.post_type_count.opportunity.publish;

	// Get the Opportunities
	$http.get(appInfo.api_url + 'opps-api?filter[posts_per_page]=' +oppsCount).then(doneCallbacks, failCallbacks);

	function doneCallbacks(data) {
		$scope.opps = data.data;
		// console.log($scope.opps);
		// Create function that checks is a value is in the VDC_Categories object
		// If it has that value add it to a new object to be looped in
		function getOppsByType(type) {
			$scope.oppsByType = [];
			$scope.oppsByTypeCats = [];
			for (var i = 0; i < $scope.opps.length; i++) {

				var array = $scope.opps[i].acf.vdc_category;
				array = array.sort();
				// console.log(array);
				for ( var j = 0; j < array.length; j++) {
					if (array[j] == type) {
						$scope.oppsByType.push($scope.opps[i]);
						// console.log(j);
					}
				}
			
			};
			// For each Object, Create a category title and icon object.
			for ( var i = 0; i < $scope.oppsByType.length; i ++ ){
				
				if ( $scope.oppsTitles.hasOwnProperty($scope.oppsByType[i].acf.activity) ) {
					$scope.oppsByTypeCats.push({
						'icon': $scope.oppsByType[i].acf.activity,
						'name' : $scope.oppsTitles[$scope.oppsByType[i].acf.activity]
					});
				}
				// console.log($scope.oppsByTypeCats);
			}
			// console.log($scope.oppsByType);
		} getOppsByType("no-garda");
	}

	function failCallbacks(err) {
		console.log(err.message);
	}
}]);

/** 
* Improving English Controller
*/
wpApp.controller('ImpEngCtrl', ['$scope', '$http', '$stateParams', '$q', '$filter', '$timeout', function($scope, $http, $stateParams, $q, $filter, $timeout) {
	$scope.title = "Improving English";
	$scope.oppsTitles = appInfo.opps_titles;
	var oppsCount = appInfo.post_type_count.opportunity.publish;

	// Get the Opportunities
	$http.get(appInfo.api_url + 'opps-api?filter[posts_per_page]=' +oppsCount).then(doneCallbacks, failCallbacks);

	function doneCallbacks(data) {
		$scope.opps = data.data;
		// console.log($scope.opps);
		// Create function that checks is a value is in the VDC_Categories object
		// If it has that value add it to a new object to be looped in
		function getOppsByType(type) {
			$scope.oppsByType = [];
			$scope.oppsByTypeCats = [];
			for (var i = 0; i < $scope.opps.length; i++) {

				var array = $scope.opps[i].acf.vdc_category;
				array = array.sort();
				// console.log(array);
				for ( var j = 0; j < array.length; j++) {
					if (array[j] == type) {
						$scope.oppsByType.push($scope.opps[i]);
						// console.log(j);
					}
				}
			
			};
			// For each Object, Create a category title and icon object.
			for ( var i = 0; i < $scope.oppsByType.length; i ++ ){
				
				if ( $scope.oppsTitles.hasOwnProperty($scope.oppsByType[i].acf.activity) ) {
					$scope.oppsByTypeCats.push({
						'icon': $scope.oppsByType[i].acf.activity,
						'name' : $scope.oppsTitles[$scope.oppsByType[i].acf.activity]
					});
				}
				// console.log($scope.oppsByTypeCats);
			}
			// console.log($scope.oppsByType);
		} getOppsByType("improving-english");
	}

	function failCallbacks(err) {
		console.log(err.message);
	}
}]);

/** 
* Weekend & Evening Controller
*/
wpApp.controller('WeekendCtrl', ['$scope', '$http', '$stateParams', '$q', '$filter', '$timeout', function($scope, $http, $stateParams, $q, $filter, $timeout) {
	$scope.title = "Weekend & Evening";
	$scope.oppsTitles = appInfo.opps_titles;
	var oppsCount = appInfo.post_type_count.opportunity.publish;

	// Get the Opportunities
	$http.get(appInfo.api_url + 'opps-api?filter[posts_per_page]=' +oppsCount).then(doneCallbacks, failCallbacks);

	function doneCallbacks(data) {
		$scope.opps = data.data;
		// console.log($scope.opps);
		// Create function that checks is a value is in the VDC_Categories object
		// If it has that value add it to a new object to be looped in
		function getOppsByType(type) {
			$scope.oppsByType = [];
			$scope.oppsByTypeCats = [];
			for (var i = 0; i < $scope.opps.length; i++) {

				var array = $scope.opps[i].acf.vdc_category;
				array = array.sort();
				// console.log(array);
				for ( var j = 0; j < array.length; j++) {
					if (array[j] == type) {
						$scope.oppsByType.push($scope.opps[i]);
						// console.log(j);
					}
				}
			
			};
			// For each Object, Create a category title and icon object.
			for ( var i = 0; i < $scope.oppsByType.length; i ++ ){
				
				if ( $scope.oppsTitles.hasOwnProperty($scope.oppsByType[i].acf.activity) ) {
					$scope.oppsByTypeCats.push({
						'icon': $scope.oppsByType[i].acf.activity,
						'name' : $scope.oppsTitles[$scope.oppsByType[i].acf.activity]
					});
				}
				// console.log($scope.oppsByTypeCats);
			}
			// console.log($scope.oppsByType);
		} getOppsByType("weekend");
	}

	function failCallbacks(err) {
		console.log(err.message);
	}
}]);

/** 
* Under 18's Controller
*/
wpApp.controller('Under18Ctrl', ['$scope', '$http', '$stateParams', '$q', '$filter', '$timeout', function($scope, $http, $stateParams, $q, $filter, $timeout) {
	$scope.title = "Under 18's";
	$scope.oppsTitles = appInfo.opps_titles;
	var oppsCount = appInfo.post_type_count.opportunity.publish;

	// Get the Opportunities
	$http.get(appInfo.api_url + 'opps-api?filter[posts_per_page]=' +oppsCount).then(doneCallbacks, failCallbacks);

	function doneCallbacks(data) {
		$scope.opps = data.data;
		// console.log($scope.opps);
		// Create function that checks is a value is in the VDC_Categories object
		// If it has that value add it to a new object to be looped in
		function getOppsByType(type) {
			$scope.oppsByType = [];
			$scope.oppsByTypeCats = [];
			for (var i = 0; i < $scope.opps.length; i++) {

				var array = $scope.opps[i].acf.vdc_category;
				array = array.sort();
				// console.log(array);
				for ( var j = 0; j < array.length; j++) {
					if (array[j] == type) {
						$scope.oppsByType.push($scope.opps[i]);
						// console.log(j);
					}
				}
			
			};
			// For each Object, Create a category title and icon object.
			for ( var i = 0; i < $scope.oppsByType.length; i ++ ){
				
				if ( $scope.oppsTitles.hasOwnProperty($scope.oppsByType[i].acf.activity) ) {
					$scope.oppsByTypeCats.push({
						'icon': $scope.oppsByType[i].acf.activity,
						'name' : $scope.oppsTitles[$scope.oppsByType[i].acf.activity]
					});
				}
				// console.log($scope.oppsByTypeCats);
			}
			// console.log($scope.oppsByType);
		} getOppsByType("under-18");
	}

	function failCallbacks(err) {
		console.log(err.message);
	}
}]);

/** 
* Administrative Office Controller
*/
wpApp.controller('AdminCtrl', ['$scope', '$http', '$stateParams', '$q', '$filter', '$timeout', function($scope, $http, $stateParams, $q, $filter, $timeout) {
	$scope.title = "Administrative Office";
	$scope.oppsTitles = appInfo.opps_titles;
	var oppsCount = appInfo.post_type_count.opportunity.publish;

	// Get the Opportunities
	$http.get(appInfo.api_url + 'opps-api?filter[posts_per_page]=' +oppsCount).then(doneCallbacks, failCallbacks);

	function doneCallbacks(data) {
		$scope.opps = data.data;
		// console.log($scope.opps);
		// Create function that checks is a value is in the VDC_Categories object
		// If it has that value add it to a new object to be looped in
		function getOppsByType(type) {
			$scope.oppsByType = [];
			$scope.oppsByTypeCats = [];
			for (var i = 0; i < $scope.opps.length; i++) {

				var array = $scope.opps[i].acf.vdc_category;
				array = array.sort();
				// console.log(array);
				for ( var j = 0; j < array.length; j++) {
					if (array[j] == type) {
						$scope.oppsByType.push($scope.opps[i]);
						// console.log(j);
					}
				}
			
			};
			// For each Object, Create a category title and icon object.
			for ( var i = 0; i < $scope.oppsByType.length; i ++ ){
				
				if ( $scope.oppsTitles.hasOwnProperty($scope.oppsByType[i].acf.activity) ) {
					$scope.oppsByTypeCats.push({
						'icon': $scope.oppsByType[i].acf.activity,
						'name' : $scope.oppsTitles[$scope.oppsByType[i].acf.activity]
					});
				}
				// console.log($scope.oppsByTypeCats);
			}
			// console.log($scope.oppsByType);
		} getOppsByType("administrative-office");
	}

	function failCallbacks(err) {
		console.log(err.message);
	}
}]);

/** 
* By Location Controller
*/
wpApp.controller('LocationCtrl', ['$scope', '$http', '$stateParams', '$q', '$filter', '$timeout', function($scope, $http, $stateParams, $q, $filter, $timeout) {
	$scope.title = "By Location";
	$scope.locations = appInfo.locations;
	$scope.oppsTitles = appInfo.opps_titles;
	var oppsCount = appInfo.post_type_count.opportunity.publish;

	// Get the Opportunities
	$http.get(appInfo.api_url + 'opps-api?filter[posts_per_page]=' +oppsCount).then(doneCallbacks, failCallbacks);

	function doneCallbacks(data) {
		$scope.opps = data.data;
		// console.log($scope.locations);

	}

	function failCallbacks(err) {
		console.log(err.message);
	}
}]);

/** 
* By Location Detail Controller
*/
wpApp.controller('LocationDetailCtrl', ['$scope', '$http', '$stateParams', '$q', '$filter', '$timeout', function($scope, $http, $stateParams, $q, $filter, $timeout) {
	$scope.locations = appInfo.locations;
	var code = $stateParams.code;
	$scope.areaCode = $scope.locations[code]; //Get the value of the key locations code
	$scope.oppsTitles = appInfo.opps_titles;
	var oppsCount = appInfo.post_type_count.opportunity.publish;

	function getOppsByLocation(code) {
		$scope.oppsByAreaCode = [];
		$scope.oppsByAreaCodeCats = [];
		// Get all the Opportunities for this code
		for (var i = 0; i < $scope.opps.length; i++) {
			// Get the locations array
			var currentOpp = $scope.opps[i].acf.location_op
			currentOpp = currentOpp.sort();
			for (var j = 0; j < currentOpp.length; j++) {
				// if object has code for its location_op
				if (currentOpp[j] == code) {
					// add to opps by area code object
					$scope.oppsByAreaCode.push($scope.opps[i]);
				}
			}
		}
		console.log($scope.oppsByAreaCode);

		// Get all the categories for the opps 
		for ( var i = 0; i < $scope.oppsByAreaCode.length; i ++ ){
				
			if ( $scope.oppsTitles.hasOwnProperty($scope.oppsByAreaCode[i].acf.activity) ) {
				$scope.oppsByAreaCodeCats.push({
					'icon': $scope.oppsByAreaCode[i].acf.activity,
					'name' : $scope.oppsTitles[$scope.oppsByAreaCode[i].acf.activity]
				});
			}
			
		}
		console.log($scope.oppsByAreaCodeCats);
		if ($scope.oppsByAreaCode.length > 0) {
			$scope.title = "Opportunities, " + $scope.areaCode;
			$scope.results = true;
		} else {
			$scope.title = "Humm, no opportunities in " + $scope.areaCode;
			$scope.results = false;
		}
		
		
	}
	// Get the Opportunities
	$http.get(appInfo.api_url + 'opps-api?filter[posts_per_page]=' +oppsCount).then(doneCallbacks, failCallbacks);

	function doneCallbacks(data) {
		$scope.opps = data.data;
		getOppsByLocation(code);
	}

	function failCallbacks(err) {
		console.log(err.message);
	}
}]);

/** 
* Whats On Controller
*/
wpApp.controller('WhatsOnCtrl', ['$scope', '$http', '$stateParams', '$q', '$filter', '$timeout', 'whatsOnFactory', function($scope, $http, $stateParams, $q, $filter, $timeout, whatsOnFactory) {
	$scope.title = 'Whats on';
	$scope.day = moment();

	var oppsCount = appInfo.post_type_count.opportunity.publish;

	// Get the Opportunities
	// $http.get(appInfo.api_url + 'opps-api?filter[posts_per_page]=' +oppsCount)
	whatsOnFactory.GetWhatsOn().then(doneCallbacks, failCallbacks);

	function doneCallbacks(data) {
		$scope.name = "Jason";
		$scope.testing = "X";
		$scope.dates = ['Jul 26th 2016', 'Jun 30th 2016'];
		// All Opportunities
		$scope.opps = data.data;
		// Only the opportunities with whats on checked
		$scope.whatsOnOpps = [];
		for (var i = 0; i < $scope.opps.length; i++) {

			if ($scope.opps[i].acf.whats_on === true) {
				$scope.whatsOnOpps.push($scope.opps[i]);
			}

		} 
		// console.log($scope.whatsOnOpps);

		/**
		* Set all the functions to handle the different date ranges
		* 	Define variables
		*	FOR the whatsOnOpps length
		*	IF opp = once - set the opp and the date as key value pair
		*	IF opp = range - set the opp and the date range as key value pair
		*	IF opp = reoccurring dates - set the opp and the dates array as key value pair
		*	IF opp = reoccurring days - set the opp and the days between date range as key value pair
		*/

		// Variables
			 $scope.newWhatsOn = [];
			 $scope.allDates = [];
		
		// Logic
			for ( var i =0; i < $scope.whatsOnOpps.length; i++) {
				var currentOpp = $scope.whatsOnOpps[i].acf.type;
				// Once off
				if ( currentOpp == 'one') {
					// console.log(i + ' Is a once off');
					// Get the date
					var date = $scope.whatsOnOpps[i].acf.date;
					 // Parse date
					date = moment(date, "YYYY,M,DD");
					// Reformat Date
					date = moment(date).format('MMM Do YYYY');
					// Set Date to array
					var dates = [date];
					// Set the new Opp
					$scope.newWhatsOn.push({
						opp: $scope.whatsOnOpps[i],
						date: dates
					});
					
				}

				// Range of dates
				if ( currentOpp == 'range') {
					// console.log(i + ' Is a range of dates');
					// Get Dates
					var startDate = $scope.whatsOnOpps[i].acf.range_start_date;
					var endDate = $scope.whatsOnOpps[i].acf.range_end_date;

					// Parse Dates
					startDate = moment(startDate, "YYYY,M,DD");
					endDate = moment(endDate, "YYYY,M,DD");
				
					// Get Range
					var range = moment().range(startDate, endDate);
					var dateRange = [];
					range.by('days', function(date) {
						var date = moment(date._d).format('MMM Do YYYY');
					 	dateRange.push(date);
					});
	
					// Set the new Opp
					$scope.newWhatsOn.push({
						opp: $scope.whatsOnOpps[i],
						date: dateRange
					});
					
				}

				// Reoccurring Dates
				if ( currentOpp == 'reodate') {
					// console.log(i + ' Is a array of selected dates');
					// get the array of dates
					var dates = $scope.whatsOnOpps[i].acf.reoccurring_dates;
					// push the new formats to a new array
					var newDates = [];
					// Parse and set the dates
					for (var j = 0; j < dates.length; j++) {
						var date = dates[j].date;
						
						date =moment(date, "YYYY,M,DD");
						
						date = new Date(date);
						
						date = moment(date).format('MMM Do YYYY');

						newDates.push(date);
					}
					// Set the new Opp
					$scope.newWhatsOn.push({
						opp: $scope.whatsOnOpps[i],
						date: newDates
					});
					
				}

				// Reoccurring Days
				if ( currentOpp == 'reoday') {
					console.log(i + ' Reoccurring Days between a range of days');
					// get the range of dates and days
					var startDate = $scope.whatsOnOpps[i].acf.range_start_date;
					var endDate = $scope.whatsOnOpps[i].acf.range_end_date;
					var days = $scope.whatsOnOpps[i].acf.reoccurring_days;
					
					// Parse Dates
					startDate = moment(startDate, "YYYY,M,DD");
					endDate = moment(endDate, "YYYY,M,DD");


					var recurrence = moment().recur(startDate, endDate).every(days).daysOfWeek();

					// Outputs: ["01/01/2014", "01/03/2014", "01/05/2014", "01/07/2014"]
					var allDates = recurrence.all('MM/DD/YYYY');
					var newDates = [];
					
					// Set dates to array
					for ( var k = 0; k < allDates.length; k++) {
						
						var date = allDates[k];
						date = moment(date).format('MMM Do YYYY');
						
						newDates.push(date);
					}
					

					$scope.newWhatsOn.push({
						opp: $scope.whatsOnOpps[i],
						date: newDates
					});

				}
			}

		// All Dates
			for ( var i = 0; i < $scope.newWhatsOn.length; i++ ) {

				// console.log($scope.newWhatsOn[i].date);

				for ( var j =0; j < $scope.newWhatsOn[i].date.length; j++) {

					// console.log($scope.newWhatsOn[i].date[j]);
					$scope.allDates.push( $scope.newWhatsOn[i].date[j] );
				}

			}
			// console.log($scope.allDates);

	}
	function failCallbacks(err) {

		console.log("Error getting data from Whats on Opps");

	}

	// get page content
	whatsOnFactory.GetWhatsOnPage().then(function(data){
	    $scope.page = data.data;
	    // console.log($scope.page);
	 });
}]);


wpApp.controller('WhatsOnDetailCtrl', ['$scope', '$http', '$stateParams', function($scope, $http, $stateParams){
	$scope.slug = $stateParams.slug;
	$scope.oppsTitles = appInfo.opps_titles;
	$http.get(appInfo.api_url + 'opps-api?slug=' +$scope.slug).then(doneCallbacks, failCallbacks);

	function doneCallbacks(data) {
		$scope.opp = data.data[0];
		console.log($scope.opp);
		// Set the date
		var acf = $scope.opp.acf;
		$scope.type = acf.type;
		
		if ( $scope.type == 'one' ) {
			date = moment(acf.date, "YYYY,M,DD");
			date = new Date(acf.date);
			$scope.date = moment(date).format('Do MMMM, YYYY');

		} else if ( $scope.type == 'range' ) {

			$scope.dates = [];
			$scope.days = [];

			// Get Dates
			var startDate = acf.range_start_date;
			var endDate = acf.range_end_date;

			// Set the dates
			startDate = moment(startDate, "YYYY,M,DD");
			endDate = moment(endDate, "YYYY,M,DD");

			startDate = new Date(startDate);
			endDate = new Date(endDate);

			$scope.dates.push({
				startDate: moment(startDate).format('Do MMMM, YYYY'),
				endDate: moment(endDate).format('Do MMMM, YYYY')
			});
			console.log($scope.dates);

		} else if ( $scope.type == 'reoday' ) {

			$scope.dates = [];
			$scope.days = [];

			// Get Dates
			var startDate = acf.range_start_date;
			var endDate = acf.range_end_date;

			// Set the dates
			startDate = moment(startDate, "YYYY,M,DD");
			endDate = moment(endDate, "YYYY,M,DD");

			startDate = new Date(startDate);
			endDate = new Date(endDate);

			var days = acf.reoccurring_days;

			// Set the dates
			startDate = moment(startDate).format('Do MMMM, YYYY');
			endDate = moment(endDate).format('Do MMMM, YYYY');
			$scope.dates.push(startDate, endDate);

			// Set the days
			for (var i = 0; i < days.length; i++) {
				var day;
				switch(days[i]) {
					case "mon":
						day = 'Monday';
						$scope.days.push(day);
						break;
					case "tue":
						day = 'Tuesday';
						$scope.days.push(day);
						break;
					case "wed":
						day = 'Wednesday';
						$scope.days.push(day);
						break;
					case "thur":
						day = 'Thursday';
						$scope.days.push(day);
						break;
					case "fri":
						day = 'Friday';
						$scope.days.push(day);
						break;
					case "sat":
						day = 'Saturday';
						$scope.days.push(day);
						break;
					case "sun":
						day = 'Sunday';
						$scope.days.push(day);
						break;
					default:
        					day = "Unknown Day";
				}

			}

		} else if ( $scope.type == 'reodate' ) {

			var dates = acf.reoccurring_dates;
			$scope.reo_dates = [];
			
			for (var i = 0; i < dates.length; i++) {

				var date = moment(dates[i].date, "YYYY,M,DD");
				var date = new Date(date);
				date = moment(date).format('Do MMMM YYYY');
				$scope.reo_dates.push(date);

			}
			console.log($scope.reo_dates);

		} else {
			console.log($scope.type);
		};

		if ( $scope.oppsTitles.hasOwnProperty($scope.opp.acf.activity) ) {
			$scope.cause = $scope.oppsTitles[$scope.opp.acf.activity];
		}

	}

	function failCallbacks(err) {
		console.log("Error");
	}
}]);