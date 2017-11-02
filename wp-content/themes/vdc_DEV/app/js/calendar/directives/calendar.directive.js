angular.module('calendar')
.directive('calendar', function calendarDirective(
  $rootScope,
  constants,
  calendarSrv,
  oppsSrv,
  daySrv
){
  'use strict';

  return {
    restrict: 'E',
    templateUrl: constants.template_directory +
      'app/js/calendar/html/calendar.tmpl.html',
    transclude: false,
    replace: false,
    scope: {},
    controller: function controller($scope) {

      var currMonth;
      var currYear;
      var today       = new Date();
      var todayMonth  = today.getMonth();
      var todayYear   = today.getFullYear();

      /**
       * Transforms "YYYY-mm-DD HH:mm:ss" into Date object: new Date()
       *
       * @param {type} dateStr - Date in format "YYYY-mm-DD HH:mm:ss"
       * @return {date}
       */
      function dateStrToDate(dateStr) {
        var dateParts = dateStr.split(/[ \/:-]/g);
        return new Date(dateParts[0], dateParts[1] - 1, dateParts[2]);
      }

      function getAllDays() {
        var days = [];
        _.each($scope.weeks, function(week){
          days.push(week.days);
        });

        return _.flatten(days);
      }

      function populateEventsPerDay() {
        $scope.days = getAllDays();

        _.each($scope.days, function(day){
          var opps = [];

          _.each($scope.opps, function(opp){
            var fromDate = dateStrToDate(opp.from_date);
            var toDate = dateStrToDate(opp.to_date);
            var dateToCheck = day.date;

            if(
              dateToCheck.getTime() >= fromDate.getTime() &&
              dateToCheck.getTime() <= toDate.getTime()
            ) {
              opps.push(opp);
            }
          });

          day.opps = opps;
        });
      }

      function getTodayEvents() {
        return todayMonth === currMonth ?
          oppsSrv.getPostsOnDate($scope.opps, today) :
          [];
      }

      /**
       * Callback to be executed when server sends an error response
       *
       * @param {object} reason - The reason of the error
       */
      function getAllPostInMonthError(reason) {

      }

      /**
       * Callback to be executed when server sends a success response
       *
       * @param {object} response - The response from server
       */
      function getAllPostInMonthSuccess(response) {
        $scope.opps = response;
        populateEventsPerDay();

        // Populate the whole month in opp list.
        // $rootScope.$emit('oppsLoaded', response);

        // Populate just the current day in opp list.
        $rootScope.$emit('oppsLoaded', getTodayEvents());
      }

      function getAllPostWithinMonth() {
        var firstWeek    = _.first($scope.weeks);
        var firstDay     = _.first(firstWeek.days);
        var lastWeek     = _.last($scope.weeks);
        var lastDay      = _.last(lastWeek.days);
        var firstDayDate = firstDay && firstDay.date || new Date(currYear, currMonth, 1);
        var lastDayDate  = lastDay && lastDay.date || new Date(currYear, currMonth + 1, 0);
        var request      = oppsSrv.buildRequest(firstDayDate, lastDayDate);

        oppsSrv
          .getPosts(request)
          .then(getAllPostInMonthSuccess, getAllPostInMonthError);
      }

      /**
       * Initialisation depending on passed day
       *
       * @param {number} month: (Optional) The month number to initialise the calendar
       * @param {number} year: (Optional) The year number to initialise the calendar
       * @return {undefined}
       */
      function init(month, year) {
        currMonth = _.isNumber(month) ? month : todayMonth;
        currYear  = _.isNumber(year) ? year : todayYear;

        // API
        $scope.dayNames = calendarSrv.getDayNames();
        $scope.selected = '';
        $scope.today    = today;
        $scope.firstDay = new Date(currYear, currMonth);
        $scope.weeks    = calendarSrv.getWeeksInMonth(currMonth, currYear, 'monday');

        getAllPostWithinMonth();
      }

      function nextMonth(){
        currMonth++;
        if (currMonth === 12) {
          currMonth = 0;
          currYear++;
        }
        init(currMonth,currYear);
      }

      function previousMonth(){
        currMonth--;
        if (currMonth === -1) {
          currMonth = 11;
          currYear--;
        }
        init(currMonth,currYear);
      }

      function unselectAllDays() {
        _.each($scope.weeks, function eachWeek(week){
          _.map(week.days, daySrv.unselect);
        });
      }

      // Initialisation
      init(todayMonth, todayYear);

      // API
      $scope.next = nextMonth;
      $scope.previous = previousMonth;
      $scope.unselectAllDays = unselectAllDays;
    },
    link: function link(){

    }
  };
});