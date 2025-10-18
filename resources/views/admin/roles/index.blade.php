@extends('admin.layouts.app')
@section('title', __('site.roles'))

@section('styles')
@include('admin.layouts.table.datatablesCss')
@endsection

@section('content')
@include('admin.layouts.messages.success')
@include('admin.layouts.messages.displayErrors')
<div class="card">
    @include('admin.roles.includes.table')
</div>
@endsection


@section('jsFiles')
<script src="{{asset("admin/assets/vendor/libs/select2/select2.js")}}"></script>
@include('admin.layouts.table.dataTableJs',["table"=>$roles->count() > 0])
@endsection