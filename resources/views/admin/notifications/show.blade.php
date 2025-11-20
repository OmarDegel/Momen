@extends('admin.layouts.app')
@section('title', __('site.contacts'))
@section('styles')

@section('content')


                @include('admin.layouts.messages.success')
                @include('admin.layouts.messages.displayErrors')
                

                @include('admin.notifications.includes.message-details')

@endsection
