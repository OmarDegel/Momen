<script>


    $(document).ready(function() {


      // عند تغيير أي Checkbox، تحقق من حالة الموديول ونوع الصلاحية والـ Select All
      function updateCheckboxStates() {

          $('.select-module').each(function() {
              var moduleRow = $(this).closest('tr');
              var allChecked = moduleRow.find('.form-check-input:not(.select-module)').length ===
                               moduleRow.find('.form-check-input:not(.select-module):checked').length;
              $(this).prop('checked', allChecked);
          });


        $('.select-type').each(function() {
            var type = $(this).data('type');


            var relatedCheckboxes = $('tbody td input[data-type="' + type + '"]');



            var checkedCount = relatedCheckboxes.filter(':checked').length;
            var allChecked = relatedCheckboxes.length > 0 && relatedCheckboxes.length === checkedCount;



            $('thead th input[data-type="' + type + '"]').prop('checked', allChecked);
        });

        var allInputs = $('.form-check-input:not(.selectAll) ');
        var allChecked = allInputs.length === allInputs.filter(':checked').length;
        $('.selectAll').prop('checked', allChecked);
      }

      // تحديد جميع الصلاحيات
      $('.selectAll').on('change', function() {
        $(this).closest('table').find('.form-check-input').prop('checked', $(this).prop('checked'));
      });

      // تحديد جميع الصلاحيات لنوع معين (مثل read, create, delete...)
      $('.select-type').on('change', function() {
          let type = $(this).data('type');
          $('input[data-type="' + type + '"]').prop('checked', $(this).prop('checked'));
          updateCheckboxStates();
      });

      // تحديد جميع الصلاحيات الخاصة بموديول معين
      $('.select-module').on('change', function() {
          $(this).closest('tr').find('.form-check-input:not(.select-module)').prop('checked', $(this).prop('checked'));
          updateCheckboxStates();
      });

      // تحديث حالة checkboxes عند تغيير أي صلاحية مفردة
      $('table').on('change', '.form-check-input:not(.select-module, .select-type, .selectAll)', function() {
        console.log('change in table ')
        updateCheckboxStates();
      });

      // استدعاء الدالة عند تحميل الصفحة لتحديث الحالات المبدئية
      updateCheckboxStates();
    });
</script>
