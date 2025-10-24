@extends('admin.layouts.app')
@section('title', __('site.security'))
@section('styles')
@endsection
@section('content')
    @include('admin.profile.includes.tabs')

    @include('admin.layouts.messages.displayErrors')
    @include('admin.layouts.messages.success')
    <div class="card mb-4">
        <h5 class="card-header">Change Password</h5>
        <div class="card-body">
            <form id="formAccountSettings" action="{{ route('dashboard.profile.update.password') }}" method="POST"
                class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-6 form-password-toggle fv-plugins-icon-container">
                        <label class="form-label" for="newPassword">New Password</label>
                        <div class="input-group input-group-merge has-validation">
                            <input class="form-control" type="password" id="newPassword" name="password"
                                placeholder="············">
                            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                        </div>
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>

                    <div class="mb-3 col-md-6 form-password-toggle fv-plugins-icon-container">
                        <label class="form-label" for="confirmPassword">Confirm New Password</label>
                        <div class="input-group input-group-merge has-validation">
                            <input class="form-control" type="password" name="password_confirmation" id="confirmPassword"
                                placeholder="············">
                            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                        </div>
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary me-2 waves-effect waves-light">Save changes</button>
                        <button type="reset" class="btn btn-label-secondary waves-effect">Cancel</button>
                    </div>
                </div>
                <input type="hidden">
            </form>
        </div>
    </div>
@endsection
