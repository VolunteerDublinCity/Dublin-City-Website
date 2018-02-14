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
   *    buildRequest(dateStart, dateEnd) --> Will return post between those dates
   *
   * @expected response:
   *
   *    /wp-json/wp/v2/opps-api-custom?
   *      meta_query[0][key]=dates&
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
      return;
    }

    return {
      'meta_query[0][key]': 'dates',
      'meta_query[0][value][0]': dateStartFormated,
      'meta_query[0][value][1]': dateEndFormated,
      'meta_query[0][compare]': 'BETWEEN',
      'meta_query[0][type]': 'DATE'
    };
  }

  /**
   * Returns the opps matching the given date
   *
   * @param {array} opps
   * @param {date} date
   * @return {array} - the opportunities for that particular date
   */
  function getPostsOnDate(opps, date) {
    var formatedDate = $filter('date')(date, 'yyyy/MM/dd');

    return _.filter(opps, function(opp){
      var oppDates = opp.acf && opp.acf.dates || [];
      var dateFound = _.find(oppDates, function(oppDate) {
        return formatedDate === $filter('date')(new Date(oppDate.date), 'yyyy/MM/dd');
      });

      return !_.isUndefined(dateFound);
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