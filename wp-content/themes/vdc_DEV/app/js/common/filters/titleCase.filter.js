angular.module('common')
.filter( 'titleCase', ['$sce', function toTrustedFilter($sce) {
  'use strict';

  return function(input) {
    input = input.replace(/-/g, " ");
    return (!!input) ? input.charAt(0).toUpperCase() + input.substr(1).toLowerCase() : '';
  }
}]);