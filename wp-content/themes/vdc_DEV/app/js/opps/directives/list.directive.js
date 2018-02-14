angular.module('opps')
.directive('oppsList', function(
  $rootScope,
  constants
){
  'use strict';

  return {
    restrict: 'E',
    templateUrl: constants.template_directory +
      'app/js/opps/html/list.tmpl.html',
    transclude: false,
    replace: false,
    scope: {},
    controller: function($scope) {
      function onOppsLoaded(event, response) {
        $scope.opps = response;
      }

      function populateConstants() {
        $scope.baseUrl = constants.api;
      }

      function init() {
        $scope.opps = [];
      }

      // Initialisation
      populateConstants();
      init();

      $rootScope.$on('oppsLoaded', onOppsLoaded);
    },
    link: function(scope, elm){
      function removeLoader() {
        elm.removeClass('loading');
      }

      $rootScope.$on('oppsLoaded', removeLoader);
    }
  };
});