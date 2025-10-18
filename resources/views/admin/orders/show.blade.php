@extends('admin.layouts.app')
@section('title', __('site.brands'))
@section('styles')

@endsection
@section('content')

    @include('admin.orders.includes.header', ['order' => $order])

    <!-- Order Details Table -->

    <div class="row">
        @include('admin.orders.includes.order-details', ['order' => $order])
        @include('admin.orders.includes.shipping-activity', ['order' => $order])
        <div class="col-12 col-lg-4">
            @include('admin.orders.includes.customer-details', ['order' => $order])
            @include('admin.orders.includes.shipping-details', ['order' => $order])

            @include('admin.orders.includes.payment-details', ['order' => $order])

        </div>
    </div>
@endsection
@section('mainFiles')

@endsection
