@extends('admin.layouts.app')
@section('title', __('site.products'))
@include('admin.products.includes.stylesInProduct')


@section('content')
    @include('admin.layouts.messages.displayErrors')
    @include('admin.layouts.forms.create', [
        'form_method' => 'POST',
        'form_class' => 'needs-validation',
        'form_status' => 'store',
        'table' => 'dashboard.products',
        'model_id' => $product->id ?? null,
        'enctype' => true,
    ])

    @include('admin.products.includes.form-fields')
@endsection



@include('admin.products.includes.scriptsInProduct')
