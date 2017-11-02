angular.module('opps')
.factory('oppsSrv', function(
  $filter,
  oppsDaoSrv
) {
  'use strict';

  /**
   * Builds the request object used in calendarDaoSrv
   *
   * @usage:
   *
   *    buildRequest(dateStart) --> Will return post just for that day
   *    buildRequest(dateStart, dateEnd) --> Will return post between those dates
   *
   * @expected response:
   *
   *    /wp-json/wp/v2/opps-api?
   *      meta_query[0][key]=from_date&
   *      meta_query[0][value][0]=2017-10-10&
   *      meta_query[0][value][1]=2017-10-13&
   *      meta_query[0][compare]=BETWEEN&
   *      meta_query[1][type]=DATE
   *
   * @param {date} dateStart - We'll request post from this date
   * @param {date} dateEnd - (Optional) We'll request posts until this date
   * @return {object} - The request
   */
  function buildRequest(dateStart, dateEnd) {
    var request;
    var dateStartFormated = dateStart && $filter('date')(dateStart, 'yyyy-MM-dd');
    var dateEndFormated = dateEnd && $filter('date')(dateEnd, 'yyyy-MM-dd');

    if (!_.isDate(dateEnd)) {
      request = {
        'meta_query[relation]': 'AND',
        'meta_query[0][key]': 'from_date',
        'meta_query[0][value]': dateStartFormated,
        'meta_query[0][compare]': '<=',
        'meta_query[0][type]': 'DATE',
        'meta_query[1][key]': 'to_date',
        'meta_query[1][value]': dateStartFormated,
        'meta_query[1][compare]': '>=',
        'meta_query[1][type]': 'DATE'
      };
    } else {
      request = {
        'meta_query[0][key]': 'from_date',
        'meta_query[0][value][0]': dateStartFormated,
        'meta_query[0][value][1]': dateEndFormated,
        'meta_query[0][compare]': 'BETWEEN',
        'meta_query[0][type]': 'DATE'
      };
    }

    return request;
  }

  /**
   * Returns the opps matching the given date
   *
   * @param {array} opps
   * @param {date} date
   * @return {array} - the opportunities for that particular date
   */
  function getPostsOnDate(opps, date) {
    return _.filter(opps, function(opp){
      var oppFromDate = new Date(Date.parse(opp.from_date));
      var oppToDate = new Date(Date.parse(opp.to_date));
      return date <= oppToDate && date >= oppFromDate;
    });
  }

  function getPosts(request) {
    return oppsDaoSrv.getPosts(request);
  }

  // Public API
  return {
    'buildRequest': buildRequest,
    'getPostsOnDate': getPostsOnDate,
    'getPosts': getPosts
  };
});