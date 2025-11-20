@include('admin.layouts.modals.filter.header',
['model' => 'reviews',
'active'=>true,
'sort_by'=>true,
"trash" => true
])
{{-- type --}}
<div class="col-md-6">
    @include('admin.layouts.forms.fields.select', [
    'select_name' => 'type',
    'select_function' => ['all' => __('site.all'),'orders' => __('site.orders'), 'products' => __('site.products')],
    'select_value' => old('type') ?? request('type'),
    'select_class' => 'select2',
    'select2' => true,
    'not_req' => true,
    'select_id' => 'type'
    ])
</div>

{{-- product --}}
<div class="col-md-6">
    @include('admin.layouts.forms.fields.select', [
    'select_name' => 'product_id',
    'select_function' =>['all'=>__('site.all') ]+ $products,
    'select_value' => old('product_id') ?? request('product_id'),
    'select_class' => 'select2',
    'select2' => true,
    'not_req' => true,
    "select_id" => "product_id"
    ])
</div>
{{-- rate --}}
<div class="col-md-6">
    @include('admin.layouts.forms.fields.number', [
    'number_name' => 'max_rate',
    'min' => 0,
    'placeholder' => __('site.max_rate'),
    'number_value' => request('max_rate') ?? old('max_rate'),
    "not_req" => true
    ])
</div>
<div class="col-md-6">
    @include('admin.layouts.forms.fields.number', [
    'number_name' => 'min_rate',
    'min' => 0,
    'placeholder' => __('site.min_rate'),
    'number_value' => request('min_rate') ?? old('min_rate'),
    "not_req" => true
    ])
</div>
{{-- users --}}
<div class="col-md-6">

    @include('admin.layouts.forms.fields.select', [
    'select_name' => 'user_id',
    'select_function' =>['all'=>__('site.all') ]+ $users,
    'select_value' => old('user_id') ?? request('user_id'),
    'select_class' => 'select2',
    'select2' => true,
    'not_req' => true,
    ])
</div>

{{-- buttons --}}
@include('admin.layouts.modals.filter.buttons', ['model' => 'regions'])

{{-- Footer --}}
@include('admin.layouts.modals.filter.footer')