
@extends('admin.layouts.foots.foot')
@section('jsFiles')
    <!-- Vendors JS -->
    <!-- Forms js -->
    <script src="{{ url('admin/assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
    <script src="{{ url('admin/assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ url('admin/assets/vendor/libs/select2/select2.js') }}"></script>
    <!-- date picker js -->
    <script src="{{ url('admin/assets/vendor/libs/date/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ url('admin/assets/vendor/libs/date/bootstrap-datetimepicker.min.js') }}"></script>
    <!-- End date picker js -->
    <script src="{{ url('admin/assets/vendor/libs/@form-validation/popular.js') }}"></script>
    <script src="{{ url('admin/assets/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
    <script src="{{ url('admin/assets/vendor/libs/@form-validation/auto-focus.js') }}"></script>
    <!-- End Forms js -->
    @yield('editorFiles')
    <script src="{{ url('admin/assets/vendor/libs/dropzone/dropzone.js') }}"></script>

    {{-- <!-- fancybox -->
    <script src="{{ asset('assets/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.fancybox.pack.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.min.js')}}"></script> --}}
    <!-- Page JS -->
    <script src="{{ url('admin/assets/js/form-wizard-numbered.js') }}"></script>
    <script src="{{ url('admin/assets/js/form-wizard-validation.js') }}"></script>
    <!-- Main JS -->
    @stop

    @section('mainFiles')
    <script src="{{ url('admin/assets/js/app.js') }}"></script>
    <script src="{{ url('admin/assets/js/customdropzone.js') }}"></script>
    @stop
