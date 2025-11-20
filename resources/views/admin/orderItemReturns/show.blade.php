@extends('admin.layouts.app')
@section('title', __('site.brands'))
@section('styles')
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/select2/select2.css') }}" />

@endsection
@section('content')

@include('admin.orderItemReturns.includes.header', ['orderItemReturn' => $orderItemReturn])

<!-- orderItemReturn Details Table -->

<div class="row">
    @include('admin.orderItemReturns.includes.order-details', ['orderItemReturn' => $orderItemReturn])
    @include('admin.orderItemReturns.includes.shipping-activity', ['orderItemReturn' => $orderItemReturn])
    <div class="col-12 col-lg-4">
        @include('admin.orderItemReturns.includes.customer-details', ['orderItemReturn' => $orderItemReturn])


    </div>
</div>
@endsection
@section('jsFiles')
<script src="{{ asset('admin/assets/vendor/libs/select2/select2.js') }}"></script>
@include('admin.layouts.table.ajaxChangeItemStatus', ['model' => 'orderItemReturns'])

@endsection