<script>
    $(document).on('change', '.change-status', function() {
        let select = $(this);
        let newStatus = select.val();
        let selectId = select.attr('id');
        let orderId = selectId.replace('status', '');

        $.ajax({
            url: '{{ route('dashboard.orders.change_status', ':id') }}'.replace(':id', orderId),
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                status: newStatus
            },
            success: function(response) {
                if (response.success) {

                    let transitions = response.transitions;
                    let current = response.current;
                    console.log(current);
                    select.empty();

                    $.each(transitions, function(value, label) {
                        let isSelected = value === current ? 'selected' : '';
                        select.append(
                            `<option value="${value}" ${isSelected}>${label}</option>`);
                    });
                    console.log(("#cancel-" + orderId));
                    if (['canceled', 'rejected', 'returned', 'delivered'].includes(newStatus)) {
                        $("#cancel-" + orderId).remove();
                    }


                    if (select.hasClass('select2')) {
                        select.trigger('change.select2');
                    }
                } else {
                    alert(response.message || 'Something went wrong');
                }
            },
            error: function(xhr) {
                let msg = xhr.responseJSON?.message || 'Unexpected error';
                alert(msg);
            }
        });
    });
</script>
