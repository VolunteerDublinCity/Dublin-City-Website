angular.module('calendar')
.factory('calendarSrv', function(
  daySrv
) {
  'use strict';

  function getDays(month, year, start, end) {
    var i, date, days = [];
    var today = new Date();

    for (i = start; i <= end; i++) {
      date = new Date(year, month, i);
      days.push(daySrv.setDayObj({
        'number': i,
        'date': date,
        'isToday': date.setHours(0,0,0,0) === today.setHours(0,0,0,0),
        'isSelected': false,
        'isCurrentMonth': date.getMonth() === today.getMonth()
      }));
    }

    return days;
  }

  function getDayNames() {
    return ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
  }

  /**
   * Populates first week of current month with days from previous month
   *
   *                 [01, 02, 03]  <- currWeekDays (week passed as argument)
   * [28, 29, 30, 31]              <- populatedDays form previous month
   * [28, 29, 30, 31, 01, 02, 03]  <- finalWeek
   *
   * @param {array} week - the week to be populated with days from prev month
   * @return {array} the finalWeek
   */
  function populateFirstWeek(week) {
    var i, date, number;
    var populatedDays = [];
    var currWeekDays = week.days;
    var firstCurrWeekDayObj = _.first(currWeekDays);
    var daysToPopulate = 7 - currWeekDays.length;

    for (i = daysToPopulate; i > 0; i--) {
      date = daySrv.getDateFrom(firstCurrWeekDayObj, i);
      number = date.getDate();

      populatedDays.push(daySrv.setDayObj({
        'number': number,
        'date': date,
        'isToday': false,
        'isSelected': false,
        'isCurrentMonth': false
      }));
    }

    return _.concat(populatedDays, currWeekDays);
  }

  /**
   * Populates last week of current month with days from next month
   *
   * [28, 29, 30, 31]              <- currWeekDays (week passed as argument)
   *                 [01, 02, 03]  <- populatedDays from next month
   * [28, 29, 30, 31, 01, 02, 03]  <- finalWeek
   *
   * @param {array} week - the week to be populated with days from next month
   * @return {array} the finalWeek
   */
  function populateLastWeek(week) {
    var i, date, number;
    var currWeekDays = week.days;
    var lastCurrWeekDayObj = _.last(currWeekDays);
    var daysToPopulate = 7 - currWeekDays.length;

    for (i = 1; i <= daysToPopulate; i++) {
      date = daySrv.getDateFrom(lastCurrWeekDayObj, -i);
      number = date.getDate();

      currWeekDays.push(daySrv.setDayObj({
        'number': number,
        'date': date,
        'isToday': false,
        'isSelected': false,
        'isCurrentMonth': false
      }));
    }

    // return _.concat(populatedDays, currWeekDays);
    return currWeekDays;
  }

  /**
   * Gets an array of weeks with start and end day.
   * Note: month is 0 based, just like Dates in js
   *
   * @param {integer} month - Month
   * @param {integer} year - Year
   * @return {array}
   */
  function getWeeksInMonth(month, year, startDay) {
    var weeks = [],
      firstDate = new Date(year, month, 1),
      lastDate  = new Date(year, month + 1, 0),
      numDays   = lastDate.getDate();
    var start   = 1;
    var end     = 7 - firstDate.getDay();

    if (startDay === 'monday') {
      if (firstDate.getDay() === 0) {
        end = 1;
      } else {
        end = 7 - firstDate.getDay() + 1;
      }
    }

    while (start <= numDays) {
      weeks.push({
        'start': start,
        'end': end,
        'days': getDays(month, year, start, end)
      });
      start = end + 1;
      end = end + 7;
      if (end > numDays) end = numDays;
    }

    weeks[0].days = populateFirstWeek(_.first(weeks));
    weeks[weeks.length - 1].days = populateLastWeek(_.last(weeks));

    return weeks;
  }

  // Public API
  return {
    'getWeeksInMonth': getWeeksInMonth,
    'getDayNames': getDayNames
  };
});