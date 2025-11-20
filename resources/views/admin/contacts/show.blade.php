@extends('admin.layouts.app')
@section('title', __('site.contacts'))
@section('styles')

@section('content')


                @include('admin.layouts.messages.success')
                @include('admin.layouts.messages.displayErrors')
                

                @include('admin.contacts.includes.message-details')
                @include('admin.contacts.includes.send-message')

@endsection
