<script>

   $(document).on('click', '.logout-session', function() {
    let sessionId = $(this).data('id');
    let row = $(this).closest('tr');
    let message = "{{ __('site.are_you_sure_you_want_to_logout_this_device') }}";

    if (confirm( message)) {
        $.ajax({
            url: `/dashboard/sessions/${sessionId}`,
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.status === 'success') {
                    // احذف الصف من الجدول
                    row.remove();

                    // قلل العدد في البادج
                    let badge = $('#session-count');
                    let currentCount = parseInt(badge.text());
                    badge.text(currentCount - 1);
                }
            }
        });
    }
});

</script>