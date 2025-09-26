@php
    $function = $function ?? 'cancel';
@endphp


<script>
    var $jq = jQuery.noConflict();

    $jq(document).ready(function() {
        var csrfToken = $jq('meta[name="csrf-token"]').attr('content');
        $jq.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });


        var model = "{{ $model }}";
        var funcName = "{{ $function }}";

        $jq('.' + funcName + '-' + model).on('click', function(e) {
            e.preventDefault();

            var button = $jq(this);
            var modelId = button.data(model + '-id');
            var url = button.data('url');

            $jq.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    if (response.success) {
                        button.remove();

                        let select = $jq('#status' +
                            modelId);
                        let transitions = response.transitions;
                        let current = response.current;

                        select.empty();

                        $jq.each(transitions, function(value, label) {
                            let isSelected = value === current ? 'selected' : '';
                            select.append(
                                `<option value="${value}" ${isSelected}>${label}</option>`
                            );
                        });

                        if (select.hasClass('select2')) {
                            select.trigger('change.select2');
                        }
                    } else {
                        alert('Something went wrong');
                    }
                },
                error: function() {
                    alert('Unexpected error');
                }
            });
        });

    });
</script>
