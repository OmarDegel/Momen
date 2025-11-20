<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->

<script src="{{ url('admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ url('admin/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ url('admin/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ url('admin/assets/vendor/libs/node-waves/node-waves.js') }}"></script>
<script src="{{ url('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ url('admin/assets/vendor/libs/hammer/hammer.js') }}"></script>
<script src="{{ url('admin/assets/vendor/libs/i18n/i18n.js') }}"></script>
<script src="{{ url('admin/assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
<script src="{{ url('admin/assets/vendor/js/menu.js') }}"></script>

<!-- endbuild -->

<!-- Vendors JS -->
@if($class!="home")
<script src="{{ url('admin/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
@endif

<script src="{{ url('admin/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="{{ url('admin/assets/vendor/libs/swiper/swiper.js') }}"></script>
@yield('jsFiles')
<!-- Main JS -->
<script src="{{ url('admin/assets/js/main.js') }}"></script>
{{-- <script src="{{ url('admin/assets/js/themeskin.js') }}"></script> --}}
@yield('mainFiles')


@include('admin.layouts.notification_scripts')
@include('admin.layouts.logout_for_device_script')
<!-- Page JS -->




