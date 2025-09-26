<script>
    document.addEventListener('click', function (e) {
    const button = e.target.closest('.btn-toggle-active');
    if (button) {
        const id = button.dataset.id;
        const model = button.dataset.model;

        fetch(`/dashboard/${model}/${id}/toggle-active`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({})
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                const isActive = data.active;
                const statusText = button.querySelector('.status-text');

                statusText.innerText = isActive ? 'Active' : 'Not Active';
                button.classList.remove('btn-success', 'btn-danger');
                button.classList.add(isActive ? 'btn-success' : 'btn-danger');
            } else {
                alert('Failed to toggle status.');
            }
        })
        .catch(() => alert('Error occurred'));
    }
});
</script>