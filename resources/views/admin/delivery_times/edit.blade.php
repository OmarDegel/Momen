@extends('admin.layouts.app')
@section('title', __('site.delivery_times'))
@section('styles')
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/dropzone/dropzone.css') }}" />
@endsection
@section('content')
    @include('admin.layouts.messages.displayErrors')
    @include('admin.layouts.forms.edit', [
        'table' => 'delivery_times',
        'route_type' => 'dashboard',
        'form_method' => 'PATCH',
        'form_class' => 'custom-form-class',
        'form_status' => 'update',
        'model' => $delivery_time,
        'model_id' => $delivery_time->id,
        'enctype' => true,
    ])
    @include('admin.delivery_times.includes.form-fields')

@endsection
@section('jsFiles')
    <script src="{{ asset('admin/assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>

@endsection
@section('mainFiles')
    <script src="{{ asset('admin/assets/js/form-wizard-numbered.js') }}"></script>
    <script src="{{ asset('admin/assets/js/form-wizard-validation.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/select2/select2.js') }}"></script>
@endsection
