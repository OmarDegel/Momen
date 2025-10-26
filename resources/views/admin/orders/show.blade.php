@extends('admin.layouts.app')
@section('title', __('site.order_details'))
@section('styles')
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/select2/select2.css') }}" />

@endsection
@section('content')

@include('admin.orders.includes.header', ['order' => $order])

<!-- Order Details Table -->

<div class="row">
    @include('admin.orders.includes.order-details', ['order' => $order])
    @include('admin.orders.includes.order_items-details', ['order' => $order])
    @include('admin.orders.includes.shipping-activity', ['order' => $order])
    @include('admin.orders.includes.customer-details', ['order' => $order])
    @include('admin.orders.includes.shipping-details', ['order' => $order])

    @include('admin.orders.includes.payment-details', ['order' => $order])

</div>
@endsection
@section('jsFiles')
<script src="{{ asset('admin/assets/vendor/libs/select2/select2.js') }}"></script>
@include('admin.layouts.table.ajaxChangeStatus', ['model' => 'orders'])

@endsection