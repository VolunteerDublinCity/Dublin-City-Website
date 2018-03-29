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
    link: function(scope, elm){

      function doNotMakeItClickable() {
        elm.removeAttr('href')
          .removeAttr('ng-click')
          .attr('aria-role', 'presentation');

        scope.select = _.noop;
      }

      // If there're no opps in this day, then do not make it clickable
      if (_.isEmpty(scope.day.opps)) {
        doNotMakeItClickable();
      }
    }
  };
});