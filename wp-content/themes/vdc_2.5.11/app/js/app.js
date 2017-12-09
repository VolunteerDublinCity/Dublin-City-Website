'use strict';
// Define App
var wpApp = angular.module( 'vdcApp', ['ui.router', 'ngResource', 'angular-loading-bar', 'angular.filter', '720kb.tooltips', 'angularMoment'] );

wpApp.config( function( $stateProvider, $urlRouterProvider){
	
	$urlRouterProvider.otherwise('/');
	
	$stateProvider
		/**
		* States For Dublin Opportunities
		*/
		.state( 'list', {
			url: '/',
			controller: 'OpsCtrl',
			templateUrl: appInfo.template_directory + 'app/templates/list.html'
		})
		.state('quick-start', {
			url: '/quick-start',
			controller: 'QuickCtrl',
			templateUrl: appInfo.template_directory + 'app/templates/quick-start.html'
		})
		.state('over-50', {
			url: '/over-50',
			controller: 'Over50Ctrl',
			templateUrl: appInfo.template_directory + 'app/templates/over-50.html'
		})
		.state('groups', {
			url: '/group',
			controller: 'GroupCtrl',
			templateUrl: appInfo.template_directory + 'app/templates/groups.html'
		})
		.state('specialist', {
			url: '/specialist',
			controller: 'SpecCtrl',
			templateUrl: appInfo.template_directory + 'app/templates/specialist.html'
		})
		.state('no-garad-vetting', {
			url: '/no-garda',
			controller: 'NoGardaCtrl',
			templateUrl: appInfo.template_directory + 'app/templates/no-garad-vetting.html'
		})
		.state('improving-english', {
			url: '/improving-english',
			controller: 'ImpEngCtrl',
			templateUrl: appInfo.template_directory + 'app/templates/improving-english.html'
		})
		.state('weekend-evening', {
			url: '/weekend',
			controller: 'WeekendCtrl',
			templateUrl: appInfo.template_directory + 'app/templates/weekend-evening.html'
		})
		.state('under-18', {
			url: '/under-18',
			controller: 'Under18Ctrl',
			templateUrl: appInfo.template_directory + 'app/templates/under-18.html'
		})
		.state('admin-office', {
			url: '/administrative-office',
			controller: 'AdminCtrl',
			templateUrl: appInfo.template_directory + 'app/templates/admin-office.html'
		})
		.state('location', {
			url: '/location',
			controller: 'LocationCtrl',
			templateUrl: appInfo.template_directory + 'app/templates/location.html'
		})
		.state('locationDetails', {
			url: '/location/:code',
			controller: 'LocationDetailCtrl',
			templateUrl: appInfo.template_directory + 'app/templates/location-detail.html'
		})
		/**
		* States For Other pages
		*/
		.state('whats-on', {
			url: '/whats-on',
			controller: 'WhatsOnCtrl',
			templateUrl: appInfo.template_directory + 'app/templates/whats-on.php'
		})
		.state('whatsonDetails', {
			url: '/whats-on/:slug',
			controller: 'WhatsOnDetailCtrl',
			templateUrl: appInfo.template_directory + 'app/templates/whats-on-detail.html'
		})

});

wpApp.filter( 'to_trusted', ['$sce', function($sce) {
	return function( text ) {
		return $sce.trustAsHtml( text );
	}
}]);

wpApp.filter('titleCase', function() {
	return function(input) {
		input = input.replace(/-/g, " ");
		return (!!input) ? input.charAt(0).toUpperCase() + input.substr(1).toLowerCase() : '';
	}
});

// wpApp.filter('getDate', [ '$filter', function($filter) {
//         return function(input, format) {
//             return $filter('date')(new Date(input), format);
//         };
//     }
// ]);

wpApp.directive('setHeight', function($timeout){
	// Runs during compile
	return {
		link: function($scope, element, attrs) {
			$timeout(function(){
				// console.log("Set Height Ran");
				var height = element.height();
				// console.log(height);
				var chidHeight = height;
				element.children("div").height(height);
				element.children('div.view').children('a').height(height + 30);
			});
		}
	}
});

// Calender
wpApp.directive("calendar", function() {
    return {
        restrict: "E",
        templateUrl: appInfo.template_directory + 'app/templates/calendar.html',
        scope: {
            selected: "=",
            dates: "="
        },
        link: function(scope) {
   //      	scope.$watch('dates', function(newValue, oldValue) {
			// if (newValue) {
			// 	scope.dateArray = newValue;
			// 	console.log(scope.dates);
			// 	return scope.dateArray;
			// }
   //          }, true);
            scope.selected = _removeTime(scope.selected || moment());
            scope.month = scope.selected.clone();
            
            var start = scope.selected.clone();
            start.date(1);
            _removeTime(start.day(0));

            _buildMonth(scope, start, scope.month);

            scope.select = function(day) {
                scope.selected = day.date;  
                // alert(scope.selected);
            };

            scope.next = function() {
                var next = scope.month.clone();
                _removeTime(next.month(next.month()+1).date(1));
                scope.month.month(scope.month.month()+1);
                _buildMonth(scope, next, scope.month);
            };

            scope.previous = function() {
                var previous = scope.month.clone();
                _removeTime(previous.month(previous.month()-1).date(1));
                scope.month.month(scope.month.month()-1);
                _buildMonth(scope, previous, scope.month);
            };
        }
    };
    
    function _removeTime(date) {
    		// Error in the calendar starting on day one when should be selected date
        // return date.day(0).hour(0).minute(0).second(0).millisecond(0);
        return date.hour(0).minute(0).second(0).millisecond(0);
    }

    function _buildMonth(scope, start, month) {
        scope.weeks = [];
        var done = false, date = start.clone(), monthIndex = date.month(), count = 0;
        while (!done) {
            scope.weeks.push({ days: _buildWeek(date.clone(), month) });
            date.add(1, "w");
            done = count++ > 2 && monthIndex !== date.month();
            monthIndex = date.month();
        }
    }

    function _buildWeek(date, month) {
        var days = [];
        for (var i = 0; i < 7; i++) {
            days.push({
                name: date.format("dd").substring(0, 1),
                number: date.date(),
                isCurrentMonth: date.month() === month.month(),
                isToday: date.isSame(new Date(), "day"),
                date: date
            });
            date = date.clone();
            date.add(1, "d");
        }
        return days;
    }
});

wpApp.factory('whatsOnFactory', ['$http', '$q', function($http, $q){
	var content = {};

	content.GetWhatsOn = function() {
		var oppsCount = appInfo.post_type_count.opportunity.publish;
		return $http.get(appInfo.api_url + 'opps-api?filter[posts_per_page]=' +oppsCount).then(function(data){
			return data;
		});
	}
	content.GetWhatsOnPage = function() {
		var oppsCount = appInfo.post_type_count.opportunity.publish;
		return $http.get(appInfo.api_url + 'pages/74').then(function(data){
			return data;
		});
	}
	return content;
}])



