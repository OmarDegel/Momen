@include('admin.layouts.modals.filter.header', ['model' => 'products'])





{{-- Search by Name --}}
<div class="col-md-6">
    @include('admin.layouts.forms.fields.text', [
        'text_name' => 'search',
        'text_value' => request('search') ?? null,
        'label_name' => __('site.search'),
        'label_req' => true,
        'not_req' => true,
    ])
</div>

{{-- Active Status --}}
<div class="col-md-6">
    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'active',
        'select_function' => filterboolien(),
        'select_value' => request('active') ?? null,
        'select_class' => 'select2',
        'select2' => true,
        'not_req' => true,
    ])
</div>
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
        'select_name' => 'offer',
        'select_function' => filterboolien(),
        'select_value' => request('offer') ?? null,
        'select_class' => 'select2',
        'select2' => true,
        'not_req' => true,
    ])
</div>
{{-- free_shipping --}}
<div class="col-md-6">
    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'free_shipping',
        'select_function' => filterboolien(),
        'select_value' => request('free_shipping') ?? null,
        'select_class' => 'select2',
        'select2' => true,
        'not_req' => true,
    ])
</div>
{{-- returned --}}
<div class="col-md-6">
    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'returned',
        'select_function' => filterBoolien(),
        'select_value' =>  request('returned') ?? null,
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
        'select_name' => 'brand',
        'select_function' => ['all' => __('site.all')] + $brands,
        'select_value' =>  request('brand') ?? null,
        'select_class' => 'select2',
        'select2' => true,
        'not_req' => true,
    ])
</div>
{{-- new --}}
<div class="col-md-6">
    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'new',
        'select_function' => filterboolien(),
        'select_value' =>  request('new') ?? null,
        'select_class' => 'select2',
        'select2' => true,
        'not_req' => true,
    ])
</div>
{{-- special --}}
<div class="col-md-6">
    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'special',
        'select_function' => filterboolien(),
        'select_value' =>  request('special')?? null,
        'select_class' => 'select2',
        'select2' => true,
        'not_req' => true,
    ])
</div>
{{-- filter --}}
<div class="col-md-6">
    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'filter',
        'select_function' => filterBoolien(),
        'select_value' => request('filter') ?? null,
        'select_class' => 'select2',
        'select2' => true,
        'not_req' => true,
    ])
</div>
{{-- sale --}}
<div class="col-md-6">
    @include('admin.layouts.forms.fields.select', [
        'select_name' => 'sale',
        'select_function' => filterboolien(),
        'select_value' =>  request('sale') ?? null,
        'select_class' => 'select2',
        'select2' => true,
        'not_req' => true,
    ])
</div>


{{-- buttons --}}
@include('admin.layouts.modals.filter.buttons', [
    'model' => 'brands',
])

{{-- Footer --}}
@include('admin.layouts.modals.filter.footer')
