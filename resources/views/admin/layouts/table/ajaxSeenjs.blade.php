@php
    $function = $function ?? 'seen';
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


        // Pass the Blade PHP variable into JS safely
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
                    if (response.seen) {
                        button.removeClass('btn-danger').addClass('btn-success disabled');
                        button.find('i').removeClass('fa-circle-xmark').addClass(
                            'fa-check');
                    } else {
                        button.removeClass('btn-success').addClass('btn-danger');
                        button.find('i').removeClass('fa-check').addClass(
                            'fa-circle-xmark');
                    }

                },
                error: function(xhr) {
                    alert('There was an error. Please try again.');
                }
            });
        });
    });
</script>
