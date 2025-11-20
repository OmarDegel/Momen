<script>
    // Pass the route URL from Blade to a JavaScript variable
    const uploadUrl = "{{ route('admin.uploadImageViaAjax') }}?source={{$table}}&type={{$type}}";
    const removefile = "{{ route('admin.removeImageViaAjax') }}?source={{$table}}&type={{$type}}";
    const uploadpath= "{{ $uploadpath ?? null }}";
</script>