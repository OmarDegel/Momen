@extends('admin.layouts.app')
@section('title', __('site.notifications'))
@section('styles')
@include('admin.layouts.table.datatablesCss')
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/flatpickr/flatpickr.css')}}" />


@endsection
@section('content')
    @include('admin.layouts.messages.success')
    @include('admin.layouts.messages.displayErrors')
    <div class="card">
        @include('admin.notifications.includes.table')
    </div>
@include('admin.notifications.includes.filter')

@endsection

@section('jsFiles')
<script src="{{ asset('admin/assets/vendor/libs/select2/select2.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
@include('admin.layouts.table.dataTableJs', ['table' => $notifications->count() > 0])
@endsection

@section('mainFiles')
@include('admin.products.includes.date_scriptsjs')
<script src="{{ asset('admin/assets/js/modal-add-new-address.js') }}"></script>
@endsection

