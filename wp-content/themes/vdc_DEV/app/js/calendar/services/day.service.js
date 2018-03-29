angular.module('calendar')
.factory('daySrv', function(
  // dependencies
) {
  'use strict';

   var now = new Date();
   var nowNumber = now.getDate();

  /**
   * Model and default values
   */
  var dayModel = {
    'number': nowNumber,
    'date': now,
    'opps' : [],
    'isSelected': false,
    'isToday': false,
    'isCurrentMonth': false
  };

  /**
   * Populates dayObj with dayModel if value is not available in dayObj
   *
   * @param {object} dayObj - day object to be populated with dayModel
   * @return {object} new dayObj with defaults values.
   */
  function setDayObj(dayObj) {
    return _.defaults(dayObj, dayModel);
  }

  function setSelected(dayObj, value) {
    dayObj.isSelected = value;
  }

  function select(dayObj) {
    setSelected(dayObj, true);
  }

  function unselect(dayObj) {
    setSelected(dayObj, false);
  }

  /**
   * Generates another date from the given dayObj, X days ahead or behind.
   *
   * if days === 0, it will return the same date.
   *
   * @param {object} dayObj - We will get the initial date from dayObj.date
   * @param {integer} days - The amount of days ahead or behind
   * @return {date} - the new date
   */
  function getDateFrom(dayObj, days) {
    var currDate = getDate(dayObj);
    var currTime = currDate.getTime();
    var currDay  = currDate.getDate();
    var newDate  = new Date(currTime);

    newDate.setDate(currDay - days);

    return newDate;
  }

  function getDate(dayObj) {
    return dayObj.date;
  }

  // Public API
  return {
    'setDayObj': setDayObj,
    'select': select,
    'unselect': unselect,
    'setSelected': setSelected,
    'getDateFrom': getDateFrom
  };
});