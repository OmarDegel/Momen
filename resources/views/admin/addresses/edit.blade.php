@extends('admin.layouts.app')
@section('title', __('site.sizes'))
@section('styles')
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/select2/select2.css') }}" />
@endsection
@section('content')
    @include('admin.layouts.messages.displayErrors')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@lang('site.message_response')</h3>
        </div>
        <div class="card-body p-0">
            <div class="card-body">
                @include('admin.layouts.forms.edit', [
                    'table' => 'addresses',
                    'route_type' => 'dashboard',
                    'form_method' => 'PATCH',
                    'form_class' => 'custom-form-class',
                    'form_status' => 'update',
                    'model' => $address,
                    'model_id' => $address->id,
                    'enctype' => true,
                ])
                @include('admin.addresses.includes.form-fields')
                @include('admin.layouts.forms.close')
            </div>
        </div>

    @section('jsFiles')
        <script src="{{ asset('admin/assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
        <script src="{{ asset('js/showImage.js') }}"></script>
    @endsection
    @section('mainFiles')
        <script src="{{ asset('admin/assets/js/form-wizard-numbered.js') }}"></script>
        <script src="{{ asset('admin/assets/js/form-wizard-validation.js') }}"></script>
        <script src="{{ asset('admin/assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
        <script src="{{ asset('admin/assets/vendor/libs/select2/select2.js') }}"></script>
    @endsection
@endsection
