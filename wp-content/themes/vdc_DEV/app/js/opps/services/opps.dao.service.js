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
    // return $http.get(constants.api_url + 'opps-api', {'params': request})
    //   .then(getPostsSuccess, getPostsError);

    // CUSTOM VERSION (Optimised)
    return $http.get(constants.api_url + 'opps-api-custom', {'params': request})
      .then(getPostsSuccess, getPostsError);
  }

  // Public API
  return {
    'getPosts': getPosts
  };
});