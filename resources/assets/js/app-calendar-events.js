/**
 * App Calendar Events
 */

'use strict';

window.events = [];

eventLists.forEach(function (a) {
  var newItem = {
    id: a.id,
    url: '',
    title: a.title,
    start: new Date(a.start_date),
    end: new Date(a.end_date),
    description: a.description,
    allDay: true,
    extendedProps: {
      calendar: a.remark
    }
  };

  window.events.push(newItem);
});
