@extends('admin.layouts.app')
@section('title', __('site.pages'))
@section('styles')
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/select2/select2.css') }}" />
    @include('admin.layouts.table.datatablesCss')

@endsection
@section('content')
    @include('admin.layouts.messages.success')
    @include('admin.layouts.messages.displayErrors')
    <div class="card">
        @include('admin.pages.includes.table')
    </div>
    </div>
@endsection

@section('mainFiles')
    <script src="{{ asset('admin/assets/js/modal-add-new-address.js') }}"></script>
@endsection
@section('jsFiles')
<script src="{{ asset('admin/assets/vendor/libs/select2/select2.js') }}"></script>
@include('admin.layouts.table.dataTableJs', ['table' => $pages->count() > 0])
@include('admin.layouts.table.ajaxActiveJs', ['model' => 'pages'])
@endsection
