@section('jsFiles')
<script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.js') }}"></script>

<script src="{{ asset('admin/assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>

<script src="{{ asset('admin/assets/js/form-wizard-numbered.js') }}"></script>
<script src="{{ asset('admin/assets/js/form-wizard-validation.js') }}"></script>

<!-- بقية المكتبات -->
<script src="{{ asset('admin/assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/select2/select2.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/dropzone/dropzone.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
@include('admin.layouts.forms.multi_dropzone', [
'inputName' => 'images',
'existingImages' => isset($product) && $product->images ? $product->images : [],
])
<script>
    $(document).ready(function() {
            $("#is_shipping_free").change(function() {
                if ($(this).val() == 1) {
                    $("#shipping").val(0);
                    $("#shipping").prop('readonly', true);
                } else {
                    $("#shipping").prop('readonly', false);
                }
            })
        })
</script>
@endsection


@section('mainFiles')
@include('admin.products.includes.date_scriptsjs')
@include('admin.products.includes.repeater_scriptjs')
@include('admin.products.includes.getCategoryBySevice')
@endsection