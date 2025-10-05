@extends('admin.layouts.app')
@section('title', __('site.reviews'))
@section('styles')
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/select2/select2.css') }}" />
@include('admin.layouts.table.datatablesCss')

@endsection
@section('content')
@include('admin.layouts.messages.success')
@include('admin.layouts.messages.displayErrors')
<div class="card">
    @include('admin.reviews.includes.table')
</div>
</div>
@include('admin.reviews.includes.filter')

@section('mainFiles')
<script src="{{ asset('admin/assets/js/modal-add-new-address.js') }}"></script>
<script>
    $(document).ready(function() {
    $('#type').on('change', function() {
        var type = $(this).val();
        if (type === 'products') {
            $('#product_id').closest('.col-md-6').show();
        } else {
            $('#product_id').closest('.col-md-6').hide(); 
        }
    });

    $('#type').trigger('change');
});

</script>
@endsection
@section('jsFiles')
<script src="{{ asset('admin/assets/vendor/libs/select2/select2.js') }}"></script>
@include('admin.layouts.table.dataTableJs', ['table' => $reviews->count() > 0])
@include('admin.layouts.table.ajaxActiveJs', ['model' => 'reviews'])

@endsection
@endsection