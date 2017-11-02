angular.module('calendar')
.directive('day', function dayDirective(
  $rootScope,
  constants,
  daySrv
){
  'use strict';

  return {
    restrict: 'E',
    templateUrl: constants.template_directory +
      'app/js/calendar/html/day.tmpl.html',
    transclude: false,
    replace: true,
    scope: {
      'day': '=',
      'unselectAllDays': '&'
    },
    controller: function($scope) {
      $scope.select = function select(day) {
        $scope.unselectAllDays();
        daySrv.select(day);
        $rootScope.$emit('oppsLoaded', day.opps);
      };
    },
    link: function(){

    }
  };
});