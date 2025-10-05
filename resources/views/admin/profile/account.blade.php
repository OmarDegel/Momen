@extends('admin.layouts.app')
@section('title', __('site.account'))
@section('styles')
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/@form-validation/form-validation.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
@endsection
@section('content')
    <div class="row fv-plugins-icon-container">
        <div class="col-md-12">
            @include('admin.profile.includes.tabs')
            @include('admin.layouts.messages.displayErrors')
            @include('admin.layouts.messages.success')
            <div class="card mb-4">
                <h5 class="card-header">Profile Details</h5>
                <!-- Account -->
                <form action="{{ route('dashboard.profile.update') }}" method="POST"
                    class="fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            @if ($user->image != null)
                                <img src="{{ asset($user->image) }}" alt="user-avatar"
                                    class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar">
                            @else
                                <img src="{{ asset('admin/assets/img/avatars/14.png') }}" alt="user-avatar"
                                    class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar">
                            @endif
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-3 waves-effect waves-light"
                                    tabindex="0">
                                    <span class="d-none d-sm-block">{{ __('site.upload') }}</span>
                                    <i class="ti ti-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" class="account-file-input" hidden=""
                                        name="image" accept="image/png, image/jpeg">
                                </label>
                                <button type="button"
                                    class="btn btn-label-secondary account-image-reset mb-3 waves-effect">
                                    <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">{{ __('site.reset') }}</span>
                                </button>

                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">


                        <div class="row">
                            <div class="mb-3 col-md-6 fv-plugins-icon-container">
                                <label for="name_first" class="form-label">{{ __('site.first_name') }}</label>
                                <input class="form-control" type="text" id="name_first" name="name_first"
                                    value="{{ $user->name_first }}" autofocus="">
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                            <div class="mb-3 col-md-6 fv-plugins-icon-container">
                                <label for="name_last" class="form-label">{{ __('site.last_name') }}</label>
                                <input class="form-control" type="text" name="name_last" id="name_last"
                                    value="{{ $user->name_last }}">
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">{{ __('site.email') }}</label>
                                <input class="form-control" type="text" id="email" name="email"
                                    value="{{ $user->email }}" placeholder="john.doe@example.com">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="phone" class="form-label">{{ __('site.phone') }}</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ $user->phone }}" placeholder="+1 1234 5678">
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="theme">{{ __('site.theme') }}</label>
                                <div class="position-relative"><select id="theme"
                                        class="select2 form-select select2-hidden-accessible" data-select2-id="theme"
                                        tabindex="-1" aria-hidden="true" name="theme">
                                        <option value="dark" @selected($user->theme == 'dark')>{{ __('site.dark') }}</option>
                                        <option value="light" @selected($user->theme == 'light')>{{ __('site.light') }}
                                        </option>

                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="language" class="form-label">Language</label>
                                <div class="position-relative"><select id="language"
                                        class="select2 form-select select2-hidden-accessible" data-select2-id="language"
                                        tabindex="-1" aria-hidden="true" name="locale">
                                        <option value="en" @selected($user->locale == 'en')>{{ __('site.english') }}
                                        </option>
                                        <option value="ar" @selected($user->locale == 'ar')>{{ __('site.arabic') }}
                                        </option>
                                    </select>
                                </div>
                            </div>


                        </div>
                        <div class="mt-2">
                            <button type="submit"
                                class="btn btn-primary me-2 waves-effect waves-light">{{ __('site.save') }}</button>
                            <button type="reset"
                                class="btn btn-label-secondary waves-effect">{{ __('site.cancel') }}</button>
                        </div>
                        <input type="hidden">
                </form>
            </div>
            <!-- /Account -->
        </div>
        <div class="card">
            <h5 class="card-header">Delete Account</h5>
            <div class="card-body">
                <div class="mb-3 col-12 mb-0">
                    <div class="alert alert-warning">
                        <h5 class="alert-heading mb-1">Are you sure you want to delete your account?</h5>
                        <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                    </div>
                </div>
                <form action="{{ route('dashboard.profile.delete.account') }}" method="POST">
                    @csrf
                    <div class="form-check mb-4">
                        <input class="form-check-input delete-check" type="checkbox" name="accountActivation"
                            id="accountActivation">
                        <label class="form-check-label" for="accountActivation">
                            I confirm my account deactivation
                        </label>
                    </div>
                    <button type="submit"
                        class="btn btn-danger deactivate-account waves-effect waves-light check-deactivate" disabled>
                        Deactivate Account
                    </button>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('jsFiles')
    <script src="{{ asset('admin/assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/@form-validation/popular.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/@form-validation/auto-focus.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".delete-check").change(function() {
                if ($(this).is(":checked")) {
                    $(".check-deactivate").prop("disabled", false);
                } else {
                    $(".check-deactivate").prop("disabled", true);
                }
            })
        })
    </script>
@endsection
@section('mainFiles')
    <script src="{{ asset('admin/assets/js/pages-account-settings-account.js') }}"></script>
@endsection
