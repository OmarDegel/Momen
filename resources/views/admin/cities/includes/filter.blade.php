@include('admin.layouts.modals.filter.header',
['model' => 'cities',
'search'=>true,
'active'=>true,
'sort_by'=>true,
"trash" => true
])

<div class="col-md-6">
    @include('admin.layouts.forms.fields.number', [
    'number_name' => 'shipping_min',
    'min' => 0,
    'placeholder' => __('site.order_id'),
    'number_value' => request('shipping_min') ?? old('shipping_min'),
    ])
</div>
<div class="col-md-6">
    @include('admin.layouts.forms.fields.number', [
    'number_name' => 'shipping_max',
    'min' => 0,
    'placeholder' => __('site.order_id'),
    'number_value' => request('shipping_min') ?? old('shipping_min'),
    ])
</div>


{{-- buttons --}}
@include('admin.layouts.modals.filter.buttons', ['model' => 'cities'])

{{-- Footer --}}
@include('admin.layouts.modals.filter.footer')