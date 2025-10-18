@extends('admin.layouts.app')
@section('title', __('site.sizes'))
@section('styles')
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/select2/select2.css') }}" />@endsection
@section('content')
    @include('admin.layouts.forms.edit', [
        'table' => 'sizes',
        'route_type' => 'dashboard',
        'form_method' => 'PATCH',
        'form_class' => 'custom-form-class',
        'form_status' => 'update',
        'model' => $size,
        'model_id' => $size->id,
        'enctype' => true,
    ])


    @include('admin.layouts.forms.head', [
        'show_name' => true,
        'show_content' => true,
        'show_image' => true,
        'name_ar' => $size->nameLang('ar'),
        'name_en' => $size->nameLang('en'),
        'content_ar' => $size->descriptionLang('ar') ?? null,
        'content_en' => $size->descriptionLang('en') ?? null,
    ])
    @include('admin.layouts.forms.fields.number', [
        'number_name' => 'order_id',
        'min' => 0,
        'placeholder' => __('site.order_id'),
        'number_value' => $size->order_id ?? null,
    ])
    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'active',
        'select_function' => [0 => __('site.not_active'), 1 => __('site.active')],
        'select_value' => $size->active ?? null,
        'select_class' => 'select2',
        'select2' => true,
    ])

    @include('admin.layouts.forms.footer')
    @include('admin.layouts.forms.close')
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
