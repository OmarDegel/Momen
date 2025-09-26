<script>
    var $jq = jQuery.noConflict();

    $jq(document).ready(function () {
        var csrfToken = $jq('meta[name="csrf-token"]').attr('content');

        $jq.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        $jq(document).on('click', 'button[data-full-class]', function (e) {
            e.preventDefault();

            var button = $jq(this);
            var fullClass = button.data('full-class'); 
            var [funcName, model] = fullClass.split('-');

            var modelId = button.data('id');
            var url = button.data('url');

            $jq.ajax({
                url: url,
                type: 'GET',
                success: function (response) {
                    if (response.active) {
                        button.removeClass('btn-danger').addClass('btn-success');
                        button.find('i').removeClass('fa-circle-xmark').addClass('fa-check');
                    } else {
                        button.removeClass('btn-success').addClass('btn-danger');
                        button.find('i').removeClass('fa-check').addClass('fa-circle-xmark');
                    }
                },
                error: function () {
                    alert('Error happened');
                }
            });
        });
    });
</script>
