@if (session('success'))
    <div class="alert alert-success" id="success-message">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(function () {
            let message = document.getElementById('success-message');
            if (message) {
                message.style.display = 'none';
            }
        }, 3000);
    </script>
@endif