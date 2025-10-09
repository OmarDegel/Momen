@include('admin.layouts.modals.filter.header',
['model' => 'products',
'search'=>true,
'active'=>true,
'sort_by'=>true,
"trash" => true
])






{{-- feature --}}
<div class="col-md-6">
    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'feature',
        'select_function' => filterboolien(),
        'select_value' => request('feature') ?? null,
        'select_class' => 'select2',
        'select2' => true,
        'not_req' => true,
    ])
</div>
{{-- offer --}}
<div class="col-md-6">
    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'is_offer',
        'select_function' => filterboolien(),
        'select_value' => request('is_offer') ?? null,
        'select_class' => 'select2',
        'select2' => true,
        'not_req' => true,
    ])
</div>
{{-- free_shipping --}}
<div class="col-md-6">
    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'is_free_shipping',
        'select_function' => filterboolien(),
        'select_value' => request('is_free_shipping') ?? null,
        'select_class' => 'select2',
        'select2' => true,
        'not_req' => true,
    ])
</div>
{{-- returned --}}
<div class="col-md-6">
    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'is_returned',
        'select_function' => filterBoolien(),
        'select_value' =>  request('is_returned') ?? null,
        'select_class' => 'select2',
        'select2' => true,
        'not_req' => true,
    ])
</div>
{{-- min_price --}}
<div class="col-md-6">
    @include('admin.layouts.forms.fields.number', [
        'number_name' => 'min_price',
        'min' => 0,
        'not_req' => true,
        'placeholder' => __('site.min_price'),
        'number_value' => request('min_price') ?? null,
    ])
</div>
{{-- max_price --}}
<div class="col-md-6">
    @include('admin.layouts.forms.fields.number', [
        'number_name' => 'max_price',
        'min' => 0,
        'not_req' => true,
        'placeholder' => __('site.max_price'),
        'number_value' => request('max_price') ?? null,
    ])
</div>

{{-- category --}}
<div class="col-md-6">
    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'category_id',
        'select_function' => ['all' => __('site.all')] + $categories,
        'select_value' => request('category_id') ?? null,
        'select_class' => 'select2',
        'select2' => true,
        'not_req' => true,
    ])
</div>
{{-- brand --}}
<div class="col-md-6">
    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'brand_id',
        'select_function' => ['all' => __('site.all')] + $brands,
        'select_value' =>  request('brand_id') ?? null,
        'select_class' => 'select2',
        'select2' => true,
        'not_req' => true,
    ])
</div>
{{-- new --}}
<div class="col-md-6">
    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'is_new',
        'select_function' => filterboolien(),
        'select_value' =>  request('is_new') ?? null,
        'select_class' => 'select2',
        'select2' => true,
        'not_req' => true,
    ])
</div>
{{-- special --}}
<div class="col-md-6">
    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'is_special',
        'select_function' => filterboolien(),
        'select_value' =>  request('is_special')?? null,
        'select_class' => 'select2',
        'select2' => true,
        'not_req' => true,
    ])
</div>
{{-- filter --}}
<div class="col-md-6">
    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'is_filter',
        'select_function' => filterBoolien(),
        'select_value' => request('is_filter') ?? null,
        'select_class' => 'select2',
        'select2' => true,
        'not_req' => true,
    ])
</div>
{{-- sale --}}
<div class="col-md-6">
    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'is_sale',
        'select_function' => filterboolien(),
        'select_value' =>  request('is_sale') ?? null,
        'select_class' => 'select2',
        'select2' => true,
        'not_req' => true,
    ])
</div>


{{-- buttons --}}
@include('admin.layouts.modals.filter.buttons')

{{-- Footer --}}
@include('admin.layouts.modals.filter.footer')
