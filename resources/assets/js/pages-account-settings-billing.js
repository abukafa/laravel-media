/**
 * Account Settings - Billing & Plans
 */

'use strict';

// Event start (flatpicker)
const birthDate = document.querySelector('#date');
if (birthDate) {
  var start = birthDate.flatpickr({
    enableTime: false,
    altFormat: 'Y-m-d',
    onReady: function (selectedDates, dateStr, instance) {
      if (instance.isMobile) {
        instance.mobileInput.setAttribute('step', null);
      }
    }
  });
}

// Select2 (jquery)
$(function () {
  var select2 = $('.select2');

  // Select2
  if (select2.length) {
    select2.each(function () {
      var $this = $(this);
      $this.wrap('<div class="position-relative"></div>');
      $this.select2({
        dropdownParent: $this.parent()
      });
    });
  }
});
