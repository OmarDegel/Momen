@extends('admin.layouts.app')
@section('title', __('site.coupons'))
@section('styles')
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.1.0/ckeditor5.css">

@endsection
@section('content')
    @include('admin.layouts.forms.edit', [
        'table' => 'coupons',
        'route_type' => 'dashboard',
        'form_method' => 'PATCH',
        'form_class' => 'custom-form-class',
        'form_status' => 'update',
        'model' => $coupon,
        'model_id' => $coupon->id,
        'enctype' => true,
    ])

    @include('admin.coupons.includes.form-fields')

@endsection

@section('jsFiles')
    <script src="{{ asset('admin/assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
@endsection
@section('mainFiles')
    <script src="{{ asset('admin/assets/js/form-wizard-numbered.js') }}"></script>
    <script src="{{ asset('admin/assets/js/form-wizard-validation.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/select2/select2.js') }}"></script>
    @include('admin.layouts.js.editor')

@endsection
