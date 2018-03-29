angular.module('calendar')
.directive('dayName', function dayNameDirective(
  constants
){
  'use strict';

  return {
    restrict: 'E',
    templateUrl: constants.template_directory + 'app/js/calendar/html/dayName.tmpl.html',
    transclude: false,
    replace: false,
    scope: {
      'name': '='
    }
  };
});