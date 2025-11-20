@include('admin.layouts.modals.filter.header', ['model' => 'orders'])








{{-- delivery --}}
<div class="col-md-6">

    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'delivery_time',
        'select_function' => ['all' => __('site.all')] + $deliveryTimes,
        'select_value' => old('delivery_time') ?? request('delivery_time'),
        'select_class' => 'select2',
        'select2' => true,
        'not_req' => true,
    ])
</div>
{{-- payment --}}

<div class="col-md-6">
    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'payment',
        'select_function' => ['all' => __('site.all')] + $payments,
        'select_value' => old('payment') ?? request('payment'),
        'select_class' => 'select2',
        'select2' => true,
        'not_req' => true,
    ])
</div>
{{-- delivery --}}

<div class="col-md-6">
    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'delivery',
        'select_function' => ['all' => __('site.all')] + $deliverys,
        'select_value' => old('delivery') ?? request('delivery'),
        'select_class' => 'select2',
        'select2' => true,
        'not_req' => true,
    ])
</div>

{{-- status --}}

<div class="col-md-6">
    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'status',
        'select_function' => ['all' => __('site.all')] + $transactionsStatuses,
        'select_value' => old('status') ?? request('status'),
        'select_class' => 'select2',
        'select2' => true,
        'not_req' => true,
    ])
</div>
{{-- max price --}}

<div class="col-md-6">
    @include('admin.layouts.forms.fields.number', [
        'number_name' => 'max_price',
        'select_value' =>  request('max_price'),
        'not_req' => true,
    ])
</div>
{{-- min price --}}

<div class="col-md-6">
    @include('admin.layouts.forms.fields.number', [
        'number_name' => 'min_price',
        'number_value' => request('min_price'),
        'not_req' => true,
    ])
</div>


{{-- buttons --}}
@include('admin.layouts.modals.filter.buttons', [
    'model' => 'brands',
])

{{-- Footer --}}
@include('admin.layouts.modals.filter.footer')
