@extends('admin.layouts.app')
@section('title', __('site.products'))
@include('admin.products.includes.stylesInProduct')

@section('content')
@include('admin.layouts.messages.displayErrors')
   @include('admin.layouts.forms.edit', [
        'table' => 'products',
        'route_type' => 'dashboard',
        'form_method' => 'PATCH',
        'form_class' => 'custom-form-class',
        'form_status' => 'update',
        'model' => $product,
        'model_id' => $product->id,
        'enctype' => true,
    ])

@include('admin.products.includes.form-fields')
@endsection



@include('admin.products.includes.scriptsInProduct')
