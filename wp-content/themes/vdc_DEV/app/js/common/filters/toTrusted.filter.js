angular.module('common')
.filter( 'toTrusted', ['$sce', function toTrustedFilter($sce) {
  'use strict';

  return function( text ) {
    return $sce.trustAsHtml( text );
  }
}]);