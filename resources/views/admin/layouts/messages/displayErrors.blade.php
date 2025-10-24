@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>

<script>
    setTimeout(function () {
            let message = document.getElementById('success-message');
            if (message) {
                message.style.display = 'none';
            }
        }, 3000);
</script>
@else 
@if (session('error'))
<div class="alert alert-danger" id="success-message">
    {{ session('error') }}
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
@endif

