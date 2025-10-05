<script>
        $(document).ready(function() {

            $('#service_id').on('change', function() {
                let serviceId = $(this).val();

                let $categorySelect = $('#categories');
                $categorySelect.empty(); // Clear old options

                if (serviceId) {
                    $.ajax({
                        url: `/dashboard/getCategoryByService/${serviceId}`,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            if (response.success && response.categories) {
                                $.each(response.categories, function(id, name) {
                                    let option = new Option(name, id, false, false);
                                    $categorySelect.append(option);
                                });
                                $categorySelect.trigger('change');
                            } else {
                                alert(__('site.not_found_category_in_this_service'));
                            }
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText);
                            alert("حدث خطأ أثناء تحميل الأقسام.");
                        }
                    });
                }
            });

        });
    </script>
