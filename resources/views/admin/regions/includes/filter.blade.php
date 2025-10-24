@include('admin.layouts.modals.filter.header',
['model' => 'regions',
'search'=>true,
'active'=>true,
'sort_by'=>true,
"trash" => true
])

<div class="col-md-6">
    @include('admin.layouts.forms.fields.number', [
    'number_name' => 'shipping_min',
    'min' => 0,
    'placeholder' => __('site.shipping_min'),
    'number_value' => request('shipping_min') ?? old('shipping_min'),
    "not_req" => true

    ])
</div>
<div class="col-md-6">
    @include('admin.layouts.forms.fields.number', [
    'number_name' => 'shipping_max',
    'min' => 0,
    'placeholder' => __('site.shipping_max'),
    'number_value' => request('shipping_max') ?? old('shipping_max'),
    "not_req" => true
    ])
</div>
<div class="col-md-6">

    @include('admin.layouts.forms.fields.select', [
    'select_name' => 'city_id',
    'select_function' =>['all'=>__('site.all') ]+  $cities,
    'select_value' => old('city_id') ?? request('city_id'),
    'select_class' => 'select2',
    'select2' => true,
    'not_req' => true,
    ])
</div>

{{-- buttons --}}
@include('admin.layouts.modals.filter.buttons', ['model' => 'regions'])

{{-- Footer --}}
@include('admin.layouts.modals.filter.footer')