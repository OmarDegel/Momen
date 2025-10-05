<script>
    'use strict';

  document.addEventListener('DOMContentLoaded', function () {

    const dateStart = document.querySelector('#flatpickr-datetime-start');
    const dateEnd = document.querySelector('#flatpickr-datetime-end');

    if (dateStart) {
      flatpickr(dateStart, {
        enableTime: true,
        dateFormat: 'Y-m-d H:i'
      });
    }

    if (dateEnd) {
      flatpickr(dateEnd, {
        enableTime: true,
        dateFormat: 'Y-m-d H:i'
      });
    }
  });
</script>
