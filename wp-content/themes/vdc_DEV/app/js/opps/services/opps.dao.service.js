angular.module('opps')
.factory('oppsDaoSrv', function calendarDaoSrv(
  $http,
  constants
) {
  'use strict';

  function getPostsSuccess(response) {
    return response.data;
  }

  function getPostsError(reason) {
    return reason.data;
  }

  /**
   * rq {object} - The request object
   * @return {Promise}
   */
  function getPosts(request) {

    // NOT OPTIMISED VERSION
    var url = constants.api_url + 'opps-api';

    // CUSTOM VERSION (Optimised)
    // var url = constants.api_url + 'opps-api-custom';

    return $http.get(url, {'params': request})
      .then(getPostsSuccess, getPostsError);
  }

  // Public API
  return {
    'getPosts': getPosts
  };
});