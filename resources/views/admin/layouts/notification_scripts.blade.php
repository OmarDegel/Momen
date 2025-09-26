<audio id="notification-sound" src="{{ asset('sounds/notification.mp3') }}" preload="auto"></audio>

<script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.11.3/echo.iife.js"></script>

<script>
    window.Pusher = Pusher;

    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: '53267465306fb166c540',
        cluster: 'eu',
        forceTLS: true
    });

   Echo.private('user.{{ auth()->id() }}')
    .listen('.notification.new', function (e) {
        console.log('notification sound played');
        $("#notificationCount").load(window.location.href + " #notificationCount");
        $("#notifications-dropdown").load(window.location.href + " #notifications-dropdown");
        document.getElementById('notification-sound').play();

    });

</script>
<script>
    $(document).on('click', '.dropdown-notifications-read', function (e) {
        e.preventDefault();

        const $el = $(this);
        const notificationId = $el.data('notification-id');

        $.ajax({
            url: `/dashboard/notifications/mark_as_read/${notificationId}`,
            method: 'GET',
            success: function (response) {
                if (response.success) {
                    $el.find('.badge-dot').remove();
                    console.log('Notification marked as read');
                }
            },
            error: function (xhr) {
                console.error('Something went wrong!', xhr);
            }
        });
    });
</script>
